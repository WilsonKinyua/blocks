<?php

namespace App\Http\Controllers;

use App\Models\Daraja;
use App\Models\MpesaLog;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\TenantPayment;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class MpesePaymentController extends Controller
{
    const  AUTH_ENDPOINT = 'https://api.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';

    public function logMpesaWebhook(Request $request, $status)
    {
        $log = new MpesaLog();

        $log->status = $status;
        $log->payload = json_encode($request->post(), JSON_UNESCAPED_UNICODE);

        $log->trans_id = $request->post('TransID');
        $log->trans_time = $request->post('TransTime');
        $log->trans_amount = $request->post('TransAmount');
        $log->transaction_type = $request->post('TransactionType');
        $log->org_account_balance = $request->post('OrgAccounBalance');

        $log->business_short_code = $request->post('BusinessShortCode');
        $log->invoice_number = $request->post('InvoiceNumber');
        $log->bill_ref_number = $request->post('BillRefNumber');

        $log->last_name = $request->post('LastName');
        $log->first_name = $request->post('FirstName');
        $log->middle_name = $request->post('MiddleName');
        $log->msisdn = $request->post('MSISDN');

        $log->save();
    }

    public function getAccessToken(Daraja $ipn)
    {
        $key = $ipn?->consumer_key;
        $secret = $ipn?->consumer_secret;

        $response = Http::withOptions(['verify' => false, 'debug' => env('APP_DEBUG')])
            ->acceptJson()
            ->withBasicAuth($key, $secret)
            ->get(self::AUTH_ENDPOINT)
            ->object();

        return $response;
    }

    public function __invoke(Request $request, string $daraja, string $action)
    {
        // validation
        $valid = false;
        $is_valid_daraja = is_numeric($daraja);
        $is_valid_action = in_array($action, ['validation', 'confirmation']);

        $valid = $is_valid_daraja && $is_valid_action;

        // retrive IPN credentials from database
        if ($valid) {
            $darajaDetails = Daraja::where('id', $daraja)->first();

            // okay all messages from MPESA
            if ($action === 'validation') {
                try {
                    return response()->json(['ResultCode' => 0, 'ResultDesc' => 'M-PESA validation passed successfully.']);
                } catch (\Exception $e) {
                    return response()->json(['ResultCode' => 1, 'ResultDesc' => 'M-PESA validation failed.']);
                }
            }

            // find the tenant & attach their id & unit to the payment
            if ($action === 'confirmation') {
                try {
                    // clean up the paybill acc. number
                    $reference = preg_replace('[^A-Za-z0-9\-\\\/]', '', $request->post('BillRefNumber'));
                    $reference = preg_replace('(\\\\|\/)', '|', $reference);
                    $reference = Str::of($reference)->trim();

                    if ($reference->isEmpty()) {
                        $result = ['ResultCode' => 1, 'ResultDesc' => "BillRefNumber field is required, $reference given."];

                        $this->logMpesaWebhook($request, 'FAILED');
                        return response()->json($result);
                    }

                    if ($reference->explode('|')->count() !== 2) {
                        $result = ['ResultCode' => 1, 'ResultDesc' => "BillRefNumber is invalid, $reference given."];

                        $this->logMpesaWebhook($request, 'FAILED');
                        return response()->json($result);
                    }

                    // extract the property & unit from the paybill acc. number
                    $property = trim($reference->explode('|')[0]);
                    $unit = trim($reference->explode('|')[1]);

                    // get the property, unit, & business

                    // insert tenant payment
                    $payment = new TenantPayment();
                    $payment->payment_method = 'MPESA';
                    $payment->unit_id = $request->post('unit_id');
                    $payment->tenant_id = $request->post('tenant_id');
                    $payment->business_id = $request->post('business_id');
                    $payment->property_id = $request->post('property_id');

                    $payment->mpesa_code = $request->post('TransID');
                    $payment->amount_paid = $request->post('TransAmount');
                    $payment->received_at = $request->post('TransTime');
                    $payment->save();


                    $result = ['ResultCode' => 0, 'ResultDesc' => 'M-PESA confirmation received successfully.'];

                    $this->logMpesaWebhook($request, 'PASSED');
                    return response()->json($result);
                } catch (\Exception $e) {
                    Log::error($e->getMessage());
                    $result = ['ResultCode' => 1, 'ResultDesc' => 'M-PESA confirmation failed.'];

                    $this->logMpesaWebhook($request, 'FAILED');
                    return response()->json($result);
                }
            }
        }
    }
}

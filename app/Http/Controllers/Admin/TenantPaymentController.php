<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tenant;
use App\Models\TenantPayment;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;
use Gate;

class TenantPaymentController extends Controller
{

    public function storePayment(Request $request)
    {
        abort_if(Gate::denies('tenant_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->business_id != auth()->user()->business_id) {
            abort(403, 'Unauthorized action.');
        }
        if ($request->payment_method == 'cash') {
            $receipt_number = 'R' . date('Ymd') . str_pad(mt_rand(1, 999), 5, '0', STR_PAD_LEFT);
            $request->request->add(['cash_receipt_number' => $receipt_number]);
        } else if ($request->payment_method == 'mpesa') {
            $request->request->add(['mpesa_code' => $request->mpesa_code]);
        } else if ($request->payment_method == 'bank') {
            $request->request->add(['bank_receipt_number' => $request->bank_receipt_number]);
        } else {
            $request->request->add(['other_payment_description' => 'Other payment description']);
        }

        $total_amount_paid_this_month = TenantPayment::where('business_id', $request->business_id)
            ->whereYear('payment_date', date('Y'))
            ->whereMonth('payment_date', date('m'))
            ->sum('amount_paid');

        $tenant_rent = Tenant::where('id', $request->tenant_id)->value('rent');

        $total_amount_paid_this_month += $request->amount_paid;

        $total_amount_paid_next_month = TenantPayment::where('business_id', $request->business_id)
            ->whereYear('payment_date', date('Y'))
            ->whereMonth('payment_date', date('m') + 1)
            ->sum('amount_paid');

        if ($total_amount_paid_this_month > $tenant_rent) {
            if ($total_amount_paid_next_month < $tenant_rent) {
                $amount_paid_this_month = TenantPayment::where('tenant_id', $request->tenant_id)->whereMonth('payment_date', date('m'))->sum('amount_paid');
                $rent_balance_not_paid = $tenant_rent - $amount_paid_this_month;
                if ($rent_balance_not_paid > 0) {
                    TenantPayment::create([
                        'tenant_id' => $request->tenant_id,
                        'unit_id' => $request->unit_id,
                        'business_id' => $request->business_id,
                        'property_id' => $request->property_id,
                        'payment_method' => $request->payment_method,
                        'amount_paid' => $rent_balance_not_paid,
                        'payment_date' => date('Y-m-d'),
                        'mpesa_code' => $request->mpesa_code,
                        'bank_receipt_number' => $request->bank_receipt_number,
                        'other_payment_description' => $request->other_payment_description,
                        'cash_receipt_number' => $request->cash_receipt_number,
                    ]);
                }
            }

            $request->request->add(['payment_date' => date('Y-m-d', strtotime('first day of next month'))]);
            $request->request->add(['amount_paid' => $total_amount_paid_this_month - $tenant_rent]);
            TenantPayment::create($request->all());
        }
        elseif ($total_amount_paid_next_month > $tenant_rent){
            $request->request->add(['payment_date' => date('Y-m-d'+1, strtotime('first day of next month'))]);
            $request->request->add(['amount_paid' => $total_amount_paid_next_month - $tenant_rent]);
            TenantPayment::create($request->all());
        }
        else {
            TenantPayment::create($request->all());
        }
        return redirect()->back()->with('success', 'Payment recorded successfully');
    }

    public function createPayment()
    {
        abort_if(Gate::denies('record_payment'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $business = auth()->user()->business;
        if (!$business) {
            return redirect()->route('admin.business.profile')->with('danger', 'Please create a business profile first!');
        }
        return view('admin.tenants.create-payment');
    }

    public function overduePayments()
    {

        abort_if(Gate::denies('overdue_payment'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $business = auth()->user()->business;
        if (!$business) {
            return redirect()->route('admin.business.profile')->with('danger', 'Please create a business profile first!');
        }
        return view('admin.tenants.overdue-payments');
    }

    public function transactions()
    {
        abort_if(Gate::denies('record_management_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $business = auth()->user()->business;
        if (!$business) {
            return redirect()->route('admin.business.profile')->with('danger', 'Please create a business profile first!');
        }
        $transactions = $business->transactions;
        return view('admin.tenants.transactions', compact('transactions'));
    }
}

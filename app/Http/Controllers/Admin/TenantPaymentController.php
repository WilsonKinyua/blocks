<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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

        $payment = TenantPayment::create($request->all());
        $payment->payment_reference = '#Ref:' . $payment->id;
        $payment->update();
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

    public function transactions(){
        abort_if(Gate::denies('record_management_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $business = auth()->user()->business;
        if (!$business) {
            return redirect()->route('admin.business.profile')->with('danger', 'Please create a business profile first!');
        }
        return view('admin.tenants.transactions');
    }
}

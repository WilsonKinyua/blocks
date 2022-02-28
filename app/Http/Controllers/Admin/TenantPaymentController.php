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
}

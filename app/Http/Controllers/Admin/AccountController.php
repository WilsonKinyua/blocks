<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TenantPayment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Gate;

class AccountController extends Controller
{
    public function allAccountsRecords()
    {
        abort_if(Gate::denies('records_list'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $business = auth()->user()->business;
        if (!$business) {
            return redirect()->route('admin.business.profile')->with('danger', 'Please create a business profile first!');
        }
        $tenants = $business->tenants;
        $payments = TenantPayment::whereMonth('payment_date', '=', Carbon::now()->month)
            ->where('business_id', $business->id)
            ->get();
        return view('admin.accounting.all-records', compact('tenants', 'payments'));
    }
}

<?php

namespace App\Http\Controllers\Admin;
use App\Models\Tenant;
class HomeController
{
    public function index()
    {
        $business = auth()->user()->business;
        if (!$business) {
            return redirect()->route('admin.business.profile')->with('danger', 'Please create a business profile first!');
        }

        $tenants = Tenant::where('business_id', $business->id)->get();

        return view('home', compact('tenants'));
    }
}

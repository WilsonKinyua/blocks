<?php

namespace App\Http\Controllers\Admin;

use App\Models\Inventory;
use App\Models\Property;
use App\Models\Tenant;
use App\Models\Unit;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;

class HomeController
{
    public function index()
    {
        $business = auth()->user()->business;
        if (!$business) {
            return redirect()->route('admin.business.profile')->with('danger', 'Please create a business profile first!');
        }

        $properties = Property::where('business_id', $business->id)->count();
        $tenants = Tenant::where('business_id', $business->id)->get();
        $units = Unit::where('business_id', $business->id)
            ->where('is_active', false)
            ->count();

        return view('home', compact('properties', 'tenants', 'units'));
    }
}

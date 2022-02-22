<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePropertyRequest;
use App\Http\Requests\UpdatePropertyRequest;
use Gate;
use App\Models\Property;
use Symfony\Component\HttpFoundation\Response;

class PropertyController extends Controller
{

    public function create()
    {
        abort_if(Gate::denies('property_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        // check if user has business and if not redirect to create business page
        $business = auth()->user()->business;
        if (!$business) {
            return redirect()->route('admin.business.profile')->with('danger', 'Please create a business profile first!');
        }
        return view('admin.properties.create', compact('business'));
    }
    public function index()
    {
        abort_if(Gate::denies('property_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
    }

    public function store(StorePropertyRequest $request)
    {
        Property::create($request->all());
        return redirect()->back()->with('success', 'Property created successfully!');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePropertyRequest;
use App\Http\Requests\UpdatePropertyRequest;
use Gate;
use App\Models\Property;
use App\Models\Unit;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PropertyController extends Controller
{

    public function create()
    {
        abort_if(Gate::denies('property_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $business = auth()->user()->business;
        if (!$business) {
            return redirect()->route('admin.business.profile')->with('danger', 'Please create a business profile first!');
        }
        return view('admin.properties.create', compact('business'));
    }
    public function index()
    {
        abort_if(Gate::denies('property_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $business = auth()->user()->business;
        if (!$business) {
            return redirect()->route('admin.business.profile')->with('danger', 'Please create a business profile first!');
        }
        $properties = Property::where('business_id', $business->id)->get();
        return view('admin.properties.index', compact('properties'));
    }

    public function store(StorePropertyRequest $request)
    {
        abort_if(Gate::denies('property_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $property = Property::create($request->all());
        $units = explode(',', $request->units);
        foreach ($units as $unit) {
            Unit::create([
                'name' => $unit,
                'property_id' => $property->id
            ]);
        }
        return redirect()->route('admin.properties.index')->with('success', 'Property created successfully!');
    }

    public function show(Property $property)
    {
        abort_if(Gate::denies('property_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.properties.show', compact('property'));
    }

    public function deleteProperty($id)
    {
        abort_if(Gate::denies('property_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        Property::where('id', $id)->delete();
        Unit::where('property_id', $id)->delete();
        return redirect()->route('admin.properties.index');
    }

    public function edit(Property $property)
    {
        abort_if(Gate::denies('property_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.properties.edit', compact('property'));
    }

    public function update(Request $request, Property $property)
    {
        abort_if(Gate::denies('property_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $property->update($request->all());
        Unit::where('property_id', $property->id)->delete();
        $units = explode(',', $request->units);
        foreach ($units as $unit) {
            Unit::create([
                'name' => $unit,
                'property_id' => $property->id
            ]);
        }
        return redirect()->route('admin.properties.index')->with('success', 'Property updated successfully!');
    }
}

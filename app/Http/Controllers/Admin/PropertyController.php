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
        return view('admin.properties.create');
    }
    public function index()
    {
        abort_if(Gate::denies('property_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
    }

    public function store(StorePropertyRequest $request)
    {
        Property::create($request->all());
    }
}

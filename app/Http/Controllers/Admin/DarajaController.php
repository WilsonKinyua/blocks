<?php

namespace App\Http\Controllers\Admin;

use Gate;
use App\Models\Daraja;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;

class DarajaController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('daraja_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $business = auth()->user()->business;

        if (!$business) {
            return redirect()->route('admin.business.profile')->with('danger', 'Please create a business profile first!');
        }

        $darajas = Daraja::latest()->get();
        return view('admin.darajas.index', compact('darajas'));
    }

    public function create()
    {
        abort_if(Gate::denies('daraja_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $business = auth()->user()->business;

        if (!$business) {
            return redirect()->route('admin.business.profile')->with('danger', 'Please create a business profile first!');
        }

        return view('admin.darajas.create', compact('business'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        abort_if(Gate::denies('daraja_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $validated = $request->validate([
            'business_id' => 'required|exists:businesses,id',

            'short_code' => 'required|max:255',
            'transaction' => ['required', Rule::in(['TILL', 'PAYBILL'])],

            'consumer_key' => 'nullable|max:255',
            'consumer_secret' => 'nullable|max:255',

            'validation_webhook' => 'nullable|max:255',
            'confirmation_webhook' => 'nullable|max:255',
            'response_type' => ['required', Rule::in(['Cancelled', 'Completed'])],
        ]);

        $daraja = new Daraja();
        $daraja->fill($validated);
        $daraja->save();

        return redirect()->route('admin.darajas.index')->with('success', 'Daraja record created successfully!');
    }

    public function edit(Daraja $daraja)
    {
        abort_if(Gate::denies('daraja_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.darajas.edit', compact('daraja'));
    }

    public function update(Request $request, Daraja $daraja)
    {
        abort_if(Gate::denies('daraja_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $validated = $request->validate([
            'business_id' => 'required|exists:businesses,id',

            'short_code' => 'required|max:255',
            'transaction' => ['required', Rule::in(['TILL', 'PAYBILL'])],

            'consumer_key' => 'nullable|max:255',
            'consumer_secret' => 'nullable|max:255',

            'validation_webhook' => 'nullable|max:255',
            'confirmation_webhook' => 'nullable|max:255',
            'response_type' => ['required', Rule::in(['Cancelled', 'Completed'])],
        ]);

        $daraja->fill($validated);
        $daraja->save();

        return redirect()->route('admin.darajas.index')->with('success', 'Daraja record updated successfully!');
    }

    public function destroy($id)
    {
        abort_if(Gate::denies('daraja_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        Daraja::where('id', $id)->delete();

        return redirect()->route('admin.darajas.index');
    }
}

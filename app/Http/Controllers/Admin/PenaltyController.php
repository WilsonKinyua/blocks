<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StorePenaltyRequest;
use App\Models\Penalty;
use App\Models\Tenant;
use Illuminate\Http\Request;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class PenaltyController
{
    public function create()
    {
        abort_if(Gate::denies('penalty_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if (!auth()->user()->business) {
            return redirect()->route('admin.business.profile')->with('danger', 'Please create a business profile first!');
        }
        $tenants = Tenant::where('business_id', auth()->user()->business_id)->get();
        $penalties = Penalty::where('business_id', auth()->user()->business_id)->get();
        return view('admin.penalties.create', compact('tenants', 'penalties'));
    }

    public function store(StorePenaltyRequest $request)
    {
        $request->request->add(['business_id' => auth()->user()->business_id]);
        Penalty::create($request->all());
        return back()->with('success', 'Penalty created successfully!');
    }
}

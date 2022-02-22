<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreBusinessRequest;
use App\Models\Business;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Str;

class BusinessController extends Controller
{

    use MediaUploadingTrait;

    public function index()
    {
        //
    }


    public function create()
    {
        //
    }


    public function store(StoreBusinessRequest $request)
    {
        $business = Business::create($request->all());
        $business->slug = Str::slug($business->name, '-');
        $business->created_by = Auth::id();
        $business->update();
        User::where('id', Auth::id())->update(['business_id' => $business->id]);
        return view('admin.businesses.profile', compact('business'))->with('success', 'Business created successfully.');
    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

    // business profile
    public function profile()
    {
        abort_if(Gate::denies('business_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        if (auth()->user()->business_id) {
            $business = Business::where('id', Auth::user()->business_id)->first();
            if (!empty($business)) {
                return view('admin.businesses.profile', compact('business'));
            } else {
                abort_if(Gate::denies('business_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
                return view('admin.businesses.create')->with('danger', 'Please create a business profile first');
            }
        } else {
            abort_if(Gate::denies('business_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
            return view('admin.businesses.create')->with('danger', 'Please create a business profile first');
        }
    }
}

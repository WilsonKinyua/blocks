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

        if ($request->input('logo', false)) {
            $business->addMedia(storage_path('tmp/uploads/' . basename($request->input('logo'))))->toMediaCollection('logo');
        }
        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $business->id]);
        }

        return redirect()->route('admin.business.profile', compact('business'))->with('success', 'Business created successfully!');
    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }

    public function updateLogo(Request $request, Business $business)
    {
        if ($business->logo) {
            $business->logo->delete();
        }
        if ($request->input('logo', false)) {
            $business->addMedia(storage_path('tmp/uploads/' . basename($request->input('logo'))))->toMediaCollection('logo');
        }
        return redirect()->route('admin.business.profile', compact('business'))->with('success', 'Business updated successfully!');
    }


    public function update(Request $request, Business $business)
    {
        $business->update($request->all());
        return redirect()->route('admin.business.profile', compact('business'))->with('success', 'Business updated successfully!');
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
            $business = Business::where('id', Auth::user()->business_id)->with('media')->first();
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

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('business_create') && Gate::denies('business_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Business();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}

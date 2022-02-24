<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreTenantRequest;
use App\Models\Property;
use App\Models\Tenant;
use App\Models\Unit;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class TenantController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('tenant_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $business = auth()->user()->business;
        if (!$business) {
            return redirect()->route('admin.business.profile')->with('danger', 'Please create a business profile first!');
        }
    }

    public function create()
    {
        abort_if(Gate::denies('tenant_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $business = auth()->user()->business;
        if (!$business) {
            return redirect()->route('admin.business.profile')->with('danger', 'Please create a business profile first!');
        }
        $properties = Property::where('business_id', $business->id)->get();
        $units = Unit::where('business_id', $business->id)->get();
        return view('admin.tenants.create', compact('properties', 'units'));
    }

    public function store(StoreTenantRequest $request)
    {
        $tenant = Tenant::create($request->all());
        if ($request->input('file', false)) {
            foreach ($request->input('file', []) as $file) {
                $tenant->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('file');
            }
        }
        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $tenant->id]);
        }

        return redirect()->route('admin.tenants.index')->with('success', 'Tenant created successfully');
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('tenant_create') && Gate::denies('tenant_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Tenant();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}


// if ($request->input('file', false)) {
//     if (!$tenant->file || $request->input('file') !== $tenant->file->file_name) {
//         if ($tenant->file) {
//             $tenant->file->delete();
//         }
//         $tenant->addMedia(storage_path('tmp/uploads/' . basename($request->input('file'))))->toMediaCollection('file');
//     }
// } elseif ($tenant->file) {
//     $tenant->file->delete();
// }

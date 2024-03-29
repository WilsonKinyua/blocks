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
use AfricasTalking\SDK\AfricasTalking;
use App\Mail\SendInvoice;
use App\Models\TenantPayment;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
// use \PDF;


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
        $tenants = Tenant::where('business_id', $business->id)->get();
        return view('admin.tenants.index', compact('tenants'));
    }

    public function create()
    {
        abort_if(Gate::denies('tenant_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $business = auth()->user()->business;
        if (!$business) {
            return redirect()->route('admin.business.profile')->with('danger', 'Please create a business profile first!');
        }
        $properties = Property::where('business_id', $business->id)->get();
        if ($properties->count() == 0) {
            return redirect()->route('admin.properties.create')->with('danger', 'Please create a property first!');
        }
        $units = Unit::where('business_id', $business->id)
            ->where('is_active', false)
            ->get();
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

        Unit::find($tenant->unit_id)->update(['is_active' => true]);
        User::create(['name' => $request->name, "email" => $request->email])->roles()->sync(3);

        return redirect()->route('admin.tenants.index')->with('success', 'Tenant created successfully');
    }

    public function edit(Tenant $tenant)
    {
        abort_if(Gate::denies('tenant_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $properties = Property::where('business_id', $tenant->business_id)->get();
        $units = Unit::where('business_id', $tenant->business_id)->where('is_active', false)->get();
        return view('admin.tenants.edit', compact('tenant', 'properties', 'units'));
    }

    public function update(StoreTenantRequest $request, Tenant $tenant)
    {
        if ($tenant->business_id != auth()->user()->business_id) {
            abort(403, 'Unauthorized action.');
        }
        Unit::find($request->unit_id)->update(['is_active' => false]);
        $tenant->update($request->all());
        if ($request->input('file', false)) {
            if (!$tenant->file || $request->input('file') !== $tenant->file) {
                if (count($tenant->file) > 0) {
                    foreach ($tenant->file as $media) {
                        if (!in_array($media->file_name, $request->input('file', []))) {
                            $media->delete();
                        }
                    }
                }
                foreach ($request->input('file', []) as $file) {
                    $tenant->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('file');
                }
            }
        }
        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $tenant->id]);
        }

        Unit::find($request->unit_id)->update(['is_active' => true]);

        return redirect()->route('admin.tenants.index')->with('success', 'Tenant updated successfully');
    }

    public function vacate($id)
    {
        abort_if(Gate::denies('tenant_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tenant = Tenant::findOrFail($id);
        if ($tenant->business_id != auth()->user()->business_id) {
            abort(403, 'Unauthorized action.');
        }
        $tenant->status = !$tenant->status;
        $tenant->update();
        Unit::find($tenant->unit_id)->update(['is_active' => false]);
        return redirect()->route('admin.tenants.index')->with('success', 'Tenant updated successfully');
    }

    public function show(Tenant $tenant)
    {
        abort_if(Gate::denies('tenant_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($tenant->business_id != auth()->user()->business_id) {
            abort(403, 'Unauthorized action.');
        }

        $tenant->load('business', 'apartment', 'house');
        $payments = TenantPayment::where('tenant_id', $tenant->id)->get();

        return view('admin.tenants.show', compact('tenant', 'payments'));
    }

    public function deleteTenant($id)
    {
        $tenant = Tenant::findOrFail($id);
        Unit::find($tenant->unit_id)->update(['is_active' => false]);
        if ($tenant->business_id != auth()->user()->business_id) {
            abort(403, 'Unauthorized action.');
        }
        TenantPayment::where('tenant_id', $tenant->id)->delete();
        $tenant->delete();
        return redirect()->route('admin.tenants.index')->with('success', 'Tenant deleted successfully');
    }

    public function sendReminder(Request $request)
    {
        $tenant = Tenant::findOrFail($request->tenant_id);

        if ($tenant->business_id != auth()->user()->business_id) {
            abort(403, 'Unauthorized action.');
        }

        $username = env('AFRICASTALK_USERNAME');
        $apiKey   = env('AFRICASTALK_APIKEY');
        $AT       = new AfricasTalking($username, $apiKey);
        $sms      = $AT->sms();
        $sms->send([
            'to'      => "+" . $tenant->phone,
            'message' => $request->message,
        ]);

        return redirect()->route('admin.tenants.index')->with('success', 'Reminder sent successfully');
    }

    public function recordTenantPayment($id)
    {
        $tenant = Tenant::findOrFail($id);
        if ($tenant->business_id != auth()->user()->business_id) {
            abort(403, 'Unauthorized action.');
        }
        $business = auth()->user()->business;
        $properties = Property::where('business_id', $business->id)->get();
        $units = Unit::where('business_id', $business->id)->get();
        $payments = TenantPayment::where('tenant_id', $tenant->id)
            // ->whereYear('payment_date', '=', date('Y'))
            ->orderBy('payment_date', 'asc')->get();
        $amount_paid_this_month = TenantPayment::where('tenant_id', $tenant->id)->whereMonth('payment_date', date('m'))->sum('amount_paid');

        return view('admin.tenants.record-payment', compact('tenant', 'properties', 'units', 'payments', 'business', 'amount_paid_this_month'));
    }

    public function sendEmailInvoice($id)
    {
        $tenant = Tenant::findOrFail($id);
        if ($tenant->business_id != auth()->user()->business_id) {
            abort(403, 'Unauthorized action.');
        }
        $business = auth()->user()->business;
        $properties = Property::where('business_id', $business->id)->get();
        $units = Unit::where('business_id', $business->id)->get();
        $payments = TenantPayment::where('tenant_id', $tenant->id)->whereMonth('payment_date', '=', Carbon::now()->month)->get();

        $data = [
            'to' => $tenant->email,
            'business' => $business,
            'payments' => $payments,
            'tenant' => $tenant,
            'properties' => $properties,
            'units' => $units,
        ];

        Mail::to($tenant->email)->send(new SendInvoice($data));

        return redirect()->back()->with('success', 'Invoice sent successfully');
    }

    public function printInvoice($id)
    {
        $tenant = Tenant::findOrFail($id);
        if ($tenant->business_id != auth()->user()->business_id) {
            abort(403, 'Unauthorized action.');
        }
        $business = auth()->user()->business;
        $properties = Property::where('business_id', $business->id)->get();
        $units = Unit::where('business_id', $business->id)->get();
        $payments = TenantPayment::where('tenant_id', $tenant->id)->whereMonth('payment_date', '=', Carbon::now()->month)->get();
        return view('admin.tenants.print-receipt', compact('tenant', 'properties', 'units', 'payments', 'business'));
    }

    // search tenants
    public function searchTenants(Request $request)
    {
        if ($request->term == '') {
            return redirect()->back()->with('danger', 'Please enter a search term');
        }
        return redirect()->route('admin.tenants.search.query', ['query' => $request->term]);
    }

    public function displaySearchTenants($query)
    {
        if ($query == '') {
            return redirect()->back()->with('danger', 'Please enter a search term');
        }
        $tenants = Tenant::where('business_id', auth()->user()->business_id)
            ->where('name', 'like', '%' . $query . '%')
            ->orWhere('id_number', 'like', '%' . $query . '%')
            ->orWhere('phone', 'like', '%' . $query . '%')
            ->get();
        return view('admin.tenants.search-tenants', compact('tenants', 'query'));
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

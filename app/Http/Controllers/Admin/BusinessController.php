<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Models\Business;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

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


    public function store(Request $request)
    {
        //
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
        if (auth()->user()->business_id) {
            $business = Business::where('id', Auth::user()->business_id)->first();
            if (!empty($business)) {
                return view('admin.businesses.profile', compact('business'));
            } else {
                return view('admin.businesses.create')->with('danger', 'Please create a business profile first');
            }
        } else {
            return view('admin.businesses.create')->with('danger', 'Please create a business profile first');
        }
    }
}

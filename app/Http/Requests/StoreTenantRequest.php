<?php

namespace App\Http\Requests;

use App\Models\Inventory;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;


class StoreTenantRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('tenant_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'email' => [
                'email',
                'required',
            ],
            'id_number' => [
                'integer',
                'required',
            ],
            'phone' => [
                'string',
                'required',
            ],
            'property_id' => [
                'integer',
                'required',
            ],
            'unit_id' => [
                'integer',
                'required',
            ],
            'rent' => [
                'required',
            ],
            'deposit' => [
                'required',
            ],
            'emergency_contact_name' => [
                'string',
            ],
            'emergency_contact_phone' => [
                'string',
            ],
        ];
    }
}

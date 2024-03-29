<?php

namespace App\Http\Requests;

use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreBusinessRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('business_create');
    }

    public function rules()
    {
        return [
            'slug' => [
                'string',
                'max:255',
            ],
            'name' => [
                'string',
                'max:255',
                'required',
            ],
            'phone' => [
                'string',
                'max:255',
                'required'
            ],
            'email' => [
                'string',
                'max:255',
                'required'
            ],
            'location' => [
                'string',
                'max:255',
                'required'
            ],
        ];
    }
}

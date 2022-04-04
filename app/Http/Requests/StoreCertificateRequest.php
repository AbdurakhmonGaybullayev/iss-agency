<?php

namespace App\Http\Requests;

use App\Models\Certificate;
use Gate;
use Illuminate\Foundation\Http\FormRequest;

class StoreCertificateRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('certificate_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
                'unique:certificates',
            ],
            'image' => [
                'required',
            ],
        ];
    }
}

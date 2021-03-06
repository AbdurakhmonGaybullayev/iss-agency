<?php

namespace App\Http\Requests;

use App\Models\Certificate;
use Gate;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCertificateRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('certificate_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
                'unique:certificates,name,' . request()->route('certificate')->id,
            ],
            'image' => [
                'required',
            ],
        ];
    }
}

<?php

namespace App\Http\Requests;

use App\Models\Cooperation;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreCooperationRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('cooperation_create');
    }

    public function rules()
    {
        return [
            'user_id' => [
                'required',
                'integer',
            ],
            'company_name' => [
                'string',
                'required',
            ],
            'position' => [
                'string',
                'required',
            ],
            'address' => [
                'required',
            ],
            'message' => [
                'required',
            ],
        ];
    }
}

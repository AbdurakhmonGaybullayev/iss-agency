<?php

namespace App\Http\Requests;

use App\Models\Programm;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreProgrammRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('programm_create');
    }

    public function rules()
    {
        return [
            'name_uz' => [
                'string',
                'required',
            ],
            'name_ru' => [
                'string',
                'required',
            ],
            'name_en' => [
                'string',
                'required',
            ],
        ];
    }
}

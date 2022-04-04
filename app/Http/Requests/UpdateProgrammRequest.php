<?php

namespace App\Http\Requests;

use App\Models\Programm;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateProgrammRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('programm_edit');
    }

    public function rules()
    {
        return [
            'name_uz' => [
                'string',
                'required',
                'unique:programms,name_uz,' . request()->route('programm')->id,
            ],
            'name_ru' => [
                'string',
                'required',
                'unique:programms,name_ru,' . request()->route('programm')->id,
            ],
            'name_en' => [
                'string',
                'required',
                'unique:programms,name_en,' . request()->route('programm')->id,
            ],
        ];
    }
}

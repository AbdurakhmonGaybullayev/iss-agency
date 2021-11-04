<?php

namespace App\Http\Requests;

use App\Models\Direction;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateDirectionRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('direction_edit');
    }

    public function rules()
    {
        return [
            'name_uz' => [
                'string',
                'required',
                'unique:directions,name_uz,' . request()->route('direction')->id,
            ],
            'name_ru' => [
                'string',
                'required',
                'unique:directions,name_ru,' . request()->route('direction')->id,
            ],
            'name_en' => [
                'string',
                'required',
                'unique:directions,name_en,' . request()->route('direction')->id,
            ],
            'programms.*' => [
                'integer',
            ],
            'programms' => [
                'required',
                'array',
            ],
        ];
    }
}

<?php

namespace App\Http\Requests;

use App\Models\HomeDirectionSection;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreHomeDirectionSectionRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('home_direction_section_create');
    }

    public function rules()
    {
        return [
            'number' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'image' => [
                'required',
            ],
            'name_uz' => [
                'string',
                'required',
                'unique:home_direction_sections',
            ],
            'name_ru' => [
                'string',
                'required',
                'unique:home_direction_sections',
            ],
            'name_en' => [
                'string',
                'required',
                'unique:home_direction_sections',
            ],
            'short_description_uz' => [
                'string',
                'nullable',
            ],
            'short_description_ru' => [
                'string',
                'nullable',
            ],
            'short_description_en' => [
                'string',
                'nullable',
            ],
        ];
    }
}

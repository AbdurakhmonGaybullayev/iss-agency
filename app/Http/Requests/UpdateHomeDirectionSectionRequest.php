<?php

namespace App\Http\Requests;

use App\Models\HomeDirectionSection;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateHomeDirectionSectionRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('home_direction_section_edit');
    }

    public function rules()
    {
        return [
            'image' => [
                'required',
            ],
            'name_uz' => [
                'string',
                'required',
                'unique:home_direction_sections,name_uz,' . request()->route('home_direction_section')->id,
            ],
            'name_ru' => [
                'string',
                'required',
                'unique:home_direction_sections,name_ru,' . request()->route('home_direction_section')->id,
            ],
            'name_en' => [
                'string',
                'required',
                'unique:home_direction_sections,name_en,' . request()->route('home_direction_section')->id,
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

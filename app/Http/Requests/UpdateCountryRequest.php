<?php

namespace App\Http\Requests;

use App\Models\Country;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateCountryRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('country_edit');
    }

    public function rules()
    {
        return [
            'name_uz' => [
                'string',
                'required',
                'unique:countries,name_uz,' . request()->route('country')->id,
            ],
            'name_ru' => [
                'string',
                'required',
                'unique:countries,name_ru,' . request()->route('country')->id,
            ],
            'name_en' => [
                'string',
                'required',
                'unique:countries,name_en,' . request()->route('country')->id,
            ],
            'country_logo' => [
                'required',
            ],
            'image' => [
                'required',
            ],
        ];
    }
}

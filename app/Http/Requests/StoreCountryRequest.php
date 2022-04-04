<?php

namespace App\Http\Requests;

use App\Models\Country;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreCountryRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('country_create');
    }

    public function rules()
    {
        return [
            'name_uz' => [
                'string',
                'required',
                'unique:countries',
            ],
            'name_ru' => [
                'string',
                'required',
                'unique:countries',
            ],
            'name_en' => [
                'string',
                'required',
                'unique:countries',
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

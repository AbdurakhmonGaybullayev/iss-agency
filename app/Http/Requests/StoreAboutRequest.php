<?php

namespace App\Http\Requests;

use App\Models\About;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreAboutRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('about_create');
    }

    public function rules()
    {
        return [
            'decription_uz' => [
                'required',
            ],
            'description_ru' => [
                'required',
            ],
            'description_en' => [
                'required',
            ],
        ];
    }
}

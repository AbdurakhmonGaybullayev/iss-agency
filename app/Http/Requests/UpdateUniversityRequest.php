<?php

namespace App\Http\Requests;

use App\Models\University;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateUniversityRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('university_edit');
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
            'image' => [
                'required',
            ],
            'top' => [
                'required',
            ],
            'short_description_uz' => [
                'required',
            ],
            'article_description_uz' => [
                'required',
            ],
            'article_description_ru' => [
                'required',
            ],
            'article_description_en' => [
                'required',
            ],
            'country_id' => [
                'required',
                'integer',
            ],
            'directions.*' => [
                'integer',
            ],
            'directions' => [
                'required',
                'array',
            ],
            'ielts' => [
                'numeric',
                'required',
            ],
            'price' => [
                'required',
            ],
            'number' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}

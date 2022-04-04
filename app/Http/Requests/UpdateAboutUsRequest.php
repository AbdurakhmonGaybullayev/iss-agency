<?php

namespace App\Http\Requests;

use App\Models\AboutUs;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateAboutUsRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('about_us_edit');
    }

    public function rules()
    {
        return [
            'title_uz' => [
                'string',
                'required',
            ],
            'title_ru' => [
                'string',
                'required',
            ],
            'title_en' => [
                'string',
                'required',
            ],
            'image' => [
                'required',
            ],
            'short_description_uz' => [
                'required',
            ],
            'short_description_ru' => [
                'required',
            ],
            'short_description_en' => [
                'required',
            ],
            'advantages_uz' => [
                'string',
                'required',
            ],
            'advantages_ru' => [
                'string',
                'required',
            ],
            'advantages_en' => [
                'string',
                'required',
            ],
            'success_students' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'statistics_short_description_uz' => [
                'required',
            ],
            'statistics_short_description_ru' => [
                'required',
            ],
            'statistics_short_description_en' => [
                'required',
            ],
            'article_uz' => [
                'required',
            ],
            'article_ru' => [
                'required',
            ],
            'article_en' => [
                'required',
            ],
            'footer_text_uz' => [
                'required',
            ],
            'footer_text_ru' => [
                'required',
            ],
            'footer_text_en' => [
                'required',
            ],
        ];
    }
}

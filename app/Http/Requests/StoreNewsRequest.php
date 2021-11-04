<?php

namespace App\Http\Requests;

use App\Models\News;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreNewsRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('news_create');
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
            'article_uz' => [
                'required',
            ],
            'article_ru' => [
                'required',
            ],
            'article_en' => [
                'required',
            ],
        ];
    }
}

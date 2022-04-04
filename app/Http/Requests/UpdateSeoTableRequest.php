<?php

namespace App\Http\Requests;

use App\Models\SeoTable;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateSeoTableRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('seo_table_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
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
            'seo_description_uz' => [
                'required',
            ],
            'seo_description_ru' => [
                'required',
            ],
            'seo_description_en' => [
                'required',
            ],
            'image' => [
                'required',
            ],
            'seo_keywords_uz' => [
                'required',
            ],
            'seo_keywords_ru' => [
                'required',
            ],
            'seo_keywords_en' => [
                'required',
            ],
        ];
    }
}

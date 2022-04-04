<?php

namespace App\Http\Requests;

use App\Models\QandA;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreQandARequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('qand_a_create');
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
            'question_uz' => [
                'required',
            ],
            'question_ru' => [
                'required',
            ],
            'question_en' => [
                'required',
            ],
            'answer_uz' => [
                'required',
            ],
            'answer_ru' => [
                'required',
            ],
            'answer_en' => [
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

<?php

namespace App\Http\Requests;

use App\Models\Video;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateVideoRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('video_edit');
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
            'cover' => [
                'required',
            ],
            'file' => [
                'required_if:type,==,0'
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

<?php

namespace App\Http\Requests;

use App\Models\Header;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateHeaderRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('header_edit');
    }

    public function rules()
    {
        return [
            'about_us_uz' => [
                'string',
                'required',
            ],
            'about_us_ru' => [
                'string',
                'required',
            ],
            'about_us_en' => [
                'string',
                'required',
            ],
            'qanda_uz' => [
                'string',
                'required',
            ],
            'qanda_ru' => [
                'string',
                'required',
            ],
            'qanda_en' => [
                'string',
                'required',
            ],
            'cooperation_uz' => [
                'string',
                'required',
            ],
            'cooperation_ru' => [
                'string',
                'required',
            ],
            'cooperation_en' => [
                'string',
                'required',
            ],
            'universities_uz' => [
                'string',
                'required',
            ],
            'universities_ru' => [
                'string',
                'required',
            ],
            'universities_en' => [
                'string',
                'required',
            ],
            'gallery_uz' => [
                'string',
                'required',
            ],
            'gallery_ru' => [
                'string',
                'required',
            ],
            'gallery_en' => [
                'string',
                'required',
            ],
            'blog_uz' => [
                'string',
                'required',
            ],
            'blog_ru' => [
                'string',
                'required',
            ],
            'blog_en' => [
                'string',
                'required',
            ],
            'branch_uz' => [
                'string',
                'required',
            ],
            'branch_ru' => [
                'string',
                'required',
            ],
            'branch_en' => [
                'string',
                'required',
            ],
        ];
    }
}

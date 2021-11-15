<?php

namespace App\Http\Requests;

use App\Models\MainHeader;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateMainHeaderRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('main_header_edit');
    }

    public function rules()
    {
        return [
            'slogan_uz' => [
                'string',
                'required',
            ],
            'slogan_ru' => [
                'string',
                'required',
            ],
            'slogan_en' => [
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
        ];
    }
}

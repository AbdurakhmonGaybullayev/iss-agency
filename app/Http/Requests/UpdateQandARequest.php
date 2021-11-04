<?php

namespace App\Http\Requests;

use App\Models\QandA;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateQandARequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('qand_a_edit');
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
            'answer_uz' => [
                'required',
            ],
            'answer_ru' => [
                'required',
            ],
            'answer_en' => [
                'required',
            ],
        ];
    }
}

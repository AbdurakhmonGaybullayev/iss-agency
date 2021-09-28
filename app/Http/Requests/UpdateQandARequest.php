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
            'question' => [
                'string',
                'required',
            ],
            'answer' => [
                'string',
                'required',
            ],
            'number' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}

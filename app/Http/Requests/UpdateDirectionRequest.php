<?php

namespace App\Http\Requests;

use App\Models\Direction;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateDirectionRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('direction_edit');
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
            'programms.*' => [
                'integer',
            ],
            'programms' => [
                'required',
                'array',
            ],
        ];
    }
}

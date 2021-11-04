<?php

namespace App\Http\Requests;

use App\Models\Direction;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreDirectionRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('direction_create');
    }

    public function rules()
    {
        return [
            'name_uz' => [
                'string',
                'required',
                'unique:directions',
            ],
            'name_ru' => [
                'string',
                'required',
                'unique:directions',
            ],
            'name_en' => [
                'string',
                'required',
                'unique:directions',
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

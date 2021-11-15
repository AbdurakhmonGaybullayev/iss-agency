<?php

namespace App\Http\Requests;

use App\Models\Team;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateTeamRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('team_edit');
    }

    public function rules()
    {
        return [
            'full_name_uz' => [
                'string',
                'required',
                'unique:teams,full_name_uz,' . request()->route('team')->id,
            ],
            'full_name_ru' => [
                'string',
                'required',
                'unique:teams,full_name_ru,' . request()->route('team')->id,
            ],
            'full_name_en' => [
                'string',
                'required',
                'unique:teams,full_name_en,' . request()->route('team')->id,
            ],
            'occupation_uz' => [
                'string',
                'required',
            ],
            'occupation_ru' => [
                'string',
                'required',
            ],
            'occupation_en' => [
                'string',
                'required',
            ],
            'photo' => [
                'required',
            ],
            'number' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}

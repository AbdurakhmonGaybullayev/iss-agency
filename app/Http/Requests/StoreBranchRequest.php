<?php

namespace App\Http\Requests;

use App\Models\Branch;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreBranchRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('branch_create');
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
            'address_uz' => [
                'required',
            ],
            'address_ru' => [
                'required',
            ],
            'address_en' => [
                'required',
            ],
            'target_uz' => [
                'string',
                'required',
            ],
            'target_ru' => [
                'string',
                'required',
            ],
            'target_en' => [
                'string',
                'required',
            ],

            'working_hours_from' => [
                'string',
                'required',
            ],
            'working_hours_to' => [
                'string',
                'required',
            ],
            'working_days_from' => [
                'string',
                'required',
            ],
            'working_days_to' => [
                'string',
                'required',
            ],
            'google_map_link' => [
                'required',
            ],
            'number' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'region' => [
                'string',
                'required',
            ],
            'city' => [
                'string',
                'required',
            ],
        ];
    }
}

<?php

namespace App\Http\Requests;

use App\Models\Testimonial;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateTestimonialRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('testimonial_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'image' => [
                'required',
            ],
            'text_uz' => [
                'required',
            ],
            'text_ru' => [
                'required',
            ],
            'text_en' => [
                'required',
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
        ];
    }
}

<?php

namespace App\Http\Requests;

use App\Models\Gallery;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreGalleryRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('gallery_create');
    }

    public function rules()
    {
        return [
            'image' => [
                'array',
                'required',
            ],
            'image.*' => [
                'required',
            ],
            'cover' => [
                'required',
            ],
            'country_id' => [
                'required',
                'integer',
            ],
        ];
    }
}

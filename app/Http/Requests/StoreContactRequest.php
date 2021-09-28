<?php

namespace App\Http\Requests;

use App\Models\Contact;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreContactRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('contact_create');
    }

    public function rules()
    {
        return [
            'email' => [
                'required',
            ],
            'phone_number' => [
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
            'instagram' => [
                'string',
                'required',
            ],
            'telegram' => [
                'string',
                'required',
            ],
            'facebook' => [
                'string',
                'required',
            ],
        ];
    }
}

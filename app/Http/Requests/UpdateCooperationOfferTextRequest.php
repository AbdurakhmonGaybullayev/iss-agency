<?php

namespace App\Http\Requests;

use App\Models\CooperationOfferText;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateCooperationOfferTextRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('cooperation_offer_text_edit');
    }

    public function rules()
    {
        return [
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
            'offer_uz' => [
                'required',
            ],
            'offer_ru' => [
                'required',
            ],
            'offer_en' => [
                'required',
            ],
        ];
    }
}

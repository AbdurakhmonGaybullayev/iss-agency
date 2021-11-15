<?php

namespace App\Http\Requests;

use App\Models\CooperationOfferText;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyCooperationOfferTextRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('cooperation_offer_text_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:cooperation_offer_texts,id',
        ];
    }
}

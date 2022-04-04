<?php

namespace App\Http\Requests;

use App\Models\SeoTable;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroySeoTableRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('seo_table_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:seo_tables,id',
        ];
    }
}

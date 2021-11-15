<?php

namespace App\Http\Requests;

use App\Models\Header;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreHeaderRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('header_create');
    }

    public function rules()
    {
        return [];
    }
}

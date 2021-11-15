@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.cooperationOfferText.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.cooperation-offer-texts.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.cooperationOfferText.fields.id') }}
                        </th>
                        <td>
                            {{ $cooperationOfferText->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cooperationOfferText.fields.title_uz') }}
                        </th>
                        <td>
                            {{ $cooperationOfferText->title_uz }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cooperationOfferText.fields.title_ru') }}
                        </th>
                        <td>
                            {{ $cooperationOfferText->title_ru }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cooperationOfferText.fields.title_en') }}
                        </th>
                        <td>
                            {{ $cooperationOfferText->title_en }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cooperationOfferText.fields.offer_uz') }}
                        </th>
                        <td>
                            {{ $cooperationOfferText->offer_uz }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cooperationOfferText.fields.offer_ru') }}
                        </th>
                        <td>
                            {{ $cooperationOfferText->offer_ru }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cooperationOfferText.fields.offer_en') }}
                        </th>
                        <td>
                            {{ $cooperationOfferText->offer_en }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.cooperation-offer-texts.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
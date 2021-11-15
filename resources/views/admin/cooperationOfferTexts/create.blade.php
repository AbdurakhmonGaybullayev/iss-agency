@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.cooperationOfferText.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.cooperation-offer-texts.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="title_uz">{{ trans('cruds.cooperationOfferText.fields.title_uz') }}</label>
                <input class="form-control {{ $errors->has('title_uz') ? 'is-invalid' : '' }}" type="text" name="title_uz" id="title_uz" value="{{ old('title_uz', '') }}" required>
                @if($errors->has('title_uz'))
                    <div class="invalid-feedback">
                        {{ $errors->first('title_uz') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.cooperationOfferText.fields.title_uz_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="title_ru">{{ trans('cruds.cooperationOfferText.fields.title_ru') }}</label>
                <input class="form-control {{ $errors->has('title_ru') ? 'is-invalid' : '' }}" type="text" name="title_ru" id="title_ru" value="{{ old('title_ru', '') }}" required>
                @if($errors->has('title_ru'))
                    <div class="invalid-feedback">
                        {{ $errors->first('title_ru') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.cooperationOfferText.fields.title_ru_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="title_en">{{ trans('cruds.cooperationOfferText.fields.title_en') }}</label>
                <input class="form-control {{ $errors->has('title_en') ? 'is-invalid' : '' }}" type="text" name="title_en" id="title_en" value="{{ old('title_en', '') }}" required>
                @if($errors->has('title_en'))
                    <div class="invalid-feedback">
                        {{ $errors->first('title_en') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.cooperationOfferText.fields.title_en_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="offer_uz">{{ trans('cruds.cooperationOfferText.fields.offer_uz') }}</label>
                <textarea class="form-control {{ $errors->has('offer_uz') ? 'is-invalid' : '' }}" name="offer_uz" id="offer_uz" required>{{ old('offer_uz') }}</textarea>
                @if($errors->has('offer_uz'))
                    <div class="invalid-feedback">
                        {{ $errors->first('offer_uz') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.cooperationOfferText.fields.offer_uz_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="offer_ru">{{ trans('cruds.cooperationOfferText.fields.offer_ru') }}</label>
                <textarea class="form-control {{ $errors->has('offer_ru') ? 'is-invalid' : '' }}" name="offer_ru" id="offer_ru" required>{{ old('offer_ru') }}</textarea>
                @if($errors->has('offer_ru'))
                    <div class="invalid-feedback">
                        {{ $errors->first('offer_ru') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.cooperationOfferText.fields.offer_ru_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="offer_en">{{ trans('cruds.cooperationOfferText.fields.offer_en') }}</label>
                <textarea class="form-control {{ $errors->has('offer_en') ? 'is-invalid' : '' }}" name="offer_en" id="offer_en" required>{{ old('offer_en') }}</textarea>
                @if($errors->has('offer_en'))
                    <div class="invalid-feedback">
                        {{ $errors->first('offer_en') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.cooperationOfferText.fields.offer_en_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection
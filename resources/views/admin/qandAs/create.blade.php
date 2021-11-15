@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.qandA.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.qand-as.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="number">{{ trans('cruds.qandA.fields.number') }}</label>
                <input class="form-control {{ $errors->has('number') ? 'is-invalid' : '' }}" type="number" name="number" id="number" value="{{ old('number', '1') }}" step="1" required>
                @if($errors->has('number'))
                    <div class="invalid-feedback">
                        {{ $errors->first('number') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.qandA.fields.number_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="question_uz">{{ trans('cruds.qandA.fields.question_uz') }}</label>
                <textarea class="form-control {{ $errors->has('question_uz') ? 'is-invalid' : '' }}" name="question_uz" id="question_uz" required>{{ old('question_uz') }}</textarea>
                @if($errors->has('question_uz'))
                    <div class="invalid-feedback">
                        {{ $errors->first('question_uz') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.qandA.fields.question_uz_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="question_ru">{{ trans('cruds.qandA.fields.question_ru') }}</label>
                <textarea class="form-control {{ $errors->has('question_ru') ? 'is-invalid' : '' }}" name="question_ru" id="question_ru">{{ old('question_ru') }}</textarea>
                @if($errors->has('question_ru'))
                    <div class="invalid-feedback">
                        {{ $errors->first('question_ru') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.qandA.fields.question_ru_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="question_en">{{ trans('cruds.qandA.fields.question_en') }}</label>
                <textarea class="form-control {{ $errors->has('question_en') ? 'is-invalid' : '' }}" name="question_en" id="question_en">{{ old('question_en') }}</textarea>
                @if($errors->has('question_en'))
                    <div class="invalid-feedback">
                        {{ $errors->first('question_en') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.qandA.fields.question_en_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="answer_uz">{{ trans('cruds.qandA.fields.answer_uz') }}</label>
                <textarea class="form-control {{ $errors->has('answer_uz') ? 'is-invalid' : '' }}" name="answer_uz" id="answer_uz" required>{{ old('answer_uz') }}</textarea>
                @if($errors->has('answer_uz'))
                    <div class="invalid-feedback">
                        {{ $errors->first('answer_uz') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.qandA.fields.answer_uz_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="answer_ru">{{ trans('cruds.qandA.fields.answer_ru') }}</label>
                <textarea class="form-control {{ $errors->has('answer_ru') ? 'is-invalid' : '' }}" name="answer_ru" id="answer_ru" required>{{ old('answer_ru') }}</textarea>
                @if($errors->has('answer_ru'))
                    <div class="invalid-feedback">
                        {{ $errors->first('answer_ru') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.qandA.fields.answer_ru_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="answer_en">{{ trans('cruds.qandA.fields.answer_en') }}</label>
                <textarea class="form-control {{ $errors->has('answer_en') ? 'is-invalid' : '' }}" name="answer_en" id="answer_en" required>{{ old('answer_en') }}</textarea>
                @if($errors->has('answer_en'))
                    <div class="invalid-feedback">
                        {{ $errors->first('answer_en') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.qandA.fields.answer_en_helper') }}</span>
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

@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.branchs.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.branches.update", [$branch->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="name_uz">{{ trans('cruds.branchs.fields.name_uz') }}</label>
                <input class="form-control {{ $errors->has('name_uz') ? 'is-invalid' : '' }}" type="text" name="name_uz" id="name_uz" value="{{ old('name_uz', $branch->name_uz) }}" required>
                @if($errors->has('name_uz'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name_uz') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.branchs.fields.name_uz_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="name_ru">{{ trans('cruds.branchs.fields.name_ru') }}</label>
                <input class="form-control {{ $errors->has('name_ru') ? 'is-invalid' : '' }}" type="text" name="name_ru" id="name_ru" value="{{ old('name_ru', $branch->name_ru) }}" required>
                @if($errors->has('name_ru'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name_ru') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.branchs.fields.name_ru_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="name_en">{{ trans('cruds.branchs.fields.name_en') }}</label>
                <input class="form-control {{ $errors->has('name_en') ? 'is-invalid' : '' }}" type="text" name="name_en" id="name_en" value="{{ old('name_en', $branch->name_en) }}" required>
                @if($errors->has('name_en'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name_en') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.branchs.fields.name_en_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="address_uz">{{ trans('cruds.branchs.fields.address_uz') }}</label>
                <textarea class="form-control {{ $errors->has('address_uz') ? 'is-invalid' : '' }}" name="address_uz" id="address_uz" required>{{ old('address_uz', $branch->address_uz) }}</textarea>
                @if($errors->has('address_uz'))
                    <div class="invalid-feedback">
                        {{ $errors->first('address_uz') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.branchs.fields.address_uz_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="address_ru">{{ trans('cruds.branchs.fields.address_ru') }}</label>
                <textarea class="form-control {{ $errors->has('address_ru') ? 'is-invalid' : '' }}" name="address_ru" id="address_ru" required>{{ old('address_ru', $branch->address_ru) }}</textarea>
                @if($errors->has('address_ru'))
                    <div class="invalid-feedback">
                        {{ $errors->first('address_ru') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.branchs.fields.address_ru_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="address_en">{{ trans('cruds.branchs.fields.address_en') }}</label>
                <textarea class="form-control {{ $errors->has('address_en') ? 'is-invalid' : '' }}" name="address_en" id="address_en" required>{{ old('address_en', $branch->address_en) }}</textarea>
                @if($errors->has('address_en'))
                    <div class="invalid-feedback">
                        {{ $errors->first('address_en') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.branchs.fields.address_en_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="target_uz">{{ trans('cruds.branchs.fields.target_uz') }}</label>
                <input class="form-control {{ $errors->has('target_uz') ? 'is-invalid' : '' }}" type="text" name="target_uz" id="target_uz" value="{{ old('target_uz', $branch->target_uz) }}" required>
                @if($errors->has('target_uz'))
                    <div class="invalid-feedback">
                        {{ $errors->first('target_uz') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.branchs.fields.target_uz_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="target_ru">{{ trans('cruds.branchs.fields.target_ru') }}</label>
                <input class="form-control {{ $errors->has('target_ru') ? 'is-invalid' : '' }}" type="text" name="target_ru" id="target_ru" value="{{ old('target_ru', $branch->target_ru) }}" required>
                @if($errors->has('target_ru'))
                    <div class="invalid-feedback">
                        {{ $errors->first('target_ru') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.branchs.fields.target_ru_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="target_en">{{ trans('cruds.branchs.fields.target_en') }}</label>
                <input class="form-control {{ $errors->has('target_en') ? 'is-invalid' : '' }}" type="text" name="target_en" id="target_en" value="{{ old('target_en', $branch->target_en) }}" required>
                @if($errors->has('target_en'))
                    <div class="invalid-feedback">
                        {{ $errors->first('target_en') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.branchs.fields.target_en_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="phone_number">{{ trans('cruds.branchs.fields.phone_number') }}</label>
                <input class="form-control {{ $errors->has('phone_number') ? 'is-invalid' : '' }}" type="text" name="phone_number" id="phone_number" value="{{ old('phone_number', $branch->phone_number) }}" required>
                @if($errors->has('phone_number'))
                    <div class="invalid-feedback">
                        {{ $errors->first('phone_number') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.branchs.fields.phone_number_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="email">{{ trans('cruds.branchs.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" id="email" value="{{ old('email', $branch->email) }}" required>
                @if($errors->has('email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.branchs.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="working_hours">{{ trans('cruds.branchs.fields.working_hours') }}</label>
                <input class="form-control {{ $errors->has('working_hours') ? 'is-invalid' : '' }}" type="text" name="working_hours" id="working_hours" value="{{ old('working_hours', $branch->working_hours) }}" required>
                @if($errors->has('working_hours'))
                    <div class="invalid-feedback">
                        {{ $errors->first('working_hours') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.branchs.fields.working_hours_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="google_map_link">{{ trans('cruds.branchs.fields.google_map_link') }}</label>
                <textarea class="form-control {{ $errors->has('google_map_link') ? 'is-invalid' : '' }}" name="google_map_link" id="google_map_link" required>{{ old('google_map_link', $branch->google_map_link) }}</textarea>
                @if($errors->has('google_map_link'))
                    <div class="invalid-feedback">
                        {{ $errors->first('google_map_link') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.branchs.fields.google_map_link_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="number">{{ trans('cruds.branchs.fields.number') }}</label>
                <input class="form-control {{ $errors->has('number') ? 'is-invalid' : '' }}" type="number" name="number" id="number" value="{{ old('number', $branch->number) }}" step="1" required>
                @if($errors->has('number'))
                    <div class="invalid-feedback">
                        {{ $errors->first('number') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.branchs.fields.number_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="region">{{ trans('cruds.branchs.fields.region') }}</label>
                <input class="form-control {{ $errors->has('region') ? 'is-invalid' : '' }}" type="text" name="region" id="region" value="{{ old('region', $branch->region) }}" required>
                @if($errors->has('region'))
                    <div class="invalid-feedback">
                        {{ $errors->first('region') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.branchs.fields.region_helper') }}</span>
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

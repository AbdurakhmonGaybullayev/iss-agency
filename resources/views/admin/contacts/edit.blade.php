@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.contact.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.contacts.update", [$contact->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="email">{{ trans('cruds.contact.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" id="email" value="{{ old('email', $contact->email) }}" required>
                @if($errors->has('email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.contact.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="phone_number">{{ trans('cruds.contact.fields.phone_number') }}</label>
                <input class="form-control {{ $errors->has('phone_number') ? 'is-invalid' : '' }}" type="text" name="phone_number" id="phone_number" value="{{ old('phone_number', $contact->phone_number) }}" required>
                @if($errors->has('phone_number'))
                    <div class="invalid-feedback">
                        {{ $errors->first('phone_number') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.contact.fields.phone_number_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="address_uz">{{ trans('cruds.contact.fields.address_uz') }}</label>
                <textarea class="form-control {{ $errors->has('address_uz') ? 'is-invalid' : '' }}" name="address_uz" id="address_uz" required>{{ old('address_uz', $contact->address_uz) }}</textarea>
                @if($errors->has('address_uz'))
                    <div class="invalid-feedback">
                        {{ $errors->first('address_uz') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.contact.fields.address_uz_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="address_ru">{{ trans('cruds.contact.fields.address_ru') }}</label>
                <textarea class="form-control {{ $errors->has('address_ru') ? 'is-invalid' : '' }}" name="address_ru" id="address_ru" required>{{ old('address_ru', $contact->address_ru) }}</textarea>
                @if($errors->has('address_ru'))
                    <div class="invalid-feedback">
                        {{ $errors->first('address_ru') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.contact.fields.address_ru_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="address_en">{{ trans('cruds.contact.fields.address_en') }}</label>
                <textarea class="form-control {{ $errors->has('address_en') ? 'is-invalid' : '' }}" name="address_en" id="address_en" required>{{ old('address_en', $contact->address_en) }}</textarea>
                @if($errors->has('address_en'))
                    <div class="invalid-feedback">
                        {{ $errors->first('address_en') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.contact.fields.address_en_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="instagram">{{ trans('cruds.contact.fields.instagram') }}</label>
                <input class="form-control {{ $errors->has('instagram') ? 'is-invalid' : '' }}" type="text" name="instagram" id="instagram" value="{{ old('instagram', $contact->instagram) }}" required>
                @if($errors->has('instagram'))
                    <div class="invalid-feedback">
                        {{ $errors->first('instagram') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.contact.fields.instagram_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="telegram">{{ trans('cruds.contact.fields.telegram') }}</label>
                <input class="form-control {{ $errors->has('telegram') ? 'is-invalid' : '' }}" type="text" name="telegram" id="telegram" value="{{ old('telegram', $contact->telegram) }}" required>
                @if($errors->has('telegram'))
                    <div class="invalid-feedback">
                        {{ $errors->first('telegram') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.contact.fields.telegram_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="facebook">{{ trans('cruds.contact.fields.facebook') }}</label>
                <input class="form-control {{ $errors->has('facebook') ? 'is-invalid' : '' }}" type="text" name="facebook" id="facebook" value="{{ old('facebook', $contact->facebook) }}" required>
                @if($errors->has('facebook'))
                    <div class="invalid-feedback">
                        {{ $errors->first('facebook') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.contact.fields.facebook_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="branch_id">{{ trans('cruds.contact.fields.branch') }}</label>
                <select class="form-control select2 {{ $errors->has('branch') ? 'is-invalid' : '' }}" name="branch_id" id="branch_id" required>
                    @foreach($branches as $id => $entry)
                        <option value="{{ $id }}" {{ (old('branch_id') ? old('branch_id') : $contact->branch->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('branch'))
                    <div class="invalid-feedback">
                        {{ $errors->first('branch') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.contact.fields.branch_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.contact.fields.type') }}</label>
                <select class="form-control {{ $errors->has('type') ? 'is-invalid' : '' }}" name="type" id="type" required>
                    <option value disabled {{ old('type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Contact::TYPE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('type', $contact->type) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('type'))
                    <div class="invalid-feedback">
                        {{ $errors->first('type') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.contact.fields.type_helper') }}</span>
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
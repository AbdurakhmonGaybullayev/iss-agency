@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.application.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.applications.update", [$application->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="user_id">{{ trans('cruds.application.fields.user') }}</label>
                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id" required>
                    @foreach($users as $id => $entry)
                        <option value="{{ $id }}" {{ (old('user_id') ? old('user_id') : $application->user->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('user'))
                    <div class="invalid-feedback">
                        {{ $errors->first('user') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.application.fields.user_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="certificates">{{ trans('cruds.application.fields.certificates') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('certificates') ? 'is-invalid' : '' }}" name="certificates[]" id="certificates" multiple>
                    @foreach($certificates as $id => $certificate)
                        <option value="{{ $id }}" {{ (in_array($id, old('certificates', [])) || $application->certificates->contains($id)) ? 'selected' : '' }}>{{ $certificate }}</option>
                    @endforeach
                </select>
                @if($errors->has('certificates'))
                    <div class="invalid-feedback">
                        {{ $errors->first('certificates') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.application.fields.certificates_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('certificate_status') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="certificate_status" value="0">
                    <input class="form-check-input" type="checkbox" name="certificate_status" id="certificate_status" value="1" {{ $application->certificate_status || old('certificate_status', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="certificate_status">{{ trans('cruds.application.fields.certificate_status') }}</label>
                </div>
                @if($errors->has('certificate_status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('certificate_status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.application.fields.certificate_status_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="message">{{ trans('cruds.application.fields.message') }}</label>
                <textarea class="form-control {{ $errors->has('message') ? 'is-invalid' : '' }}" name="message" id="message" required>{{ old('message', $application->message) }}</textarea>
                @if($errors->has('message'))
                    <div class="invalid-feedback">
                        {{ $errors->first('message') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.application.fields.message_helper') }}</span>
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

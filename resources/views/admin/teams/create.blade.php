@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.team.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.teams.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="full_name_uz">{{ trans('cruds.team.fields.full_name_uz') }}</label>
                <input class="form-control {{ $errors->has('full_name_uz') ? 'is-invalid' : '' }}" type="text" name="full_name_uz" id="full_name_uz" value="{{ old('full_name_uz', '') }}" required>
                @if($errors->has('full_name_uz'))
                    <div class="invalid-feedback">
                        {{ $errors->first('full_name_uz') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.team.fields.full_name_uz_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="full_name_ru">{{ trans('cruds.team.fields.full_name_ru') }}</label>
                <input class="form-control {{ $errors->has('full_name_ru') ? 'is-invalid' : '' }}" type="text" name="full_name_ru" id="full_name_ru" value="{{ old('full_name_ru', '') }}" required>
                @if($errors->has('full_name_ru'))
                    <div class="invalid-feedback">
                        {{ $errors->first('full_name_ru') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.team.fields.full_name_ru_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="full_name_en">{{ trans('cruds.team.fields.full_name_en') }}</label>
                <input class="form-control {{ $errors->has('full_name_en') ? 'is-invalid' : '' }}" type="text" name="full_name_en" id="full_name_en" value="{{ old('full_name_en', '') }}" required>
                @if($errors->has('full_name_en'))
                    <div class="invalid-feedback">
                        {{ $errors->first('full_name_en') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.team.fields.full_name_en_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="occupation_uz">{{ trans('cruds.team.fields.occupation_uz') }}</label>
                <input class="form-control {{ $errors->has('occupation_uz') ? 'is-invalid' : '' }}" type="text" name="occupation_uz" id="occupation_uz" value="{{ old('occupation_uz', '') }}" required>
                @if($errors->has('occupation_uz'))
                    <div class="invalid-feedback">
                        {{ $errors->first('occupation_uz') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.team.fields.occupation_uz_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="occupation_ru">{{ trans('cruds.team.fields.occupation_ru') }}</label>
                <input class="form-control {{ $errors->has('occupation_ru') ? 'is-invalid' : '' }}" type="text" name="occupation_ru" id="occupation_ru" value="{{ old('occupation_ru', '') }}" required>
                @if($errors->has('occupation_ru'))
                    <div class="invalid-feedback">
                        {{ $errors->first('occupation_ru') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.team.fields.occupation_ru_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="occupation_en">{{ trans('cruds.team.fields.occupation_en') }}</label>
                <input class="form-control {{ $errors->has('occupation_en') ? 'is-invalid' : '' }}" type="text" name="occupation_en" id="occupation_en" value="{{ old('occupation_en', '') }}" required>
                @if($errors->has('occupation_en'))
                    <div class="invalid-feedback">
                        {{ $errors->first('occupation_en') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.team.fields.occupation_en_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="photo">{{ trans('cruds.team.fields.photo') }}</label>
                <div class="needsclick dropzone {{ $errors->has('photo') ? 'is-invalid' : '' }}" id="photo-dropzone">
                </div>
                @if($errors->has('photo'))
                    <div class="invalid-feedback">
                        {{ $errors->first('photo') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.team.fields.photo_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="number">{{ trans('cruds.team.fields.number') }}</label>
                <input class="form-control {{ $errors->has('number') ? 'is-invalid' : '' }}" type="number" name="number" id="number" value="{{ old('number', '') }}" step="1" required>
                @if($errors->has('number'))
                    <div class="invalid-feedback">
                        {{ $errors->first('number') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.team.fields.number_helper') }}</span>
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

@section('scripts')
<script>
    Dropzone.options.photoDropzone = {
    url: '{{ route('admin.teams.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="photo"]').remove()
      $('form').append('<input type="hidden" name="photo" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="photo"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($team) && $team->photo)
      var file = {!! json_encode($team->photo) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="photo" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}
</script>
@endsection
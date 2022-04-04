@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.mainHeader.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.main-headers.update", [$mainHeader->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="slogan_uz">{{ trans('cruds.mainHeader.fields.slogan_uz') }}</label>
                <input class="form-control {{ $errors->has('slogan_uz') ? 'is-invalid' : '' }}" type="text" name="slogan_uz" id="slogan_uz" value="{{ old('slogan_uz', $mainHeader->slogan_uz) }}" required>
                @if($errors->has('slogan_uz'))
                    <div class="invalid-feedback">
                        {{ $errors->first('slogan_uz') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.mainHeader.fields.slogan_uz_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="slogan_ru">{{ trans('cruds.mainHeader.fields.slogan_ru') }}</label>
                <input class="form-control {{ $errors->has('slogan_ru') ? 'is-invalid' : '' }}" type="text" name="slogan_ru" id="slogan_ru" value="{{ old('slogan_ru', $mainHeader->slogan_ru) }}" required>
                @if($errors->has('slogan_ru'))
                    <div class="invalid-feedback">
                        {{ $errors->first('slogan_ru') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.mainHeader.fields.slogan_ru_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="slogan_en">{{ trans('cruds.mainHeader.fields.slogan_en') }}</label>
                <input class="form-control {{ $errors->has('slogan_en') ? 'is-invalid' : '' }}" type="text" name="slogan_en" id="slogan_en" value="{{ old('slogan_en', $mainHeader->slogan_en) }}" required>
                @if($errors->has('slogan_en'))
                    <div class="invalid-feedback">
                        {{ $errors->first('slogan_en') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.mainHeader.fields.slogan_en_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="title_uz">{{ trans('cruds.mainHeader.fields.title_uz') }}</label>
                <input class="form-control {{ $errors->has('title_uz') ? 'is-invalid' : '' }}" type="text" name="title_uz" id="title_uz" value="{{ old('title_uz', $mainHeader->title_uz) }}" required>
                @if($errors->has('title_uz'))
                    <div class="invalid-feedback">
                        {{ $errors->first('title_uz') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.mainHeader.fields.title_uz_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="title_ru">{{ trans('cruds.mainHeader.fields.title_ru') }}</label>
                <input class="form-control {{ $errors->has('title_ru') ? 'is-invalid' : '' }}" type="text" name="title_ru" id="title_ru" value="{{ old('title_ru', $mainHeader->title_ru) }}" required>
                @if($errors->has('title_ru'))
                    <div class="invalid-feedback">
                        {{ $errors->first('title_ru') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.mainHeader.fields.title_ru_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="title_en">{{ trans('cruds.mainHeader.fields.title_en') }}</label>
                <input class="form-control {{ $errors->has('title_en') ? 'is-invalid' : '' }}" type="text" name="title_en" id="title_en" value="{{ old('title_en', $mainHeader->title_en) }}" required>
                @if($errors->has('title_en'))
                    <div class="invalid-feedback">
                        {{ $errors->first('title_en') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.mainHeader.fields.title_en_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="background_image">{{ trans('cruds.mainHeader.fields.background_image') }}</label>
                <div class="needsclick dropzone {{ $errors->has('background_image') ? 'is-invalid' : '' }}" id="background_image-dropzone">
                </div>
                @if($errors->has('background_image'))
                    <div class="invalid-feedback">
                        {{ $errors->first('background_image') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.mainHeader.fields.background_image_helper') }}</span>
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
    Dropzone.options.backgroundImageDropzone = {
    url: '{{ route('admin.main-headers.storeMedia') }}',
    maxFilesize: 10, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 10,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="background_image"]').remove()
      $('form').append('<input type="hidden" name="background_image" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="background_image"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($mainHeader) && $mainHeader->background_image)
      var file = {!! json_encode($mainHeader->background_image) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="background_image" value="' + file.file_name + '">')
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

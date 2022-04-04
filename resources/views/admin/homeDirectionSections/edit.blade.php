@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.homeDirectionSection.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.home-direction-sections.update", [$homeDirectionSection->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="image">{{ trans('cruds.homeDirectionSection.fields.image') }}</label>
                <div class="needsclick dropzone {{ $errors->has('image') ? 'is-invalid' : '' }}" id="image-dropzone">
                </div>
                @if($errors->has('image'))
                    <div class="invalid-feedback">
                        {{ $errors->first('image') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.homeDirectionSection.fields.image_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="name_uz">{{ trans('cruds.homeDirectionSection.fields.name_uz') }}</label>
                <input class="form-control {{ $errors->has('name_uz') ? 'is-invalid' : '' }}" type="text" name="name_uz" id="name_uz" value="{{ old('name_uz', $homeDirectionSection->name_uz) }}" required>
                @if($errors->has('name_uz'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name_uz') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.homeDirectionSection.fields.name_uz_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="name_ru">{{ trans('cruds.homeDirectionSection.fields.name_ru') }}</label>
                <input class="form-control {{ $errors->has('name_ru') ? 'is-invalid' : '' }}" type="text" name="name_ru" id="name_ru" value="{{ old('name_ru', $homeDirectionSection->name_ru) }}" required>
                @if($errors->has('name_ru'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name_ru') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.homeDirectionSection.fields.name_ru_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="name_en">{{ trans('cruds.homeDirectionSection.fields.name_en') }}</label>
                <input class="form-control {{ $errors->has('name_en') ? 'is-invalid' : '' }}" type="text" name="name_en" id="name_en" value="{{ old('name_en', $homeDirectionSection->name_en) }}" required>
                @if($errors->has('name_en'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name_en') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.homeDirectionSection.fields.name_en_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="short_description_uz">{{ trans('cruds.homeDirectionSection.fields.short_description_uz') }}</label>
                <input class="form-control {{ $errors->has('short_description_uz') ? 'is-invalid' : '' }}" type="text" name="short_description_uz" id="short_description_uz" value="{{ old('short_description_uz', $homeDirectionSection->short_description_uz) }}">
                @if($errors->has('short_description_uz'))
                    <div class="invalid-feedback">
                        {{ $errors->first('short_description_uz') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.homeDirectionSection.fields.short_description_uz_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="short_description_ru">{{ trans('cruds.homeDirectionSection.fields.short_description_ru') }}</label>
                <input class="form-control {{ $errors->has('short_description_ru') ? 'is-invalid' : '' }}" type="text" name="short_description_ru" id="short_description_ru" value="{{ old('short_description_ru', $homeDirectionSection->short_description_ru) }}">
                @if($errors->has('short_description_ru'))
                    <div class="invalid-feedback">
                        {{ $errors->first('short_description_ru') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.homeDirectionSection.fields.short_description_ru_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="short_description_en">{{ trans('cruds.homeDirectionSection.fields.short_description_en') }}</label>
                <input class="form-control {{ $errors->has('short_description_en') ? 'is-invalid' : '' }}" type="text" name="short_description_en" id="short_description_en" value="{{ old('short_description_en', $homeDirectionSection->short_description_en) }}">
                @if($errors->has('short_description_en'))
                    <div class="invalid-feedback">
                        {{ $errors->first('short_description_en') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.homeDirectionSection.fields.short_description_en_helper') }}</span>
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
    Dropzone.options.imageDropzone = {
    url: '{{ route('admin.home-direction-sections.storeMedia') }}',
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
      $('form').find('input[name="image"]').remove()
      $('form').append('<input type="hidden" name="image" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="image"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($homeDirectionSection) && $homeDirectionSection->image)
      var file = {!! json_encode($homeDirectionSection->image) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="image" value="' + file.file_name + '">')
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

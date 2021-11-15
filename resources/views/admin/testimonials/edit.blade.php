@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.testimonial.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.testimonials.update", [$testimonial->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="number">{{ trans('cruds.testimonial.fields.number') }}</label>
                <input class="form-control {{ $errors->has('number') ? 'is-invalid' : '' }}" type="number" name="number" id="number" value="{{ old('number', $testimonial->number) }}" step="1" required>
                @if($errors->has('number'))
                    <div class="invalid-feedback">
                        {{ $errors->first('number') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.testimonial.fields.number_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.testimonial.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $testimonial->name) }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.testimonial.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="image">{{ trans('cruds.testimonial.fields.image') }}</label>
                <div class="needsclick dropzone {{ $errors->has('image') ? 'is-invalid' : '' }}" id="image-dropzone">
                </div>
                @if($errors->has('image'))
                    <div class="invalid-feedback">
                        {{ $errors->first('image') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.testimonial.fields.image_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="text_uz">{{ trans('cruds.testimonial.fields.text_uz') }}</label>
                <textarea class="form-control {{ $errors->has('text_uz') ? 'is-invalid' : '' }}" name="text_uz" id="text_uz" required>{{ old('text_uz', $testimonial->text_uz) }}</textarea>
                @if($errors->has('text_uz'))
                    <div class="invalid-feedback">
                        {{ $errors->first('text_uz') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.testimonial.fields.text_uz_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="text_ru">{{ trans('cruds.testimonial.fields.text_ru') }}</label>
                <textarea class="form-control {{ $errors->has('text_ru') ? 'is-invalid' : '' }}" name="text_ru" id="text_ru" required>{{ old('text_ru', $testimonial->text_ru) }}</textarea>
                @if($errors->has('text_ru'))
                    <div class="invalid-feedback">
                        {{ $errors->first('text_ru') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.testimonial.fields.text_ru_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="text_en">{{ trans('cruds.testimonial.fields.text_en') }}</label>
                <textarea class="form-control {{ $errors->has('text_en') ? 'is-invalid' : '' }}" name="text_en" id="text_en" required>{{ old('text_en', $testimonial->text_en) }}</textarea>
                @if($errors->has('text_en'))
                    <div class="invalid-feedback">
                        {{ $errors->first('text_en') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.testimonial.fields.text_en_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="occupation_uz">{{ trans('cruds.testimonial.fields.occupation_uz') }}</label>
                <input class="form-control {{ $errors->has('occupation_uz') ? 'is-invalid' : '' }}" type="text" name="occupation_uz" id="occupation_uz" value="{{ old('occupation_uz', $testimonial->occupation_uz) }}" required>
                @if($errors->has('occupation_uz'))
                    <div class="invalid-feedback">
                        {{ $errors->first('occupation_uz') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.testimonial.fields.occupation_uz_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="occupation_ru">{{ trans('cruds.testimonial.fields.occupation_ru') }}</label>
                <input class="form-control {{ $errors->has('occupation_ru') ? 'is-invalid' : '' }}" type="text" name="occupation_ru" id="occupation_ru" value="{{ old('occupation_ru', $testimonial->occupation_ru) }}" required>
                @if($errors->has('occupation_ru'))
                    <div class="invalid-feedback">
                        {{ $errors->first('occupation_ru') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.testimonial.fields.occupation_ru_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="occupation_en">{{ trans('cruds.testimonial.fields.occupation_en') }}</label>
                <input class="form-control {{ $errors->has('occupation_en') ? 'is-invalid' : '' }}" type="text" name="occupation_en" id="occupation_en" value="{{ old('occupation_en', $testimonial->occupation_en) }}" required>
                @if($errors->has('occupation_en'))
                    <div class="invalid-feedback">
                        {{ $errors->first('occupation_en') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.testimonial.fields.occupation_en_helper') }}</span>
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
    url: '{{ route('admin.testimonials.storeMedia') }}',
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
@if(isset($testimonial) && $testimonial->image)
      var file = {!! json_encode($testimonial->image) !!}
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
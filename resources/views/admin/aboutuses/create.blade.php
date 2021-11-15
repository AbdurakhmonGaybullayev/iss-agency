@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.aboutUs.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.aboutuses.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="title_uz">{{ trans('cruds.aboutUs.fields.title_uz') }}</label>
                <input class="form-control {{ $errors->has('title_uz') ? 'is-invalid' : '' }}" type="text" name="title_uz" id="title_uz" value="{{ old('title_uz', '') }}" required>
                @if($errors->has('title_uz'))
                    <div class="invalid-feedback">
                        {{ $errors->first('title_uz') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.aboutUs.fields.title_uz_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="title_ru">{{ trans('cruds.aboutUs.fields.title_ru') }}</label>
                <input class="form-control {{ $errors->has('title_ru') ? 'is-invalid' : '' }}" type="text" name="title_ru" id="title_ru" value="{{ old('title_ru', '') }}" required>
                @if($errors->has('title_ru'))
                    <div class="invalid-feedback">
                        {{ $errors->first('title_ru') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.aboutUs.fields.title_ru_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="title_en">{{ trans('cruds.aboutUs.fields.title_en') }}</label>
                <input class="form-control {{ $errors->has('title_en') ? 'is-invalid' : '' }}" type="text" name="title_en" id="title_en" value="{{ old('title_en', '') }}" required>
                @if($errors->has('title_en'))
                    <div class="invalid-feedback">
                        {{ $errors->first('title_en') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.aboutUs.fields.title_en_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="image">{{ trans('cruds.aboutUs.fields.image') }}</label>
                <div class="needsclick dropzone {{ $errors->has('image') ? 'is-invalid' : '' }}" id="image-dropzone">
                </div>
                @if($errors->has('image'))
                    <div class="invalid-feedback">
                        {{ $errors->first('image') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.aboutUs.fields.image_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="short_description_uz">{{ trans('cruds.aboutUs.fields.short_description_uz') }}</label>
                <textarea class="form-control {{ $errors->has('short_description_uz') ? 'is-invalid' : '' }}" name="short_description_uz" id="short_description_uz" required>{{ old('short_description_uz') }}</textarea>
                @if($errors->has('short_description_uz'))
                    <div class="invalid-feedback">
                        {{ $errors->first('short_description_uz') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.aboutUs.fields.short_description_uz_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="short_description_ru">{{ trans('cruds.aboutUs.fields.short_description_ru') }}</label>
                <textarea class="form-control {{ $errors->has('short_description_ru') ? 'is-invalid' : '' }}" name="short_description_ru" id="short_description_ru" required>{{ old('short_description_ru') }}</textarea>
                @if($errors->has('short_description_ru'))
                    <div class="invalid-feedback">
                        {{ $errors->first('short_description_ru') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.aboutUs.fields.short_description_ru_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="short_description_en">{{ trans('cruds.aboutUs.fields.short_description_en') }}</label>
                <textarea class="form-control {{ $errors->has('short_description_en') ? 'is-invalid' : '' }}" name="short_description_en" id="short_description_en" required>{{ old('short_description_en') }}</textarea>
                @if($errors->has('short_description_en'))
                    <div class="invalid-feedback">
                        {{ $errors->first('short_description_en') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.aboutUs.fields.short_description_en_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="advantages_uz">{{ trans('cruds.aboutUs.fields.advantages_uz') }}</label>
                <input class="form-control {{ $errors->has('advantages_uz') ? 'is-invalid' : '' }}" type="text" name="advantages_uz" id="advantages_uz" value="{{ old('advantages_uz', '') }}" required>
                @if($errors->has('advantages_uz'))
                    <div class="invalid-feedback">
                        {{ $errors->first('advantages_uz') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.aboutUs.fields.advantages_uz_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="advantages_ru">{{ trans('cruds.aboutUs.fields.advantages_ru') }}</label>
                <input class="form-control {{ $errors->has('advantages_ru') ? 'is-invalid' : '' }}" type="text" name="advantages_ru" id="advantages_ru" value="{{ old('advantages_ru', '') }}" required>
                @if($errors->has('advantages_ru'))
                    <div class="invalid-feedback">
                        {{ $errors->first('advantages_ru') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.aboutUs.fields.advantages_ru_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="advantages_en">{{ trans('cruds.aboutUs.fields.advantages_en') }}</label>
                <input class="form-control {{ $errors->has('advantages_en') ? 'is-invalid' : '' }}" type="text" name="advantages_en" id="advantages_en" value="{{ old('advantages_en', '') }}" required>
                @if($errors->has('advantages_en'))
                    <div class="invalid-feedback">
                        {{ $errors->first('advantages_en') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.aboutUs.fields.advantages_en_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="success_students">{{ trans('cruds.aboutUs.fields.success_students') }}</label>
                <input class="form-control {{ $errors->has('success_students') ? 'is-invalid' : '' }}" type="number" name="success_students" id="success_students" value="{{ old('success_students', '') }}" step="1" required>
                @if($errors->has('success_students'))
                    <div class="invalid-feedback">
                        {{ $errors->first('success_students') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.aboutUs.fields.success_students_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="statistics_short_description_uz">{{ trans('cruds.aboutUs.fields.statistics_short_description_uz') }}</label>
                <textarea class="form-control {{ $errors->has('statistics_short_description_uz') ? 'is-invalid' : '' }}" name="statistics_short_description_uz" id="statistics_short_description_uz" required>{{ old('statistics_short_description_uz') }}</textarea>
                @if($errors->has('statistics_short_description_uz'))
                    <div class="invalid-feedback">
                        {{ $errors->first('statistics_short_description_uz') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.aboutUs.fields.statistics_short_description_uz_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="statistics_short_description_ru">{{ trans('cruds.aboutUs.fields.statistics_short_description_ru') }}</label>
                <textarea class="form-control {{ $errors->has('statistics_short_description_ru') ? 'is-invalid' : '' }}" name="statistics_short_description_ru" id="statistics_short_description_ru" required>{{ old('statistics_short_description_ru') }}</textarea>
                @if($errors->has('statistics_short_description_ru'))
                    <div class="invalid-feedback">
                        {{ $errors->first('statistics_short_description_ru') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.aboutUs.fields.statistics_short_description_ru_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="statistics_short_description_en">{{ trans('cruds.aboutUs.fields.statistics_short_description_en') }}</label>
                <textarea class="form-control {{ $errors->has('statistics_short_description_en') ? 'is-invalid' : '' }}" name="statistics_short_description_en" id="statistics_short_description_en" required>{{ old('statistics_short_description_en') }}</textarea>
                @if($errors->has('statistics_short_description_en'))
                    <div class="invalid-feedback">
                        {{ $errors->first('statistics_short_description_en') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.aboutUs.fields.statistics_short_description_en_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="article_uz">{{ trans('cruds.aboutUs.fields.article_uz') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('article_uz') ? 'is-invalid' : '' }}" name="article_uz" id="article_uz">{!! old('article_uz') !!}</textarea>
                @if($errors->has('article_uz'))
                    <div class="invalid-feedback">
                        {{ $errors->first('article_uz') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.aboutUs.fields.article_uz_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="article_ru">{{ trans('cruds.aboutUs.fields.article_ru') }}</label>
                <textarea class="form-control {{ $errors->has('article_ru') ? 'is-invalid' : '' }}" name="article_ru" id="article_ru" required>{{ old('article_ru') }}</textarea>
                @if($errors->has('article_ru'))
                    <div class="invalid-feedback">
                        {{ $errors->first('article_ru') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.aboutUs.fields.article_ru_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="article_en">{{ trans('cruds.aboutUs.fields.article_en') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('article_en') ? 'is-invalid' : '' }}" name="article_en" id="article_en">{!! old('article_en') !!}</textarea>
                @if($errors->has('article_en'))
                    <div class="invalid-feedback">
                        {{ $errors->first('article_en') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.aboutUs.fields.article_en_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="footer_text_uz">{{ trans('cruds.aboutUs.fields.footer_text_uz') }}</label>
                <textarea class="form-control {{ $errors->has('footer_text_uz') ? 'is-invalid' : '' }}" name="footer_text_uz" id="footer_text_uz" required>{{ old('footer_text_uz') }}</textarea>
                @if($errors->has('footer_text_uz'))
                    <div class="invalid-feedback">
                        {{ $errors->first('footer_text_uz') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.aboutUs.fields.footer_text_uz_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="footer_text_ru">{{ trans('cruds.aboutUs.fields.footer_text_ru') }}</label>
                <textarea class="form-control {{ $errors->has('footer_text_ru') ? 'is-invalid' : '' }}" name="footer_text_ru" id="footer_text_ru" required>{{ old('footer_text_ru') }}</textarea>
                @if($errors->has('footer_text_ru'))
                    <div class="invalid-feedback">
                        {{ $errors->first('footer_text_ru') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.aboutUs.fields.footer_text_ru_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="footer_text_en">{{ trans('cruds.aboutUs.fields.footer_text_en') }}</label>
                <textarea class="form-control {{ $errors->has('footer_text_en') ? 'is-invalid' : '' }}" name="footer_text_en" id="footer_text_en" required>{{ old('footer_text_en') }}</textarea>
                @if($errors->has('footer_text_en'))
                    <div class="invalid-feedback">
                        {{ $errors->first('footer_text_en') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.aboutUs.fields.footer_text_en_helper') }}</span>
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
    url: '{{ route('admin.aboutuses.storeMedia') }}',
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
@if(isset($aboutUs) && $aboutUs->image)
      var file = {!! json_encode($aboutUs->image) !!}
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
<script>
    $(document).ready(function () {
  function SimpleUploadAdapter(editor) {
    editor.plugins.get('FileRepository').createUploadAdapter = function(loader) {
      return {
        upload: function() {
          return loader.file
            .then(function (file) {
              return new Promise(function(resolve, reject) {
                // Init request
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '{{ route('admin.aboutuses.storeCKEditorImages') }}', true);
                xhr.setRequestHeader('x-csrf-token', window._token);
                xhr.setRequestHeader('Accept', 'application/json');
                xhr.responseType = 'json';

                // Init listeners
                var genericErrorText = `Couldn't upload file: ${ file.name }.`;
                xhr.addEventListener('error', function() { reject(genericErrorText) });
                xhr.addEventListener('abort', function() { reject() });
                xhr.addEventListener('load', function() {
                  var response = xhr.response;

                  if (!response || xhr.status !== 201) {
                    return reject(response && response.message ? `${genericErrorText}\n${xhr.status} ${response.message}` : `${genericErrorText}\n ${xhr.status} ${xhr.statusText}`);
                  }

                  $('form').append('<input type="hidden" name="ck-media[]" value="' + response.id + '">');

                  resolve({ default: response.url });
                });

                if (xhr.upload) {
                  xhr.upload.addEventListener('progress', function(e) {
                    if (e.lengthComputable) {
                      loader.uploadTotal = e.total;
                      loader.uploaded = e.loaded;
                    }
                  });
                }

                // Send request
                var data = new FormData();
                data.append('upload', file);
                data.append('crud_id', '{{ $aboutUs->id ?? 0 }}');
                xhr.send(data);
              });
            })
        }
      };
    }
  }

  var allEditors = document.querySelectorAll('.ckeditor');
  for (var i = 0; i < allEditors.length; ++i) {
    ClassicEditor.create(
      allEditors[i], {
        extraPlugins: [SimpleUploadAdapter]
      }
    );
  }
});
</script>

@endsection
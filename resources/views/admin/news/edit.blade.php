@extends('layouts.admin')

@section('styles')
    <style>

        .bootstrap-tagsinput.has-focus {
            background-color: #fff;
            border-color: #5cb3fd;
        }

        .bootstrap-tagsinput .label-info {
            display: inline-block;
            background-color: #636c72;
            padding: 0 0.4em 0.15em;
            border-radius: 0.25rem;
            margin-bottom: 0.4em;
            color: white;
        }

        .bootstrap-tagsinput input {
            margin-bottom: 0.5em;
        }

        .bootstrap-tagsinput .tag [data-role=remove]:after {
            content: "×";
        }
    </style>
@endsection

@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.news.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.news.update", [$news->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="title_uz">{{ trans('cruds.news.fields.title_uz') }}</label>
                <input class="form-control {{ $errors->has('title_uz') ? 'is-invalid' : '' }}" type="text" name="title_uz" id="title_uz" value="{{ old('title_uz', $news->title_uz) }}" required>
                @if($errors->has('title_uz'))
                    <div class="invalid-feedback">
                        {{ $errors->first('title_uz') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.news.fields.title_uz_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="title_ru">{{ trans('cruds.news.fields.title_ru') }}</label>
                <input class="form-control {{ $errors->has('title_ru') ? 'is-invalid' : '' }}" type="text" name="title_ru" id="title_ru" value="{{ old('title_ru', $news->title_ru) }}" required>
                @if($errors->has('title_ru'))
                    <div class="invalid-feedback">
                        {{ $errors->first('title_ru') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.news.fields.title_ru_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="title_en">{{ trans('cruds.news.fields.title_en') }}</label>
                <input class="form-control {{ $errors->has('title_en') ? 'is-invalid' : '' }}" type="text" name="title_en" id="title_en" value="{{ old('title_en', $news->title_en) }}" required>
                @if($errors->has('title_en'))
                    <div class="invalid-feedback">
                        {{ $errors->first('title_en') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.news.fields.title_en_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="image">{{ trans('cruds.news.fields.image') }}</label>
                <div class="needsclick dropzone {{ $errors->has('image') ? 'is-invalid' : '' }}" id="image-dropzone">
                </div>
                @if($errors->has('image'))
                    <div class="invalid-feedback">
                        {{ $errors->first('image') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.news.fields.image_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="short_description_uz">{{ trans('cruds.news.fields.short_description_uz') }}</label>
                <textarea class="form-control {{ $errors->has('short_description_uz') ? 'is-invalid' : '' }}" name="short_description_uz" id="short_description_uz" required>{{ old('short_description_uz', $news->short_description_uz) }}</textarea>
                @if($errors->has('short_description_uz'))
                    <div class="invalid-feedback">
                        {{ $errors->first('short_description_uz') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.news.fields.short_description_uz_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="short_description_ru">{{ trans('cruds.news.fields.short_description_ru') }}</label>
                <textarea class="form-control {{ $errors->has('short_description_ru') ? 'is-invalid' : '' }}" name="short_description_ru" id="short_description_ru" required>{{ old('short_description_ru', $news->short_description_ru) }}</textarea>
                @if($errors->has('short_description_ru'))
                    <div class="invalid-feedback">
                        {{ $errors->first('short_description_ru') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.news.fields.short_description_ru_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="short_description_en">{{ trans('cruds.news.fields.short_description_en') }}</label>
                <textarea class="form-control {{ $errors->has('short_description_en') ? 'is-invalid' : '' }}" name="short_description_en" id="short_description_en" required>{{ old('short_description_en', $news->short_description_en) }}</textarea>
                @if($errors->has('short_description_en'))
                    <div class="invalid-feedback">
                        {{ $errors->first('short_description_en') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.news.fields.short_description_en_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="article_uz">{{ trans('cruds.news.fields.article_uz') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('article_uz') ? 'is-invalid' : '' }}" name="article_uz" id="article_uz" required>{!! old('article_uz', $news->article_uz) !!}</textarea>
                @if($errors->has('article_uz'))
                    <div class="invalid-feedback">
                        {{ $errors->first('article_uz') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.news.fields.article_uz_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="article_ru">{{ trans('cruds.news.fields.article_ru') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('article_ru') ? 'is-invalid' : '' }}" name="article_ru" id="article_ru" required>{!! old('article_ru', $news->article_ru) !!}</textarea>
                @if($errors->has('article_ru'))
                    <div class="invalid-feedback">
                        {{ $errors->first('article_ru') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.news.fields.article_ru_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="article_en">{{ trans('cruds.news.fields.article_en') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('article_en') ? 'is-invalid' : '' }}" name="article_en" id="article_en" required>{!! old('article_en', $news->article_en) !!}</textarea>
                @if($errors->has('article_en'))
                    <div class="invalid-feedback">
                        {{ $errors->first('article_en') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.news.fields.article_en_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="seo_keywords_uz">{{ trans('cruds.news.fields.seo_keywords_uz') }}</label>
                <input class="form-control {{ $errors->has('seo_keywords_uz') ? 'is-invalid' : '' }}" value="{{ old('seo_keywords_uz', $news->seo_keywords_uz) }}" name="seo_keywords_uz" id="seo_keywords_uz" required>
                @if($errors->has('seo_keywords_uz'))
                    <div class="invalid-feedback">
                        {{ $errors->first('seo_keywords_uz') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.news.fields.seo_keywords_uz_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="seo_keywords_ru">{{ trans('cruds.news.fields.seo_keywords_ru') }}</label>
                <input class="form-control {{ $errors->has('seo_keywords_ru') ? 'is-invalid' : '' }}" value="{{ old('seo_keywords_ru', $news->seo_keywords_ru) }}" name="seo_keywords_ru" id="seo_keywords_ru" required>
                @if($errors->has('seo_keywords_ru'))
                    <div class="invalid-feedback">
                        {{ $errors->first('seo_keywords_ru') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.news.fields.seo_keywords_ru_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="seo_keywords_en">{{ trans('cruds.news.fields.seo_keywords_en') }}</label>
                <input class="form-control {{ $errors->has('seo_keywords_en') ? 'is-invalid' : '' }}" value="{{ old('seo_keywords_en', $news->seo_keywords_en) }}" name="seo_keywords_en" id="seo_keywords_en" required>
                @if($errors->has('seo_keywords_en'))
                    <div class="invalid-feedback">
                        {{ $errors->first('seo_keywords_en') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.news.fields.seo_keywords_en_helper') }}</span>
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
    url: '{{ route('admin.news.storeMedia') }}',
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
@if(isset($news) && $news->image)
      var file = {!! json_encode($news->image) !!}
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
                xhr.open('POST', '{{ route('admin.news.storeCKEditorImages') }}', true);
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
                data.append('crud_id', '{{ $news->id ?? 0 }}');
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
<script src="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.4.2/bootstrap-tagsinput.min.js"></script>
<script>
    // http://bootstrap-tagsinput.github.io/bootstrap-tagsinput/examples/


    $('input[name="seo_keywords_uz"]').tagsinput({
        trimValue: true,
        confirmKeys: [13, 44, 32],
        focusClass: 'my-focus-class'
    });
    $('input[name="seo_keywords_ru"]').tagsinput({
        trimValue: true,
        confirmKeys: [13, 44, 32],
        focusClass: 'my-focus-class'
    });
    $('input[name="seo_keywords_en"]').tagsinput({
        trimValue: true,
        confirmKeys: [13, 44, 32],
        focusClass: 'my-focus-class'
    });

    $('.bootstrap-tagsinput input').on('focus', function () {
        $(this).closest('.bootstrap-tagsinput').addClass('has-focus');
    }).on('blur', function () {
        $(this).closest('.bootstrap-tagsinput').removeClass('has-focus');
    });


</script>

@endsection

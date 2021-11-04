@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.create') }} {{ trans('cruds.university.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route("admin.universities.store") }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="required" for="number">{{ trans('cruds.university.fields.number') }}</label>
                    <input class="form-control {{ $errors->has('number') ? 'is-invalid' : '' }}" type="number" name="number" id="number" value="{{ old('number', '1') }}" step="1" required>
                    @if($errors->has('number'))
                        <div class="invalid-feedback">
                            {{ $errors->first('number') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.university.fields.number_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="name_uz">{{ trans('cruds.university.fields.name_uz') }}</label>
                    <input class="form-control {{ $errors->has('name_uz') ? 'is-invalid' : '' }}" type="text" name="name_uz" id="name_uz" value="{{ old('name_uz', '') }}" required>
                    @if($errors->has('name_uz'))
                        <div class="invalid-feedback">
                            {{ $errors->first('name_uz') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.university.fields.name_uz_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="name_ru">{{ trans('cruds.university.fields.name_ru') }}</label>
                    <input class="form-control {{ $errors->has('name_ru') ? 'is-invalid' : '' }}" type="text" name="name_ru" id="name_ru" value="{{ old('name_ru', '') }}" required>
                    @if($errors->has('name_ru'))
                        <div class="invalid-feedback">
                            {{ $errors->first('name_ru') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.university.fields.name_ru_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="name_en">{{ trans('cruds.university.fields.name_en') }}</label>
                    <input class="form-control {{ $errors->has('name_en') ? 'is-invalid' : '' }}" type="text" name="name_en" id="name_en" value="{{ old('name_en', '') }}" required>
                    @if($errors->has('name_en'))
                        <div class="invalid-feedback">
                            {{ $errors->first('name_en') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.university.fields.name_en_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="university_logo">{{ trans('cruds.university.fields.university_logo') }}</label>
                    <div class="needsclick dropzone {{ $errors->has('university_logo') ? 'is-invalid' : '' }}" id="university_logo-dropzone">
                    </div>
                    @if($errors->has('university_logo'))
                        <div class="invalid-feedback">
                            {{ $errors->first('university_logo') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.university.fields.university_logo_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="image">{{ trans('cruds.university.fields.image') }}</label>
                    <div class="needsclick dropzone {{ $errors->has('image') ? 'is-invalid' : '' }}" id="image-dropzone">
                    </div>
                    @if($errors->has('image'))
                        <div class="invalid-feedback">
                            {{ $errors->first('image') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.university.fields.image_helper') }}</span>
                </div>
                <div class="form-group">
                    <div class="form-check {{ $errors->has('top') ? 'is-invalid' : '' }}">
                        <input type="hidden" name="top" value="0">
                        <input class="form-check-input" type="checkbox" name="top" id="top" value="1" {{ old('top', 0) == 1 ? 'checked' : '' }}>
                        <label class="form-check-label" for="top">{{ trans('cruds.university.fields.top') }}</label>
                    </div>
                    @if($errors->has('top'))
                        <div class="invalid-feedback">
                            {{ $errors->first('top') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.university.fields.top_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="short_description_uz">{{ trans('cruds.university.fields.short_description_uz') }}</label>
                    <textarea class="form-control {{ $errors->has('short_description_uz') ? 'is-invalid' : '' }}" name="short_description_uz" id="short_description_uz" required>{{ old('short_description_uz') }}</textarea>
                    @if($errors->has('short_description_uz'))
                        <div class="invalid-feedback">
                            {{ $errors->first('short_description_uz') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.university.fields.short_description_uz_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="short_description_ru">{{ trans('cruds.university.fields.short_description_ru') }}</label>
                    <textarea class="form-control {{ $errors->has('short_description_ru') ? 'is-invalid' : '' }}" name="short_description_ru" id="short_description_ru">{{ old('short_description_ru') }}</textarea>
                    @if($errors->has('short_description_ru'))
                        <div class="invalid-feedback">
                            {{ $errors->first('short_description_ru') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.university.fields.short_description_ru_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="short_description_en">{{ trans('cruds.university.fields.short_description_en') }}</label>
                    <textarea class="form-control {{ $errors->has('short_description_en') ? 'is-invalid' : '' }}" name="short_description_en" id="short_description_en">{{ old('short_description_en') }}</textarea>
                    @if($errors->has('short_description_en'))
                        <div class="invalid-feedback">
                            {{ $errors->first('short_description_en') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.university.fields.short_description_en_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="article_description_uz">{{ trans('cruds.university.fields.article_description_uz') }}</label>
                    <textarea class="form-control ckeditor {{ $errors->has('article_description_uz') ? 'is-invalid' : '' }}" name="article_description_uz" id="article_description_uz">{!! old('article_description_uz') !!}</textarea>
                    @if($errors->has('article_description_uz'))
                        <div class="invalid-feedback">
                            {{ $errors->first('article_description_uz') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.university.fields.article_description_uz_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="article_description_ru">{{ trans('cruds.university.fields.article_description_ru') }}</label>
                    <textarea class="form-control ckeditor {{ $errors->has('article_description_ru') ? 'is-invalid' : '' }}" name="article_description_ru" id="article_description_ru">{!! old('article_description_ru') !!}</textarea>
                    @if($errors->has('article_description_ru'))
                        <div class="invalid-feedback">
                            {{ $errors->first('article_description_ru') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.university.fields.article_description_ru_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="article_description_en">{{ trans('cruds.university.fields.article_description_en') }}</label>
                    <textarea class="form-control ckeditor {{ $errors->has('article_description_en') ? 'is-invalid' : '' }}" name="article_description_en" id="article_description_en">{!! old('article_description_en') !!}</textarea>
                    @if($errors->has('article_description_en'))
                        <div class="invalid-feedback">
                            {{ $errors->first('article_description_en') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.university.fields.article_description_en_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="country_id">{{ trans('cruds.university.fields.country') }}</label>
                    <select class="form-control select2 {{ $errors->has('country') ? 'is-invalid' : '' }}" name="country_id" id="country_id" required>
                        @foreach($countries as $id => $entry)
                            <option value="{{ $id }}" {{ old('country_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('country'))
                        <div class="invalid-feedback">
                            {{ $errors->first('country') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.university.fields.country_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="directions">{{ trans('cruds.university.fields.direction') }}</label>
                    <div style="padding-bottom: 4px">
                        <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                        <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                    </div>
                    <select class="form-control select2 {{ $errors->has('directions') ? 'is-invalid' : '' }}" name="directions[]" id="directions" multiple required>
                        @foreach($directions as $id => $direction)
                            <option value="{{ $id }}" {{ in_array($id, old('directions', [])) ? 'selected' : '' }}>{{ $direction }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('directions'))
                        <div class="invalid-feedback">
                            {{ $errors->first('directions') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.university.fields.direction_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="certificates">{{ trans('cruds.university.fields.certificates') }}</label>
                    <div style="padding-bottom: 4px">
                        <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                        <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                    </div>
                    <select class="form-control select2 {{ $errors->has('certificates') ? 'is-invalid' : '' }}" name="certificates[]" id="certificates" multiple required>
                        @foreach($certificates as $id => $certificate)
                            <option value="{{ $id }}" {{ in_array($id, old('certificates', [])) ? 'selected' : '' }}>{{ $certificate }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('certificates'))
                        <div class="invalid-feedback">
                            {{ $errors->first('certificates') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.university.fields.certificates_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="ielts">{{ trans('cruds.university.fields.ielts') }}</label>
                    <input class="form-control {{ $errors->has('ielts') ? 'is-invalid' : '' }}" type="number" name="ielts" id="ielts" value="{{ old('ielts', $university->ielts) }}" step="0.01" required>
                    @if($errors->has('ielts'))
                        <div class="invalid-feedback">
                            {{ $errors->first('ielts') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.university.fields.ielts_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="price">{{ trans('cruds.university.fields.price') }}</label>
                    <input class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" type="number" name="price" id="price" value="{{ old('price', $university->price) }}" step="0.01" required>
                    @if($errors->has('price'))
                        <div class="invalid-feedback">
                            {{ $errors->first('price') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.university.fields.price_helper') }}</span>
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
        Dropzone.options.universityLogoDropzone = {
            url: '{{ route('admin.universities.storeMedia') }}',
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
                $('form').find('input[name="university_logo"]').remove()
                $('form').append('<input type="hidden" name="university_logo" value="' + response.name + '">')
            },
            removedfile: function (file) {
                file.previewElement.remove()
                if (file.status !== 'error') {
                    $('form').find('input[name="university_logo"]').remove()
                    this.options.maxFiles = this.options.maxFiles + 1
                }
            },
            init: function () {
                @if(isset($university) && $university->university_logo)
                var file = {!! json_encode($university->university_logo) !!}
                this.options.addedfile.call(this, file)
                this.options.thumbnail.call(this, file, file.preview)
                file.previewElement.classList.add('dz-complete')
                $('form').append('<input type="hidden" name="university_logo" value="' + file.file_name + '">')
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
        Dropzone.options.imageDropzone = {
            url: '{{ route('admin.universities.storeMedia') }}',
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
                @if(isset($university) && $university->image)
                var file = {!! json_encode($university->image) !!}
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
                                        xhr.open('POST', '{{ route('admin.universities.storeCKEditorImages') }}', true);
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
                                        data.append('crud_id', '{{ $university->id ?? 0 }}');
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

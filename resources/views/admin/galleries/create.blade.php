@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.create') }} {{ trans('cruds.gallery.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route("admin.galleries.store") }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="required" for="number">{{ trans('cruds.gallery.fields.number') }}</label>
                    <input class="form-control {{ $errors->has('number') ? 'is-invalid' : '' }}" type="number"
                           name="number" id="number" value="{{ old('number', '1') }}" step="1" required>
                    @if($errors->has('number'))
                        <div class="invalid-feedback">
                            {{ $errors->first('number') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.gallery.fields.number_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="cover">{{ trans('cruds.gallery.fields.cover') }}</label>
                    <div class="needsclick dropzone {{ $errors->has('cover') ? 'is-invalid' : '' }}"
                         id="cover-dropzone">
                    </div>
                    @if($errors->has('cover'))
                        <div class="invalid-feedback">
                            {{ $errors->first('cover') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.gallery.fields.cover_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="image">{{ trans('cruds.gallery.fields.image') }}</label>
                    <div class="needsclick dropzone {{ $errors->has('image') ? 'is-invalid' : '' }}"
                         id="image-dropzone">
                    </div>
                    @if($errors->has('image'))
                        <div class="invalid-feedback">
                            {{ $errors->first('image') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.gallery.fields.image_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="country_id">{{ trans('cruds.gallery.fields.country') }}</label>
                    <select class="form-control select2 {{ $errors->has('country') ? 'is-invalid' : '' }}"
                            name="country_id" id="country_id" required>
                        @foreach($countries as $id => $entry)
                            <option
                                value="{{ $id }}" {{ old('country_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('country'))
                        <div class="invalid-feedback">
                            {{ $errors->first('country') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.gallery.fields.country_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required"
                           for="short_description_uz">{{ trans('cruds.gallery.fields.short_description_uz') }}</label>
                    <input class="form-control {{ $errors->has('short_description_uz') ? 'is-invalid' : '' }}"
                           type="text" name="short_description_uz" id="short_description_uz"
                           value="{{ old('short_description_uz', '') }}" required>
                    @if($errors->has('short_description_uz'))
                        <div class="invalid-feedback">
                            {{ $errors->first('short_description_uz') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.gallery.fields.short_description_uz_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required"
                           for="short_description_ru">{{ trans('cruds.gallery.fields.short_description_ru') }}</label>
                    <input class="form-control {{ $errors->has('short_description_ru') ? 'is-invalid' : '' }}"
                           type="text" name="short_description_ru" id="short_description_ru"
                           value="{{ old('short_description_ru', '') }}" required>
                    @if($errors->has('short_description_ru'))
                        <div class="invalid-feedback">
                            {{ $errors->first('short_description_ru') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.gallery.fields.short_description_ru_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required"
                           for="short_description_en">{{ trans('cruds.gallery.fields.short_description_en') }}</label>
                    <input class="form-control {{ $errors->has('short_description_en') ? 'is-invalid' : '' }}"
                           type="text" name="short_description_en" id="short_description_en"
                           value="{{ old('short_description_en', '') }}" required>
                    @if($errors->has('short_description_en'))
                        <div class="invalid-feedback">
                            {{ $errors->first('short_description_en') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.gallery.fields.short_description_en_helper') }}</span>
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
        Dropzone.options.coverDropzone = {
            url: '{{ route('admin.galleries.storeMedia') }}',
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
                $('form').find('input[name="cover"]').remove()
                $('form').append('<input type="hidden" name="cover" value="' + response.name + '">')
            },
            removedfile: function (file) {
                file.previewElement.remove()
                if (file.status !== 'error') {
                    $('form').find('input[name="cover"]').remove()
                    this.options.maxFiles = this.options.maxFiles + 1
                }
            },
            init: function () {
                @if(isset($gallery) && $gallery->cover)
                var file = {!! json_encode($gallery->cover) !!}
                this.options.addedfile.call(this, file)
                this.options.thumbnail.call(this, file, file.preview)
                file.previewElement.classList.add('dz-complete')
                $('form').append('<input type="hidden" name="cover" value="' + file.file_name + '">')
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
        var uploadedImageMap = {}
        Dropzone.options.imageDropzone = {
            url: '{{ route('admin.galleries.storeMedia') }}',
            maxFilesize: 100, // MB
            acceptedFiles: '.jpeg,.jpg,.png,.gif,.mp4',
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            params: {
                size: 100,
                width: 4096,
                height: 4096
            },
            success: function (file, response) {
                $('form').append('<input type="hidden" name="image[]" value="' + response.name + '">')
                uploadedImageMap[file.name] = response.name
            },
            removedfile: function (file) {
                console.log(file)
                file.previewElement.remove()
                var name = ''
                if (typeof file.file_name !== 'undefined') {
                    name = file.file_name
                } else {
                    name = uploadedImageMap[file.name]
                }
                $('form').find('input[name="image[]"][value="' + name + '"]').remove()
            },
            init: function () {
                @if(isset($gallery) && $gallery->image)
                var files = {!! json_encode($gallery->image) !!}
                for(
                var i
            in
                files
            )
                {
                    var file = files[i]
                    this.options.addedfile.call(this, file)
                    this.options.thumbnail.call(this, file, file.preview)
                    file.previewElement.classList.add('dz-complete')
                    $('form').append('<input type="hidden" name="image[]" value="' + file.file_name + '">')
                }
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

@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.create') }} {{ trans('cruds.video.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route("admin.videos.store") }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="required" for="number">{{ trans('cruds.video.fields.number') }}</label>
                    <input class="form-control {{ $errors->has('number') ? 'is-invalid' : '' }}" type="number" name="number" id="number" value="{{ old('number', '1') }}" step="1" required>
                    @if($errors->has('number'))
                        <div class="invalid-feedback">
                            {{ $errors->first('number') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.video.fields.number_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="title_uz">{{ trans('cruds.video.fields.title_uz') }}</label>
                    <input class="form-control {{ $errors->has('title_uz') ? 'is-invalid' : '' }}" type="text"
                           name="title_uz" id="title_uz" value="{{ old('title_uz', '') }}" required>
                    @if($errors->has('title_uz'))
                        <div class="invalid-feedback">
                            {{ $errors->first('title_uz') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.video.fields.title_uz_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="title_ru">{{ trans('cruds.video.fields.title_ru') }}</label>
                    <input class="form-control {{ $errors->has('title_ru') ? 'is-invalid' : '' }}" type="text"
                           name="title_ru" id="title_ru" value="{{ old('title_ru', '') }}" required>
                    @if($errors->has('title_ru'))
                        <div class="invalid-feedback">
                            {{ $errors->first('title_ru') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.video.fields.title_ru_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="title_en">{{ trans('cruds.video.fields.title_en') }}</label>
                    <input class="form-control {{ $errors->has('title_en') ? 'is-invalid' : '' }}" type="text"
                           name="title_en" id="title_en" value="{{ old('title_en', '') }}" required>
                    @if($errors->has('title_en'))
                        <div class="invalid-feedback">
                            {{ $errors->first('title_en') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.video.fields.title_en_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required">{{ trans('cruds.video.fields.type') }}</label>
                    <select onchange="chooseDirectory()"
                            class="form-control {{ $errors->has('type') ? 'is-invalid' : '' }}" name="type" id="type"
                            required>
                        <option value
                                disabled {{ old('type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                        @foreach(App\Models\Video::TYPE_SELECT as $key => $label)
                            <option
                                value="{{ $key }}" {{ old('type', '0') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('type'))
                        <div class="invalid-feedback">
                            {{ $errors->first('type') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.video.fields.type_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="cover">{{ trans('cruds.video.fields.cover') }}</label>
                    <div class="needsclick dropzone {{ $errors->has('cover') ? 'is-invalid' : '' }}"
                         id="cover-dropzone">
                    </div>
                    @if($errors->has('cover'))
                        <div class="invalid-feedback">
                            {{ $errors->first('cover') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.video.fields.cover_helper') }}</span>
                </div>
                <div class="form-group" id="video-form">
                    <label class="required" for="file">{{ trans('cruds.video.fields.file') }}</label>
                    <div class="needsclick dropzone {{ $errors->has('file') ? 'is-invalid' : '' }}" id="file-dropzone">
                    </div>
                    @if($errors->has('file'))
                        <div class="invalid-feedback">
                            {{ $errors->first('file') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.video.fields.file_helper') }}</span>
                </div>
                @if(App\Models\Video::where('type','1')->count() > 0)
                    <div class="form-group">
                        <label for="parent_id">{{ trans('cruds.video.fields.parent') }}</label>
                        <select class="form-control select2 {{ $errors->has('parent') ? 'is-invalid' : '' }}"
                                name="parent_id" id="parent_id">
                            @foreach($parents as $id => $entry)
                                <option
                                    value="{{ $id }}" {{ old('parent_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('parent'))
                            <div class="invalid-feedback">
                                {{ $errors->first('parent') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.video.fields.parent_helper') }}</span>
                    </div>
                @endif
                <div id="top-form" class="form-group">
                    <div class="form-check {{ $errors->has('top') ? 'is-invalid' : '' }}">
                        <input type="hidden" name="top" value="0">
                        <input class="form-check-input" type="checkbox" name="top" id="top" value="1" {{ old('top', 0) == 1 ? 'checked' : '' }}>
                        <label class="form-check-label" for="top">{{ trans('cruds.video.fields.top') }}</label>
                    </div>
                    @if($errors->has('top'))
                        <div class="invalid-feedback">
                            {{ $errors->first('top') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.video.fields.top_helper') }}</span>
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
            url: '{{ route('admin.videos.storeMedia') }}',
            maxFilesize: 1024, // MB
            acceptedFiles: '.jpeg,.jpg,.png,.gif',
            maxFiles: 1,
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            params: {
                size: 1024,
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
                @if(isset($video) && $video->cover)
                var file = {!! json_encode($video->cover) !!}
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
        Dropzone.options.fileDropzone = {
            url: '{{ route('admin.videos.storeMedia') }}',
            maxFilesize: 1024, // MB
            maxFiles: 1,
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            params: {
                size: 1024
            },
            success: function (file, response) {
                $('form').find('input[name="file"]').remove()
                $('form').append('<input type="hidden" name="file" value="' + response.name + '">')
            },
            removedfile: function (file) {
                file.previewElement.remove()
                if (file.status !== 'error') {
                    $('form').find('input[name="file"]').remove()
                    this.options.maxFiles = this.options.maxFiles + 1
                }
            },
            init: function () {
                @if(isset($video) && $video->file)
                var file = {!! json_encode($video->file) !!}
                this.options.addedfile.call(this, file)
                file.previewElement.classList.add('dz-complete')
                $('form').append('<input type="hidden" name="file" value="' + file.file_name + '">')
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
        function chooseDirectory() {
            $type = document.getElementById('type').value;

            if ($type == 0) {
                document.getElementById('video-form').style.display = 'block';
                document.getElementById('top-form').style.display = 'block';
            }
            if ($type == 1) {
                document.getElementById('video-form').style.display = 'none';
                document.getElementById('top-form').style.display = 'none';
            }
        }
    </script>
@endsection

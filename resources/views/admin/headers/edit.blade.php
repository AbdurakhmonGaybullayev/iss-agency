@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.header.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.headers.update", [$header->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="about_us_uz">{{ trans('cruds.header.fields.about_us_uz') }}</label>
                <input class="form-control {{ $errors->has('about_us_uz') ? 'is-invalid' : '' }}" type="text" name="about_us_uz" id="about_us_uz" value="{{ old('about_us_uz', $header->about_us_uz) }}" required>
                @if($errors->has('about_us_uz'))
                    <div class="invalid-feedback">
                        {{ $errors->first('about_us_uz') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.header.fields.about_us_uz_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="about_us_ru">{{ trans('cruds.header.fields.about_us_ru') }}</label>
                <input class="form-control {{ $errors->has('about_us_ru') ? 'is-invalid' : '' }}" type="text" name="about_us_ru" id="about_us_ru" value="{{ old('about_us_ru', $header->about_us_ru) }}" required>
                @if($errors->has('about_us_ru'))
                    <div class="invalid-feedback">
                        {{ $errors->first('about_us_ru') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.header.fields.about_us_ru_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="about_us_en">{{ trans('cruds.header.fields.about_us_en') }}</label>
                <input class="form-control {{ $errors->has('about_us_en') ? 'is-invalid' : '' }}" type="text" name="about_us_en" id="about_us_en" value="{{ old('about_us_en', $header->about_us_en) }}" required>
                @if($errors->has('about_us_en'))
                    <div class="invalid-feedback">
                        {{ $errors->first('about_us_en') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.header.fields.about_us_en_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="qanda_uz">{{ trans('cruds.header.fields.qanda_uz') }}</label>
                <input class="form-control {{ $errors->has('qanda_uz') ? 'is-invalid' : '' }}" type="text" name="qanda_uz" id="qanda_uz" value="{{ old('qanda_uz', $header->qanda_uz) }}" required>
                @if($errors->has('qanda_uz'))
                    <div class="invalid-feedback">
                        {{ $errors->first('qanda_uz') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.header.fields.qanda_uz_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="qanda_ru">{{ trans('cruds.header.fields.qanda_ru') }}</label>
                <input class="form-control {{ $errors->has('qanda_ru') ? 'is-invalid' : '' }}" type="text" name="qanda_ru" id="qanda_ru" value="{{ old('qanda_ru', $header->qanda_ru) }}" required>
                @if($errors->has('qanda_ru'))
                    <div class="invalid-feedback">
                        {{ $errors->first('qanda_ru') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.header.fields.qanda_ru_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="qanda_en">{{ trans('cruds.header.fields.qanda_en') }}</label>
                <input class="form-control {{ $errors->has('qanda_en') ? 'is-invalid' : '' }}" type="text" name="qanda_en" id="qanda_en" value="{{ old('qanda_en', $header->qanda_en) }}" required>
                @if($errors->has('qanda_en'))
                    <div class="invalid-feedback">
                        {{ $errors->first('qanda_en') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.header.fields.qanda_en_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="cooperation_uz">{{ trans('cruds.header.fields.cooperation_uz') }}</label>
                <input class="form-control {{ $errors->has('cooperation_uz') ? 'is-invalid' : '' }}" type="text" name="cooperation_uz" id="cooperation_uz" value="{{ old('cooperation_uz', $header->cooperation_uz) }}" required>
                @if($errors->has('cooperation_uz'))
                    <div class="invalid-feedback">
                        {{ $errors->first('cooperation_uz') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.header.fields.cooperation_uz_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="cooperation_ru">{{ trans('cruds.header.fields.cooperation_ru') }}</label>
                <input class="form-control {{ $errors->has('cooperation_ru') ? 'is-invalid' : '' }}" type="text" name="cooperation_ru" id="cooperation_ru" value="{{ old('cooperation_ru', $header->cooperation_ru) }}" required>
                @if($errors->has('cooperation_ru'))
                    <div class="invalid-feedback">
                        {{ $errors->first('cooperation_ru') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.header.fields.cooperation_ru_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="cooperation_en">{{ trans('cruds.header.fields.cooperation_en') }}</label>
                <input class="form-control {{ $errors->has('cooperation_en') ? 'is-invalid' : '' }}" type="text" name="cooperation_en" id="cooperation_en" value="{{ old('cooperation_en', $header->cooperation_en) }}" required>
                @if($errors->has('cooperation_en'))
                    <div class="invalid-feedback">
                        {{ $errors->first('cooperation_en') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.header.fields.cooperation_en_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="universities_uz">{{ trans('cruds.header.fields.universities_uz') }}</label>
                <input class="form-control {{ $errors->has('universities_uz') ? 'is-invalid' : '' }}" type="text" name="universities_uz" id="universities_uz" value="{{ old('universities_uz', $header->universities_uz) }}" required>
                @if($errors->has('universities_uz'))
                    <div class="invalid-feedback">
                        {{ $errors->first('universities_uz') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.header.fields.universities_uz_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="universities_ru">{{ trans('cruds.header.fields.universities_ru') }}</label>
                <input class="form-control {{ $errors->has('universities_ru') ? 'is-invalid' : '' }}" type="text" name="universities_ru" id="universities_ru" value="{{ old('universities_ru', $header->universities_ru) }}" required>
                @if($errors->has('universities_ru'))
                    <div class="invalid-feedback">
                        {{ $errors->first('universities_ru') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.header.fields.universities_ru_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="universities_en">{{ trans('cruds.header.fields.universities_en') }}</label>
                <input class="form-control {{ $errors->has('universities_en') ? 'is-invalid' : '' }}" type="text" name="universities_en" id="universities_en" value="{{ old('universities_en', $header->universities_en) }}" required>
                @if($errors->has('universities_en'))
                    <div class="invalid-feedback">
                        {{ $errors->first('universities_en') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.header.fields.universities_en_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="gallery_uz">{{ trans('cruds.header.fields.gallery_uz') }}</label>
                <input class="form-control {{ $errors->has('gallery_uz') ? 'is-invalid' : '' }}" type="text" name="gallery_uz" id="gallery_uz" value="{{ old('gallery_uz', $header->gallery_uz) }}" required>
                @if($errors->has('gallery_uz'))
                    <div class="invalid-feedback">
                        {{ $errors->first('gallery_uz') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.header.fields.gallery_uz_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="gallery_ru">{{ trans('cruds.header.fields.gallery_ru') }}</label>
                <input class="form-control {{ $errors->has('gallery_ru') ? 'is-invalid' : '' }}" type="text" name="gallery_ru" id="gallery_ru" value="{{ old('gallery_ru', $header->gallery_ru) }}" required>
                @if($errors->has('gallery_ru'))
                    <div class="invalid-feedback">
                        {{ $errors->first('gallery_ru') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.header.fields.gallery_ru_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="gallery_en">{{ trans('cruds.header.fields.gallery_en') }}</label>
                <input class="form-control {{ $errors->has('gallery_en') ? 'is-invalid' : '' }}" type="text" name="gallery_en" id="gallery_en" value="{{ old('gallery_en', $header->gallery_en) }}" required>
                @if($errors->has('gallery_en'))
                    <div class="invalid-feedback">
                        {{ $errors->first('gallery_en') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.header.fields.gallery_en_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="blog_uz">{{ trans('cruds.header.fields.blog_uz') }}</label>
                <input class="form-control {{ $errors->has('blog_uz') ? 'is-invalid' : '' }}" type="text" name="blog_uz" id="blog_uz" value="{{ old('blog_uz', $header->blog_uz) }}" required>
                @if($errors->has('blog_uz'))
                    <div class="invalid-feedback">
                        {{ $errors->first('blog_uz') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.header.fields.blog_uz_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="blog_ru">{{ trans('cruds.header.fields.blog_ru') }}</label>
                <input class="form-control {{ $errors->has('blog_ru') ? 'is-invalid' : '' }}" type="text" name="blog_ru" id="blog_ru" value="{{ old('blog_ru', $header->blog_ru) }}" required>
                @if($errors->has('blog_ru'))
                    <div class="invalid-feedback">
                        {{ $errors->first('blog_ru') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.header.fields.blog_ru_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="blog_en">{{ trans('cruds.header.fields.blog_en') }}</label>
                <input class="form-control {{ $errors->has('blog_en') ? 'is-invalid' : '' }}" type="text" name="blog_en" id="blog_en" value="{{ old('blog_en', $header->blog_en) }}" required>
                @if($errors->has('blog_en'))
                    <div class="invalid-feedback">
                        {{ $errors->first('blog_en') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.header.fields.blog_en_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="branch_uz">{{ trans('cruds.header.fields.branch_uz') }}</label>
                <input class="form-control {{ $errors->has('branch_uz') ? 'is-invalid' : '' }}" type="text" name="branch_uz" id="branch_uz" value="{{ old('branch_uz', $header->branch_uz) }}" required>
                @if($errors->has('branch_uz'))
                    <div class="invalid-feedback">
                        {{ $errors->first('branch_uz') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.header.fields.branch_uz_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="branch_ru">{{ trans('cruds.header.fields.branch_ru') }}</label>
                <input class="form-control {{ $errors->has('branch_ru') ? 'is-invalid' : '' }}" type="text" name="branch_ru" id="branch_ru" value="{{ old('branch_ru', $header->branch_ru) }}" required>
                @if($errors->has('branch_ru'))
                    <div class="invalid-feedback">
                        {{ $errors->first('branch_ru') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.header.fields.branch_ru_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="branch_en">{{ trans('cruds.header.fields.branch_en') }}</label>
                <input class="form-control {{ $errors->has('branch_en') ? 'is-invalid' : '' }}" type="text" name="branch_en" id="branch_en" value="{{ old('branch_en', $header->branch_en) }}" required>
                @if($errors->has('branch_en'))
                    <div class="invalid-feedback">
                        {{ $errors->first('branch_en') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.header.fields.branch_en_helper') }}</span>
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
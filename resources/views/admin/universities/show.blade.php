@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.university.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.universities.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.university.fields.id') }}
                        </th>
                        <td>
                            {{ $university->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.university.fields.number') }}
                        </th>
                        <td>
                            {{ $university->number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.university.fields.name_uz') }}
                        </th>
                        <td>
                            {{ $university->name_uz }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.university.fields.name_ru') }}
                        </th>
                        <td>
                            {{ $university->name_ru }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.university.fields.name_en') }}
                        </th>
                        <td>
                            {{ $university->name_en }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.university.fields.university_logo') }}
                        </th>
                        <td>
                            @if($university->university_logo)
                                <a href="{{ $university->university_logo->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $university->university_logo->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.university.fields.image') }}
                        </th>
                        <td>
                            @if($university->image)
                                <a href="{{ $university->image->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $university->image->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.university.fields.rank') }}
                        </th>
                        <td>
                            {{ $university->rank }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.university.fields.top') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $university->top ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.university.fields.short_description_uz') }}
                        </th>
                        <td>
                            {{ $university->short_description_uz }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.university.fields.short_description_ru') }}
                        </th>
                        <td>
                            {{ $university->short_description_ru }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.university.fields.short_description_en') }}
                        </th>
                        <td>
                            {{ $university->short_description_en }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.university.fields.article_description_uz') }}
                        </th>
                        <td>
                            {!! $university->article_description_uz !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.university.fields.article_description_ru') }}
                        </th>
                        <td>
                            {!! $university->article_description_ru !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.university.fields.article_description_en') }}
                        </th>
                        <td>
                            {!! $university->article_description_en !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.university.fields.country') }}
                        </th>
                        <td>
                            {{ $university->country->name_uz ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.university.fields.direction') }}
                        </th>
                        <td>
                            @foreach($university->directions as $key => $direction)
                                <span class="label label-info">{{ $direction->name_uz }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.university.fields.certificates') }}
                        </th>
                        <td>
                            @foreach($university->certificates as $key => $certificates)
                                <span class="label label-info">{{ $certificates->name }}</span>
                            @endforeach
                        </td>
                    </tr>

                    <tr>
                        <th>
                            {{ trans('cruds.university.fields.ielts') }}
                        </th>
                        <td>
                            {{ $university->ielts }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.university.fields.price') }}
                        </th>
                        <td>
                            {{ $university->price }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.university.fields.seo_keywords_uz') }}
                        </th>
                        <td>
                            {{ $university->seo_keywords_uz }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.university.fields.seo_keywords_ru') }}
                        </th>
                        <td>
                            {{ $university->seo_keywords_ru }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.university.fields.seo_keywords_en') }}
                        </th>
                        <td>
                            {{ $university->seo_keywords_en }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.universities.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection

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
                            {{ trans('cruds.university.fields.number') }}
                        </th>
                        <td>
                            {{ $university->number }}
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

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#university_documents" role="tab" data-toggle="tab">
                {{ trans('cruds.document.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="university_documents">
            @includeIf('admin.universities.relationships.universityDocuments', ['documents' => $university->universityDocuments])
        </div>
    </div>
</div>

@endsection
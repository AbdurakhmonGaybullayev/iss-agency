@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.aboutUs.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.aboutuses.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.aboutUs.fields.id') }}
                        </th>
                        <td>
                            {{ $aboutus->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.aboutUs.fields.title_uz') }}
                        </th>
                        <td>
                            {{ $aboutus->title_uz }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.aboutUs.fields.title_ru') }}
                        </th>
                        <td>
                            {{ $aboutus->title_ru }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.aboutUs.fields.title_en') }}
                        </th>
                        <td>
                            {{ $aboutus->title_en }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.aboutUs.fields.image') }}
                        </th>
                        <td>
                            @if($aboutus->image)
                                <a href="{{ $aboutus->image->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $aboutus->image->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.aboutUs.fields.short_description_uz') }}
                        </th>
                        <td>
                            {{ $aboutus->short_description_uz }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.aboutUs.fields.short_description_ru') }}
                        </th>
                        <td>
                            {{ $aboutus->short_description_ru }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.aboutUs.fields.short_description_en') }}
                        </th>
                        <td>
                            {{ $aboutus->short_description_en }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.aboutUs.fields.advantages_uz') }}
                        </th>
                        <td>
                            {{ $aboutus->advantages_uz }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.aboutUs.fields.advantages_ru') }}
                        </th>
                        <td>
                            {{ $aboutus->advantages_ru }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.aboutUs.fields.advantages_en') }}
                        </th>
                        <td>
                            {{ $aboutus->advantages_en }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.aboutUs.fields.success_students') }}
                        </th>
                        <td>
                            {{ $aboutus->success_students }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.aboutUs.fields.statistics_short_description_uz') }}
                        </th>
                        <td>
                            {{ $aboutus->statistics_short_description_uz }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.aboutUs.fields.statistics_short_description_ru') }}
                        </th>
                        <td>
                            {{ $aboutus->statistics_short_description_ru }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.aboutUs.fields.statistics_short_description_en') }}
                        </th>
                        <td>
                            {{ $aboutus->statistics_short_description_en }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.aboutUs.fields.article_uz') }}
                        </th>
                        <td>
                            {!! $aboutus->article_uz !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.aboutUs.fields.article_ru') }}
                        </th>
                        <td>
                            {{ $aboutus->article_ru }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.aboutUs.fields.article_en') }}
                        </th>
                        <td>
                            {!! $aboutus->article_en !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.aboutUs.fields.footer_text_uz') }}
                        </th>
                        <td>
                            {{ $aboutus->footer_text_uz }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.aboutUs.fields.footer_text_ru') }}
                        </th>
                        <td>
                            {{ $aboutus->footer_text_ru }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.aboutUs.fields.footer_text_en') }}
                        </th>
                        <td>
                            {{ $aboutus->footer_text_en }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.aboutuses.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection

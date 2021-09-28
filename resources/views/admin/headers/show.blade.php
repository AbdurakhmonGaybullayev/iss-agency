@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.header.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.headers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.header.fields.id') }}
                        </th>
                        <td>
                            {{ $header->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.header.fields.about_us_uz') }}
                        </th>
                        <td>
                            {{ $header->about_us_uz }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.header.fields.about_us_ru') }}
                        </th>
                        <td>
                            {{ $header->about_us_ru }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.header.fields.about_us_en') }}
                        </th>
                        <td>
                            {{ $header->about_us_en }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.header.fields.qanda_uz') }}
                        </th>
                        <td>
                            {{ $header->qanda_uz }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.header.fields.qanda_ru') }}
                        </th>
                        <td>
                            {{ $header->qanda_ru }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.header.fields.qanda_en') }}
                        </th>
                        <td>
                            {{ $header->qanda_en }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.header.fields.cooperation_uz') }}
                        </th>
                        <td>
                            {{ $header->cooperation_uz }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.header.fields.cooperation_ru') }}
                        </th>
                        <td>
                            {{ $header->cooperation_ru }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.header.fields.cooperation_en') }}
                        </th>
                        <td>
                            {{ $header->cooperation_en }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.header.fields.universities_uz') }}
                        </th>
                        <td>
                            {{ $header->universities_uz }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.header.fields.universities_ru') }}
                        </th>
                        <td>
                            {{ $header->universities_ru }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.header.fields.universities_en') }}
                        </th>
                        <td>
                            {{ $header->universities_en }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.header.fields.gallery_uz') }}
                        </th>
                        <td>
                            {{ $header->gallery_uz }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.header.fields.gallery_ru') }}
                        </th>
                        <td>
                            {{ $header->gallery_ru }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.header.fields.gallery_en') }}
                        </th>
                        <td>
                            {{ $header->gallery_en }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.header.fields.blog_uz') }}
                        </th>
                        <td>
                            {{ $header->blog_uz }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.header.fields.blog_ru') }}
                        </th>
                        <td>
                            {{ $header->blog_ru }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.header.fields.blog_en') }}
                        </th>
                        <td>
                            {{ $header->blog_en }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.header.fields.branch_uz') }}
                        </th>
                        <td>
                            {{ $header->branch_uz }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.header.fields.branch_ru') }}
                        </th>
                        <td>
                            {{ $header->branch_ru }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.header.fields.branch_en') }}
                        </th>
                        <td>
                            {{ $header->branch_en }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.headers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
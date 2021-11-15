@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.mainHeader.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.main-headers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.mainHeader.fields.id') }}
                        </th>
                        <td>
                            {{ $mainHeader->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mainHeader.fields.slogan_uz') }}
                        </th>
                        <td>
                            {{ $mainHeader->slogan_uz }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mainHeader.fields.slogan_ru') }}
                        </th>
                        <td>
                            {{ $mainHeader->slogan_ru }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mainHeader.fields.slogan_en') }}
                        </th>
                        <td>
                            {{ $mainHeader->slogan_en }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mainHeader.fields.title_uz') }}
                        </th>
                        <td>
                            {{ $mainHeader->title_uz }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mainHeader.fields.title_ru') }}
                        </th>
                        <td>
                            {{ $mainHeader->title_ru }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mainHeader.fields.title_en') }}
                        </th>
                        <td>
                            {{ $mainHeader->title_en }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mainHeader.fields.background_image') }}
                        </th>
                        <td>
                            @if($mainHeader->background_image)
                                <a href="{{ $mainHeader->background_image->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $mainHeader->background_image->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.main-headers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
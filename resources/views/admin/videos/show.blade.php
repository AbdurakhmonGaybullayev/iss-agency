@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.show') }} {{ trans('cruds.video.title') }}
        </div>

        <div class="card-body">
            <div class="form-group">
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.videos.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
                <table class="table table-bordered table-striped">
                    <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.video.fields.id') }}
                        </th>
                        <td>
                            {{ $video->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.video.fields.number') }}
                        </th>
                        <td>
                            {{ $video->number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.video.fields.title_uz') }}
                        </th>
                        <td>
                            {{ $video->title_uz }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.video.fields.title_ru') }}
                        </th>
                        <td>
                            {{ $video->title_ru }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.video.fields.title_en') }}
                        </th>
                        <td>
                            {{ $video->title_en }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.video.fields.type') }}
                        </th>
                        <td>
                            {{ App\Models\Video::TYPE_SELECT[$video->type] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.video.fields.cover') }}
                        </th>
                        <td>
                            @if($video->cover)
                                <a href="{{ $video->cover->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $video->cover->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.video.fields.file') }}
                        </th>
                        <td>
                            @if($video->file)
                                <a href="{{ $video->file->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.video.fields.parent') }}
                        </th>
                        <td>
                            {{ $video->parent->title_uz ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.video.fields.top') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $video->top ? 'checked' : '' }}>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.videos.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
            </div>
        </div>
    </div>



@endsection
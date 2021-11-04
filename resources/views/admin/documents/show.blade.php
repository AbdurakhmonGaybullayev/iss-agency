@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.document.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.documents.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.document.fields.id') }}
                        </th>
                        <td>
                            {{ $document->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.document.fields.user') }}
                        </th>
                        <td>
                            {{ $document->user->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.document.fields.university') }}
                        </th>
                        <td>
                            {{ $document->university->name_uz ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.document.fields.passport') }}
                        </th>
                        <td>
                            @if($document->passport)
                                <a href="{{ asset('storage/documents/'.basename($document->folder_name).'/passport/'.$document->passport)}}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.document.fields.diploma') }}
                        </th>
                        <td>
                            @if($document->diploma)
                                <a href="{{ asset('storage/documents/'.basename($document->folder_name).'/diploma/'.$document->diploma) }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.document.fields.certificates') }}
                        </th>
                        <td>
                            @if($document->certificates)
                                <a href="{{asset('storage/documents/'.basename($document->folder_name).'/other_certificates/'.$document->certificates)}}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.document.fields.certificate') }}
                        </th>
                        <td>
                            @if($document->certificate)
                                <a href="{{ asset('storage/documents/'.basename($document->folder_name).'/certificate/'.$document->certificate) }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.document.fields.photo') }}
                        </th>
                        <td>
                            @if($document->photo)
                                <a href="{{ asset('storage/documents/'.basename($document->folder_name).'/photo/'.$document->photo) }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $document->photo->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.document.fields.direction') }}
                        </th>
                        <td>
                            {{ $document->direction->name_uz ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.document.fields.status') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $document->status ? 'checked' : '' }}>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.documents.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection

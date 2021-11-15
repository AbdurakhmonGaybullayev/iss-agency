@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.direction.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.directions.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.direction.fields.id') }}
                        </th>
                        <td>
                            {{ $direction->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.direction.fields.name_uz') }}
                        </th>
                        <td>
                            {{ $direction->name_uz }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.direction.fields.name_ru') }}
                        </th>
                        <td>
                            {{ $direction->name_ru }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.direction.fields.name_en') }}
                        </th>
                        <td>
                            {{ $direction->name_en }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.direction.fields.programm') }}
                        </th>
                        <td>
                            @foreach($direction->programms as $key => $programm)
                                <span class="label label-info">{{ $programm->name_uz }}</span>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.directions.index') }}">
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
            <a class="nav-link" href="#direction_documents" role="tab" data-toggle="tab">
                {{ trans('cruds.document.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#direction_universities" role="tab" data-toggle="tab">
                {{ trans('cruds.university.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="direction_documents">
            @includeIf('admin.directions.relationships.directionDocuments', ['documents' => $direction->directionDocuments])
        </div>
        <div class="tab-pane" role="tabpanel" id="direction_universities">
            @includeIf('admin.directions.relationships.directionUniversities', ['universities' => $direction->directionUniversities])
        </div>
    </div>
</div>

@endsection
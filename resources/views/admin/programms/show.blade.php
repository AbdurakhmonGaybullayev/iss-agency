@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.programm.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.programms.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.programm.fields.id') }}
                        </th>
                        <td>
                            {{ $programm->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.programm.fields.name_uz') }}
                        </th>
                        <td>
                            {{ $programm->name_uz }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.programm.fields.name_ru') }}
                        </th>
                        <td>
                            {{ $programm->name_ru }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.programm.fields.name_en') }}
                        </th>
                        <td>
                            {{ $programm->name_en }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.programms.index') }}">
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
            <a class="nav-link" href="#programm_directions" role="tab" data-toggle="tab">
                {{ trans('cruds.direction.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="programm_directions">
            @includeIf('admin.programms.relationships.programmDirections', ['directions' => $programm->programmDirections])
        </div>
    </div>
</div>

@endsection
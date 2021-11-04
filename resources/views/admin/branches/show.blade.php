@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.branch.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.Branches.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.branch.fields.id') }}
                        </th>
                        <td>
                            {{ $branch->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.branch.fields.number') }}
                        </th>
                        <td>
                            {{ $branch->number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.branch.fields.name_uz') }}
                        </th>
                        <td>
                            {{ $branch->name_uz }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.branch.fields.name_ru') }}
                        </th>
                        <td>
                            {{ $branch->name_ru }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.branch.fields.name_en') }}
                        </th>
                        <td>
                            {{ $branch->name_en }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.branch.fields.address_uz') }}
                        </th>
                        <td>
                            {{ $branch->address_uz }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.branch.fields.address_ru') }}
                        </th>
                        <td>
                            {{ $branch->address_ru }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.branch.fields.address_en') }}
                        </th>
                        <td>
                            {{ $branch->address_en }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.branch.fields.target_uz') }}
                        </th>
                        <td>
                            {{ $branch->target_uz }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.branch.fields.target_ru') }}
                        </th>
                        <td>
                            {{ $branch->target_ru }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.branch.fields.target_en') }}
                        </th>
                        <td>
                            {{ $branch->target_en }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.branch.fields.working_days_from') }}
                        </th>
                        <td>
                            {{ $branch->working_days_from }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.branch.fields.working_days_to') }}
                        </th>
                        <td>
                            {{ $branch->working_days_to }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.branch.fields.working_hours_from') }}
                        </th>
                        <td>
                            {{ $branch->working_hours_from }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.branch.fields.working_hours_to') }}
                        </th>
                        <td>
                            {{ $branch->working_hours_to }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.branch.fields.google_map_link') }}
                        </th>
                        <td>
                            {{ $branch->google_map_link }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.branch.fields.region') }}
                        </th>
                        <td>
                            {{ $branch->region }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.branch.fields.city') }}
                        </th>
                        <td>
                            {{ $branch->city }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.Branches.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection

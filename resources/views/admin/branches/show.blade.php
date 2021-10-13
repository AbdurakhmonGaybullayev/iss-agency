@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.branchs.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.branches.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.branchs.fields.id') }}
                        </th>
                        <td>
                            {{ $branch->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.branchs.fields.name_uz') }}
                        </th>
                        <td>
                            {{ $branch->name_uz }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.branchs.fields.name_ru') }}
                        </th>
                        <td>
                            {{ $branch->name_ru }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.branchs.fields.name_en') }}
                        </th>
                        <td>
                            {{ $branch->name_en }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.branchs.fields.address_uz') }}
                        </th>
                        <td>
                            {{ $branch->address_uz }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.branchs.fields.address_ru') }}
                        </th>
                        <td>
                            {{ $branch->address_ru }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.branchs.fields.address_en') }}
                        </th>
                        <td>
                            {{ $branch->address_en }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.branchs.fields.target_uz') }}
                        </th>
                        <td>
                            {{ $branch->target_uz }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.branchs.fields.target_ru') }}
                        </th>
                        <td>
                            {{ $branch->target_ru }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.branchs.fields.target_en') }}
                        </th>
                        <td>
                            {{ $branch->target_en }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.branchs.fields.phone_number') }}
                        </th>
                        <td>
                            {{ $branch->phone_number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.branchs.fields.email') }}
                        </th>
                        <td>
                            {{ $branch->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.branchs.fields.working_hours') }}
                        </th>
                        <td>
                            {{ $branch->working_hours }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.branchs.fields.google_map_link') }}
                        </th>
                        <td>
                            {{ $branch->google_map_link }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.branchs.fields.number') }}
                        </th>
                        <td>
                            {{ $branch->number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.branchs.fields.region') }}
                        </th>
                        <td>
                            {{ $branch->region }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.branches.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection

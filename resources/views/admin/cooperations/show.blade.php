@extends('layouts.admin')
@php

    if ($cooperation->status != 1){
        $coo = \App\Models\Cooperation::where('id',$cooperation->id)->first();
        $coo->status = 1;
        $coo->save();
    }

@endphp
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.show') }} {{ trans('cruds.cooperation.title') }}
        </div>

        <div class="card-body">
            <div class="form-group">
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.cooperations.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
                <table class="table table-bordered table-striped">
                    <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.cooperation.fields.id') }}
                        </th>
                        <td>
                            {{ $cooperation->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cooperation.fields.user') }}
                        </th>
                        <td>
                            {{ $cooperation->user->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cooperation.fields.company_name') }}
                        </th>
                        <td>
                            {{ $cooperation->company_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cooperation.fields.position') }}
                        </th>
                        <td>
                            {{ $cooperation->position }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cooperation.fields.address') }}
                        </th>
                        <td>
                            {{ $cooperation->address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cooperation.fields.message') }}
                        </th>
                        <td>
                            {{ $cooperation->message }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cooperation.fields.status') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $cooperation->status ? 'checked' : '' }}>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.cooperations.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
            </div>
        </div>
    </div>



@endsection

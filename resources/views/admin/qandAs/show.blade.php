@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.qandA.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.qand-as.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.qandA.fields.id') }}
                        </th>
                        <td>
                            {{ $qandA->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.qandA.fields.question') }}
                        </th>
                        <td>
                            {{ $qandA->question }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.qandA.fields.answer') }}
                        </th>
                        <td>
                            {{ $qandA->answer }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.qandA.fields.number') }}
                        </th>
                        <td>
                            {{ $qandA->number }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.qand-as.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
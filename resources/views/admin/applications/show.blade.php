@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.application.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.applications.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.application.fields.id') }}
                        </th>
                        <td>
                            {{ $application->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.application.fields.user') }}
                        </th>
                        <td>
                            {{ $application->first_name ?? '' }} {{ $application->last_name ?? '' }}
                        </td>
                    </tr>


                    <tr>
                        <th>
                            {{ trans('cruds.application.fields.message') }}
                        </th>
                        <td>
                            {{ $application->message }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.application.fields.certificate_status') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $application->certificate_status ? 'checked' : '' }}>
                        </td>

                    </tr>
                    <tr>
                        <th>
                            {{ 'Status' }}
                        </th>
                        <td>
                            <input type="checkbox"
                                   disabled="disabled" {{ $application->status ? 'checked' : '' }}>
                        </td>

                        @php
                            if($application->status == 0){
                            $application = \App\Models\Application::where('id',$application->id)->first();
                            $application->status = 1;
                            $application->save();
                        }
                        @endphp
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.applications.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection

@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.homeDirectionSection.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.home-direction-sections.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.homeDirectionSection.fields.number') }}
                        </th>
                        <td>
                            {{ $homeDirectionSection->number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.homeDirectionSection.fields.image') }}
                        </th>
                        <td>
                            @if($homeDirectionSection->image)
                                <a href="{{ $homeDirectionSection->image->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $homeDirectionSection->image->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.homeDirectionSection.fields.name_uz') }}
                        </th>
                        <td>
                            {{ $homeDirectionSection->name_uz }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.homeDirectionSection.fields.name_ru') }}
                        </th>
                        <td>
                            {{ $homeDirectionSection->name_ru }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.homeDirectionSection.fields.name_en') }}
                        </th>
                        <td>
                            {{ $homeDirectionSection->name_en }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.homeDirectionSection.fields.short_description_uz') }}
                        </th>
                        <td>
                            {{ $homeDirectionSection->short_description_uz }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.homeDirectionSection.fields.short_description_ru') }}
                        </th>
                        <td>
                            {{ $homeDirectionSection->short_description_ru }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.homeDirectionSection.fields.short_description_en') }}
                        </th>
                        <td>
                            {{ $homeDirectionSection->short_description_en }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.home-direction-sections.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
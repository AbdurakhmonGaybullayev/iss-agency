@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.country.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.countries.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.country.fields.id') }}
                        </th>
                        <td>
                            {{ $country->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.country.fields.name_uz') }}
                        </th>
                        <td>
                            {{ $country->name_uz }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.country.fields.name_ru') }}
                        </th>
                        <td>
                            {{ $country->name_ru }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.country.fields.name_en') }}
                        </th>
                        <td>
                            {{ $country->name_en }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.country.fields.country_logo') }}
                        </th>
                        <td>
                            @if($country->country_logo)
                                <a href="{{ $country->country_logo->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $country->country_logo->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.country.fields.image') }}
                        </th>
                        <td>
                            @if($country->image)
                                <a href="{{ $country->image->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $country->image->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.countries.index') }}">
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
            <a class="nav-link" href="#country_universities" role="tab" data-toggle="tab">
                {{ trans('cruds.university.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#country_galleries" role="tab" data-toggle="tab">
                {{ trans('cruds.gallery.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="country_universities">
            @includeIf('admin.countries.relationships.countryUniversities', ['universities' => $country->countryUniversities])
        </div>
        <div class="tab-pane" role="tabpanel" id="country_galleries">
            @includeIf('admin.countries.relationships.countryGalleries', ['galleries' => $country->countryGalleries])
        </div>
    </div>
</div>

@endsection
@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.show') }} {{ trans('cruds.header.title') }}
        </div>

        <div class="card-body">
            <div class="form-group">
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.headers.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
                <table class="table table-bordered table-striped">
                    <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.header.fields.id') }}
                        </th>
                        <td>
                            {{ $header->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.header.fields.about_us') }}
                        </th>
                        <td>
                            @if($header->about_us)
                                <a href="{{ $header->about_us->getUrl() }}" target="_blank"
                                   style="display: inline-block">
                                    <img src="{{ $header->about_us->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.header.fields.gallery') }}
                        </th>
                        <td>
                            @if($header->gallery)
                                <a href="{{ $header->gallery->getUrl() }}" target="_blank"
                                   style="display: inline-block">
                                    <img src="{{ $header->gallery->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.header.fields.videos') }}
                        </th>
                        <td>
                            @if($header->videos)
                                <a href="{{ $header->videos->getUrl() }}" target="_blank"
                                   style="display: inline-block">
                                    <img src="{{ $header->videos->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.header.fields.news') }}
                        </th>
                        <td>
                            @if($header->news)
                                <a href="{{ $header->news->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $header->news->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.header.fields.programs') }}
                        </th>
                        <td>
                            @if($header->programs)
                                <a href="{{ $header->programs->getUrl() }}" target="_blank"
                                   style="display: inline-block">
                                    <img src="{{ $header->programs->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.header.fields.faq') }}
                        </th>
                        <td>
                            @if($header->faq)
                                <a href="{{ $header->faq->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $header->faq->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.header.fields.cooperation') }}
                        </th>
                        <td>
                            @if($header->cooperation)
                                <a href="{{ $header->cooperation->getUrl() }}" target="_blank"
                                   style="display: inline-block">
                                    <img src="{{ $header->cooperation->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ 'Branches' }}
                        </th>
                        <td>
                            @if($header->branches)
                                <a href="{{ $header->branches->getUrl() }}" target="_blank"
                                   style="display: inline-block">
                                    <img src="{{ $header->branches->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ 'Contact' }}
                        </th>
                        <td>
                            @if($header->contact)
                                <a href="{{ $header->contact->getUrl() }}" target="_blank"
                                   style="display: inline-block">
                                    <img src="{{ $header->contact->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    </tbody>
                </table>
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.headers.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
            </div>
        </div>
    </div>



@endsection

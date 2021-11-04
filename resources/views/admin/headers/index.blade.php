@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('cruds.header.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Header">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.header.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.header.fields.about_us') }}
                        </th>
                        <th>
                            {{ trans('cruds.header.fields.gallery') }}
                        </th>
                        <th>
                            {{ trans('cruds.header.fields.news') }}
                        </th>
                        <th>
                            {{ trans('cruds.header.fields.programs') }}
                        </th>
                        <th>
                            {{ trans('cruds.header.fields.faq') }}
                        </th>
                        <th>
                            {{ trans('cruds.header.fields.cooperation') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($headers as $key => $header)
                        <tr data-entry-id="{{ $header->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $header->id ?? '' }}
                            </td>
                            <td>
                                @if($header->about_us)
                                    <a href="{{ $header->about_us->getUrl() }}" target="_blank" style="display: inline-block">
                                        <img src="{{ $header->about_us->getUrl('thumb') }}">
                                    </a>
                                @endif
                            </td>
                            <td>
                                @if($header->gallery)
                                    <a href="{{ $header->gallery->getUrl() }}" target="_blank" style="display: inline-block">
                                        <img src="{{ $header->gallery->getUrl('thumb') }}">
                                    </a>
                                @endif
                            </td>
                            <td>
                                @if($header->news)
                                    <a href="{{ $header->news->getUrl() }}" target="_blank" style="display: inline-block">
                                        <img src="{{ $header->news->getUrl('thumb') }}">
                                    </a>
                                @endif
                            </td>
                            <td>
                                @if($header->programs)
                                    <a href="{{ $header->programs->getUrl() }}" target="_blank" style="display: inline-block">
                                        <img src="{{ $header->programs->getUrl('thumb') }}">
                                    </a>
                                @endif
                            </td>
                            <td>
                                @if($header->faq)
                                    <a href="{{ $header->faq->getUrl() }}" target="_blank" style="display: inline-block">
                                        <img src="{{ $header->faq->getUrl('thumb') }}">
                                    </a>
                                @endif
                            </td>
                            <td>
                                @if($header->cooperation)
                                    <a href="{{ $header->cooperation->getUrl() }}" target="_blank" style="display: inline-block">
                                        <img src="{{ $header->cooperation->getUrl('thumb') }}">
                                    </a>
                                @endif
                            </td>
                            <td>
                                @can('header_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.headers.show', $header->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('header_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.headers.edit', $header->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan


                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
  
  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'asc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-Header:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection
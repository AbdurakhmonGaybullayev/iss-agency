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
                            {{ trans('cruds.header.fields.about_us_uz') }}
                        </th>
                        <th>
                            {{ trans('cruds.header.fields.qanda_uz') }}
                        </th>
                        <th>
                            {{ trans('cruds.header.fields.cooperation_uz') }}
                        </th>
                        <th>
                            {{ trans('cruds.header.fields.universities_uz') }}
                        </th>
                        <th>
                            {{ trans('cruds.header.fields.gallery_uz') }}
                        </th>
                        <th>
                            {{ trans('cruds.header.fields.blog_uz') }}
                        </th>
                        <th>
                            {{ trans('cruds.header.fields.branch_uz') }}
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
                                {{ $header->about_us_uz ?? '' }}
                            </td>
                            <td>
                                {{ $header->qanda_uz ?? '' }}
                            </td>
                            <td>
                                {{ $header->cooperation_uz ?? '' }}
                            </td>
                            <td>
                                {{ $header->universities_uz ?? '' }}
                            </td>
                            <td>
                                {{ $header->gallery_uz ?? '' }}
                            </td>
                            <td>
                                {{ $header->blog_uz ?? '' }}
                            </td>
                            <td>
                                {{ $header->branch_uz ?? '' }}
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
    order: [[ 1, 'desc' ]],
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
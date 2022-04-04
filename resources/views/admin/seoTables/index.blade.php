@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('cruds.seoTable.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-SeoTable">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.seoTable.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.seoTable.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.seoTable.fields.title_uz') }}
                        </th>
                        <th>
                            {{ trans('cruds.seoTable.fields.image') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($seoTables as $key => $seoTable)
                        <tr data-entry-id="{{ $seoTable->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $seoTable->id ?? '' }}
                            </td>
                            <td>
                                {{ $seoTable->name ?? '' }}
                            </td>
                            <td>
                                {{ $seoTable->title_uz ?? '' }}
                            </td>
                            <td>
                                @if($seoTable->image)
                                    <a href="{{ $seoTable->image->getUrl() }}" target="_blank" style="display: inline-block">
                                        <img src="{{ $seoTable->image->getUrl('thumb') }}">
                                    </a>
                                @endif
                            </td>
                            <td>
                                @can('seo_table_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.seo-tables.show', $seoTable->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('seo_table_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.seo-tables.edit', $seoTable->id) }}">
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
    pageLength: 25,
  });
  let table = $('.datatable-SeoTable:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });

})

</script>
@endsection

@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('cruds.mainHeader.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-MainHeader">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.mainHeader.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.mainHeader.fields.slogan_uz') }}
                        </th>
                        <th>
                            {{ trans('cruds.mainHeader.fields.title_uz') }}
                        </th>
                        <th>
                            {{ trans('cruds.mainHeader.fields.background_image') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($mainHeaders as $key => $mainHeader)
                        <tr data-entry-id="{{ $mainHeader->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $mainHeader->id ?? '' }}
                            </td>
                            <td>
                                {{ $mainHeader->slogan_uz ?? '' }}
                            </td>
                            <td>
                                {{ $mainHeader->title_uz ?? '' }}
                            </td>
                            <td>
                                @if($mainHeader->background_image)
                                    <a href="{{ $mainHeader->background_image->getUrl() }}" target="_blank" style="display: inline-block">
                                        <img src="{{ $mainHeader->background_image->getUrl('thumb') }}">
                                    </a>
                                @endif
                            </td>
                            <td>
                                @can('main_header_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.main-headers.show', $mainHeader->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('main_header_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.main-headers.edit', $mainHeader->id) }}">
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
  let table = $('.datatable-MainHeader:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection
@extends('layouts.admin')
@section('content')
@can('qand_a_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.qand-as.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.qandA.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.qandA.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-QandA">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.qandA.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.qandA.fields.question') }}
                        </th>
                        <th>
                            {{ trans('cruds.qandA.fields.number') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($qandAs as $key => $qandA)
                        <tr data-entry-id="{{ $qandA->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $qandA->id ?? '' }}
                            </td>
                            <td>
                                {{ $qandA->question ?? '' }}
                            </td>
                            <td>
                                {{ $qandA->number ?? '' }}
                            </td>
                            <td>
                                @can('qand_a_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.qand-as.show', $qandA->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('qand_a_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.qand-as.edit', $qandA->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('qand_a_delete')
                                    <form action="{{ route('admin.qand-as.destroy', $qandA->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
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
@can('qand_a_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.qand-as.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 3, 'asc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-QandA:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection
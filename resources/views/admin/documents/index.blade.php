@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('cruds.document.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Document">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.document.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.document.fields.user') }}
                        </th>
                        <th>
                            {{ trans('cruds.document.fields.photo') }}
                        </th>
                        <th>
                            {{ trans('cruds.document.fields.university') }}
                        </th>
                        <th>
                            {{ trans('cruds.document.fields.direction') }}
                        </th>
                        <th>
                            {{ trans('cruds.document.fields.status') }}
                        </th>

                        <th>
                            &nbsp;
                        </th>
                    </tr>
                    <tr>
                        <td>
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <select class="search">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach($users as $key => $item)
                                    <option value="{{ $item->last_name }}">{{ $item->last_name }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <select class="search">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach($universities as $key => $item)
                                    <option value="{{ $item->name_uz }}">{{ $item->name_uz }}</option>
                                @endforeach
                            </select>
                        </td>

                        <td>
                        </td>
                        <td>
                            <select class="search">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach($directions as $key => $item)
                                    <option value="{{ $item->name_uz }}">{{ $item->name_uz }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                        </td>
                        <td>
                        </td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($documents as $key => $document)
                        <tr data-entry-id="{{ $document->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $document->id ?? '' }}
                            </td>
                            <td>
                                {{ $document->user->first_name ?? '' }} {{ $document->user->last_name ?? '' }} {{ $document->user->middle_name ?? '' }}
                            </td>
                            <td>
                                @if($document->photo)
                                    <a href="{{ asset('storage/documents/'.$document->folder_name.'/photo/'.$document->photo) }}" target="_blank" style="display: inline-block">
                                        <img style="height: 70px" src="{{ asset('storage/documents/'.$document->folder_name.'/photo/'.$document->photo) }}">
                                    </a>
                                @endif
                            </td>
                            <td>
                                {{ $document->university->name_uz ?? '' }}
                            </td>

                            <td>
                                {{ $document->direction->name_uz ?? '' }}
                            </td>
                            <td>
                                <span style="display:none">{{ $document->status ?? '' }}</span>
                                <input type="checkbox" disabled="disabled" {{ $document->status ? 'checked' : '' }}>
                            </td>

                            <td>
                                @can('document_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.documents.show', $document->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan


                                @can('document_delete')
                                    <form action="{{ route('admin.documents.destroy', $document->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('document_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.documents.massDestroy') }}",
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
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-Document:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });

let visibleColumnsIndexes = null;
$('.datatable thead').on('input', '.search', function () {
      let strict = $(this).attr('strict') || false
      let value = strict && this.value ? "^" + this.value + "$" : this.value

      let index = $(this).parent().index()
      if (visibleColumnsIndexes !== null) {
        index = visibleColumnsIndexes[index]
      }

      table
        .column(index)
        .search(value, strict)
        .draw()
  });
table.on('column-visibility.dt', function(e, settings, column, state) {
      visibleColumnsIndexes = []
      table.columns(":visible").every(function(colIdx) {
          visibleColumnsIndexes.push(colIdx);
      });
  })
})

</script>
@endsection

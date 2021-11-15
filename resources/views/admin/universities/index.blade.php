@extends('layouts.admin')
@section('content')
@can('university_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.universities.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.university.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.university.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-University">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.university.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.university.fields.number') }}
                        </th>
                        <th>
                            {{ trans('cruds.university.fields.name_uz') }}
                        </th>
                        <th>
                            {{ trans('cruds.university.fields.image') }}
                        </th>
                        <th>
                            {{ trans('cruds.university.fields.top') }}
                        </th>
                        <th>
                            {{ trans('cruds.university.fields.country') }}
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
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                        </td>
                        <td>
                        </td>
                        <td>
                            <select class="search">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach($countries as $key => $item)
                                    <option value="{{ $item->name_uz }}">{{ $item->name_uz }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                        </td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($universities as $key => $university)
                        <tr data-entry-id="{{ $university->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $university->id ?? '' }}
                            </td>
                            <td>
                                {{ $university->number ?? '' }}
                            </td>
                            <td>
                                {{ $university->name_uz ?? '' }}
                            </td>
                            <td>
                                @if($university->image)
                                    <a href="{{ $university->image->getUrl() }}" target="_blank" style="display: inline-block">
                                        <img src="{{ $university->image->getUrl('thumb') }}">
                                    </a>
                                @endif
                            </td>
                            <td>
                                <span style="display:none">{{ $university->top ?? '' }}</span>
                                <input type="checkbox" disabled="disabled" {{ $university->top ? 'checked' : '' }}>
                            </td>
                            <td>
                                {{ $university->country->name_uz ?? '' }}
                            </td>
                            <td>
                                @can('university_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.universities.show', $university->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('university_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.universities.edit', $university->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('university_delete')
                                    <form action="{{ route('admin.universities.destroy', $university->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('university_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.universities.massDestroy') }}",
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
    order: [[ 2, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-University:not(.ajaxTable)').DataTable({ buttons: dtButtons })
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

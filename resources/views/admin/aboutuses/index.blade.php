@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('cruds.aboutUs.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-AboutUs">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.aboutUs.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.aboutUs.fields.title_uz') }}
                        </th>
                        <th>
                            {{ trans('cruds.aboutUs.fields.image') }}
                        </th>
                        <th>
                            {{ trans('cruds.aboutUs.fields.short_description_uz') }}
                        </th>
                        <th>
                            {{ trans('cruds.aboutUs.fields.advantages_uz') }}
                        </th>
                        <th>
                            {{ trans('cruds.aboutUs.fields.success_students') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($aboutuses as $key => $aboutUs)
                        <tr data-entry-id="{{ $aboutUs->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $aboutUs->id ?? '' }}
                            </td>
                            <td>
                                {{ $aboutUs->title_uz ?? '' }}
                            </td>
                            <td>
                                @if($aboutUs->image)
                                    <a href="{{ $aboutUs->image->getUrl() }}" target="_blank" style="display: inline-block">
                                        <img src="{{ $aboutUs->image->getUrl('thumb') }}">
                                    </a>
                                @endif
                            </td>
                            <td>
                                {{ $aboutUs->short_description_uz ?? '' }}
                            </td>
                            <td>
                                {{ $aboutUs->advantages_uz ?? '' }}
                            </td>
                            <td>
                                {{ $aboutUs->success_students ?? '' }}
                            </td>
                            <td>
                                @can('about_us_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.aboutuses.show', $aboutUs->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('about_us_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.aboutuses.edit', $aboutUs->id) }}">
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
  let table = $('.datatable-AboutUs:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });

})

</script>
@endsection

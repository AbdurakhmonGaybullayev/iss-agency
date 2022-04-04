@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('cruds.homeDirectionSection.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-HomeDirectionSection">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.homeDirectionSection.fields.number') }}
                        </th>
                        <th>
                            {{ trans('cruds.homeDirectionSection.fields.image') }}
                        </th>
                        <th>
                            {{ trans('cruds.homeDirectionSection.fields.name_uz') }}
                        </th>
                        <th>
                            {{ trans('cruds.homeDirectionSection.fields.short_description_uz') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($homeDirectionSections as $key => $homeDirectionSection)
                        <tr data-entry-id="{{ $homeDirectionSection->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $homeDirectionSection->number ?? '' }}
                            </td>
                            <td>
                                @if($homeDirectionSection->image)
                                    <a href="{{ $homeDirectionSection->image->getUrl() }}" target="_blank" style="display: inline-block">
                                        <img src="{{ $homeDirectionSection->image->getUrl('thumb') }}">
                                    </a>
                                @endif
                            </td>
                            <td>
                                {{ $homeDirectionSection->name_uz ?? '' }}
                            </td>
                            <td>
                                {{ $homeDirectionSection->short_description_uz ?? '' }}
                            </td>
                            <td>
                                @can('home_direction_section_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.home-direction-sections.show', $homeDirectionSection->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('home_direction_section_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.home-direction-sections.edit', $homeDirectionSection->id) }}">
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
  let table = $('.datatable-HomeDirectionSection:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection
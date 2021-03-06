@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('cruds.cooperationOfferText.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-CooperationOfferText">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.cooperationOfferText.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.cooperationOfferText.fields.title_uz') }}
                        </th>
                        <th>
                            {{ trans('cruds.cooperationOfferText.fields.offer_uz') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cooperationOfferTexts as $key => $cooperationOfferText)
                        <tr data-entry-id="{{ $cooperationOfferText->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $cooperationOfferText->id ?? '' }}
                            </td>
                            <td>
                                {{ $cooperationOfferText->title_uz ?? '' }}
                            </td>
                            <td>
                                {{ $cooperationOfferText->offer_uz ?? '' }}
                            </td>
                            <td>
                                @can('cooperation_offer_text_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.cooperation-offer-texts.show', $cooperationOfferText->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('cooperation_offer_text_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.cooperation-offer-texts.edit', $cooperationOfferText->id) }}">
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
  let table = $('.datatable-CooperationOfferText:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection
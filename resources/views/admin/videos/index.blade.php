@extends('layouts.admin')
@section('content')
    @can('video_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.videos.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.video.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.video.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-Video">
                    <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.video.fields.number') }}
                        </th>
                        <th>
                            {{ trans('cruds.video.fields.title_uz') }}
                        </th>
                        <th>
                            {{ trans('cruds.video.fields.type') }}
                        </th>
                        <th>
                            {{ trans('cruds.video.fields.cover') }}
                        </th>
                        <th>
                            {{ trans('cruds.video.fields.parent') }}
                        </th>
                        <th>
                            {{ trans('cruds.video.fields.top') }}
                        </th>
                        <th>
                            {{ trans('cruds.video.fields.created_at') }}
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
                            <select class="search" strict="true">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach(App\Models\Video::TYPE_SELECT as $key => $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                        </td>
                        <td>
                            <select class="search">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach($videos as $key => $item)
                                    <option value="{{ $item->title_uz }}">{{ $item->title_uz }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                        </td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($videos as $key => $video)
                        <tr data-entry-id="{{ $video->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $video->number ?? '' }}
                            </td>
                            <td>
                                {{ $video->title_uz ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Video::TYPE_SELECT[$video->type] ?? '' }}
                            </td>
                            <td>
                                @if($video->cover)
                                    <a href="{{ $video->cover->getUrl() }}" target="_blank" style="display: inline-block">
                                        <img src="{{ $video->cover->getUrl('thumb') }}">
                                    </a>
                                @endif
                            </td>
                            <td>
                                {{ $video->parent->title_uz ?? '' }}
                            </td>
                            <td>
                                <span style="display:none">{{ $video->top ?? '' }}</span>
                                <input type="checkbox" disabled="disabled" {{ $video->top ? 'checked' : '' }}>
                            </td>
                            <td>
                                {{ $video->created_at ?? '' }}
                            </td>
                            <td>
                                @can('video_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.videos.show', $video->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('video_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.videos.edit', $video->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('video_delete')
                                    <form action="{{ route('admin.videos.destroy', $video->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
            @can('video_delete')
            let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
            let deleteButton = {
                text: deleteButtonTrans,
                url: "{{ route('admin.videos.massDestroy') }}",
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
                pageLength: 25,
            });
            let table = $('.datatable-Video:not(.ajaxTable)').DataTable({ buttons: dtButtons })
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

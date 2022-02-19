@extends('layouts.admin')
@section('content')
    <div class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        Dashboard
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="row text-white text-bold">
                            <div class="{{ $settings1['column_class'] }}">
                                <div class="card text-white bg-primary">
                                    <a href="{{ route('admin.home')}}" class="text-bold text-white">
                                        <div class="card-body pb-0">
                                            <div class="text-value">{{ number_format($settings1['total_number']) }}
                                            </div>
                                            <div>ALL</div>
                                            <br />
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card text-white bg-success">
                                    <div class="card-body pb-0">
                                        <div class="text-value">500</div>
                                        <div>OTHER STUFF</div>
                                        <br />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card text-white bg-danger">
                                    <div class="card-body pb-0">
                                        <div class="text-value">5000</div>
                                        <div>OTHER STUFF</div>
                                        <br />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card text-white bg-warning">
                                    <a href="{{ route('admin.inventories.create') }}" class="text-bold">
                                        <div class="card-body pb-0">
                                            <div class="text-value">
                                                <i class="fa fa-plus"></i>
                                            </div>
                                            <div>Add Inventory</div>
                                            <br />
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <h6>Table of current Inventory</h6>
                                <table
                                    class=" table table-bordered table-striped table-hover datatable datatable-Inventory">
                                    <thead>
                                        <tr>
                                            <th width="10">

                                            </th>
                                            <th>
                                                {{ trans('cruds.inventory.fields.vehicle') }}
                                            </th>
                                            <th>
                                                {{ trans('cruds.inventory.fields.engine_type') }}
                                            </th>
                                            <th>
                                                {{ trans('cruds.inventory.fields.transmission') }}
                                            </th>
                                            <th>
                                                {{ trans('cruds.inventory.fields.interior_color') }}
                                            </th>
                                            <th>
                                                {{ trans('cruds.inventory.fields.exterior_color') }}
                                            </th>
                                            <th>
                                                {{ trans('cruds.inventory.fields.pictures') }}
                                            </th>
                                            <th>
                                                &nbsp;
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($inventories as $key => $inventory)
                                            <tr data-entry-id="{{ $inventory->id }}">
                                                <td>

                                                </td>
                                                <td>
                                                    {{ $inventory->vehicle ?? '' }}
                                                </td>
                                                <td>
                                                    {{ $inventory->engine_type ?? '' }}
                                                </td>
                                                <td>
                                                    {{ $inventory->transmission ?? '' }}
                                                </td>
                                                <td>
                                                    {{ $inventory->interior_color ?? '' }}
                                                </td>
                                                <td>
                                                    {{ $inventory->exterior_color ?? '' }}
                                                </td>
                                                <td>
                                                    @foreach ($inventory->pictures as $key => $media)
                                                        <a href="{{ $media->getUrl() }}" target="_blank"
                                                            style="display: inline-block">
                                                            <img src="{{ $media->getUrl('thumb') }}">
                                                        </a>
                                                    @endforeach
                                                </td>
                                                <td>
                                                    @can('inventory_edit')
                                                        <a class="btn btn-xs btn-info"
                                                            href="{{ route('admin.inventories.edit', $inventory->id) }}">
                                                            {{ trans('global.edit') }}
                                                        </a>
                                                    @endcan

                                                    @can('inventory_delete')
                                                        <form
                                                            action="{{ route('admin.inventories.destroy', $inventory->id) }}"
                                                            method="POST"
                                                            onsubmit="return confirm('{{ trans('global.areYouSure') }}');"
                                                            style="display: inline-block;">
                                                            <input type="hidden" name="_method" value="DELETE">
                                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                            <input type="submit" class="btn btn-xs btn-danger"
                                                                value="{{ trans('global.delete') }}">
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
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    @parent
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <script>
        $(function() {
            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
            @can('inventory_delete')
                let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
                let deleteButton = {
                text: deleteButtonTrans,
                url: "{{ route('admin.inventories.massDestroy') }}",
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
                order: [
                    [1, 'asc']
                ],
                pageLength: 100,
            });
            let table = $('.datatable-Inventory:not(.ajaxTable)').DataTable({
                // buttons: dtButtons
                dom: 'Bfrtip',
                buttons: [],
                searching: false,
            })
            $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e) {
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });

        })
    </script>
@endsection

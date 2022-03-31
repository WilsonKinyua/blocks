@extends('layouts.admin')
@section('content')
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="page-bar">
                <div class="page-title-breadcrumb">
                    <div class=" pull-left">
                        <div class="page-title">Tenants List</div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="tabbable-line">
                        <div class="tab-content">
                            <div class="tab-pane active fontawesome-demo" id="tab1">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card card-box">
                                            <div class="card-head">
                                                <header>All Tenants</header>
                                                <div class="tools">
                                                    <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
                                                    <a class="t-collapse btn-color fa fa-chevron-down"
                                                        href="javascript:;"></a>
                                                    <a class="t-close btn-color fa fa-times" href="javascript:;"></a>
                                                </div>
                                            </div>
                                            <div class="card-body ">
                                                <div class="row">
                                                    <div class="col-md-6 col-sm-6 col-6">
                                                        @can('tenant_create')
                                                            <div class="btn-group">
                                                                <a href="{{ route('admin.tenants.create') }}" id="addRow"
                                                                    class="btn btn-info">
                                                                    Add New <i class="fa fa-plus"></i>
                                                                </a>
                                                            </div>
                                                        @endcan
                                                    </div>
                                                    <div class="col-md-6 col-sm-6 col-6">
                                                    </div>
                                                </div>
                                                <div class="table-scrollable">
                                                    <table
                                                        class="table table-striped table-bordered table-hover table-checkable order-column valign-middle"
                                                        id="example4">
                                                        <thead>
                                                            <tr class="text-uppercase">
                                                                <th>#</th>
                                                                <th> Name </th>
                                                                <th> Apartment </th>
                                                                <th> House No. </th>
                                                                <th> Rent </th>
                                                                <th> Balance </th>
                                                                <th> Mobile </th>
                                                                <th> Status </th>
                                                                <th> Action </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($tenants as $tenant)
                                                                <tr class="odd gradeX text-capitalize">
                                                                    <td class="patient-img"> <img
                                                                            src="{{ asset('img/avatar.png') }}" alt="1">
                                                                    </td>
                                                                    <td class="left">
                                                                        <a
                                                                            href="{{ route('admin.tenants.show', $tenant->id) }}">{{ $tenant->name ?? '' }}</a>
                                                                    </td>
                                                                    <td class="left">
                                                                        {{ $tenant->apartment->name ?? '' }}
                                                                    </td>
                                                                    <td class="left">
                                                                        {{ $tenant->house->name ?? '' }}
                                                                    </td>
                                                                    <td>Ksh. {{ number_format($tenant->rent) ?? '00' }}
                                                                    </td>
                                                                    <td>
                                                                        @if ($tenant->payments->sum('amount_paid') >= $tenant->rent)
                                                                            <span class="text-success" style="font-weight: 900">
                                                                                Ksh.
                                                                            {{ number_format($tenant->payments->sum('amount_paid') - $tenant->rent) }}
                                                                            </span>
                                                                        @else
                                                                            <span class="text-danger">
                                                                                Ksh.
                                                                            {{ number_format($tenant->rent - $tenant->payments->sum('amount_paid')) }}
                                                                            </span>
                                                                        @endif
                                                                    </td>
                                                                    <td><a href="tel:{{ $tenant->phone ?? '' }}">{{ $tenant->phone ?? '' }}
                                                                    </td>
                                                                    <td>
                                                                        <a
                                                                            href="{{ route('admin.tenants.vacate', $tenant->id) }}">
                                                                            @if ($tenant->status == 1)
                                                                                <span
                                                                                    class='label label-info label-mini'>Current</span>
                                                                            @else
                                                                                <span
                                                                                    class='label label-danger label-mini'>VACATED</span>
                                                                            @endif
                                                                        </a>
                                                                    </td>
                                                                    <td>
                                                                        <a onclick="confirmDelete()"
                                                                            class="btn btn-danger btn-xs">
                                                                            <i class="fa fa-trash-o "></i>
                                                                        </a>
                                                                        <script>
                                                                            function confirmDelete() {
                                                                                if (confirm('Are you sure you want to delete this tenant?')) {
                                                                                    window.location.href = "{{ route('admin.tenants.delete', $tenant->id) }}";
                                                                                }
                                                                            }
                                                                        </script>
                                                                        <a href="{{ route('admin.tenants.edit', $tenant->id) }}"
                                                                            class="btn btn-primary btn-xs">
                                                                            <i class="fa fa-pencil"></i>
                                                                        </a>
                                                                        <a data-bs-toggle="modal"
                                                                            data-bs-target="#sendReminderNotification{{ $tenant->id }}"
                                                                            class="btn btn-primary btn-xs reminder-btn">
                                                                            <i class="fa fa-bell "></i>
                                                                        </a>
                                                                        {{-- update business details start --}}
                                                                        @include('modals.send-sms-reminder')
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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

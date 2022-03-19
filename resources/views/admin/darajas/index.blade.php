@extends('layouts.admin')
@section('content')
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="page-bar">
                <div class="page-title-breadcrumb">
                    <div class=" pull-left">
                        <div class="page-title text-uppercase"> <i class="fa fa-home"></i> under &nbsp;management</div>
                    </div>
                    <ol class="breadcrumb page-breadcrumb pull-right d-none">
                        <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
                                href="{{ route('admin.home') }}">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                        </li>
                        <li><a class="parent-item" href="{{ route('admin.darajas.index') }}">Darajas</a>&nbsp;<i
                                class="fa fa-angle-right"></i>
                        </li>
                        <li class="active">All</li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card card-box">
                        <div class="card-head">
                            <header>Listing All Darajas</header>
                            <div class="tools">
                                <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
                                <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
                                <a class="t-close btn-color fa fa-times" href="javascript:;"></a>
                            </div>
                        </div>
                        <div class="card-body ">
                            <div class="row">
                                @can('property_create')
                                    <div class="col-md-6 col-sm-6 col-6">
                                        <div class="btn-group">
                                            <a href="{{ route('admin.darajas.create') }}" id="addRow"
                                                class="btn btn-info">
                                                Add New <i class="fa fa-plus"></i>
                                            </a>
                                        </div>
                                    </div>
                                @endcan
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
                                            <th> Transaction </th>
                                            <th> Consumer Key </th>
                                            <th> Consumer Secret </th>
                                            <th> Validation Webhook </th>
                                            <th> Confirmation Webhook </th>
                                            <th> Action </th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($darajas as $daraja)
                                            <tr class="odd gradeX text-capitalize">
                                                <td class="patient-img">
                                                    {{ $loop->index + 1 }}
                                                </td>
                                                <td>
                                                    {{ $daraja->transaction ?? '' }}
                                                </td>
                                                <td>
                                                    {{ $daraja->consumer_key ?? '' }}
                                                </td>
                                                <td>
                                                    {{ $daraja->consumer_secret ?? '' }}
                                                </td>
                                                <td>
                                                    {{ $daraja->validation_webhook ?? '' }}
                                                </td>
                                                <td>
                                                    {{ $daraja->confirmation_webhook ?? '' }}
                                                </td>
                                                <td class="left">
                                                    {{ $daraja->created_at ?? '' }}
                                                </td>
                                                <td>
                                                    <a href="{{ route('admin.darajas.edit', $daraja->id) }}"
                                                        class="btn btn-primary btn-xs">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                    <a onclick="confirmDelete()" class="btn btn-danger btn-xs">
                                                        <i class="fa fa-trash-o "></i>
                                                    </a>
                                                    <script>
                                                        function confirmDelete() {
                                                            if (confirm('Are you sure you want to delete this tenant?')) {
                                                                window.location.href = "{{ route('admin.daraja.delete', $daraja->id) }}";
                                                            }
                                                        }
                                                    </script>
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

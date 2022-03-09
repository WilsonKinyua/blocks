@extends('layouts.admin')
@section('content')
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="page-bar">
                <div class="page-title-breadcrumb">
                    <div class=" pull-left">
                        <div class="page-title"><i class="material-icons">assignment</i> Transactions History</div>
                    </div>
                </div>
            </div>
            <div class="state-overview d-none">
                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="overview-panel purple">
                            <div class="symbol">
                                <i class="fa fa-bank usr-clr"></i>
                            </div>
                            <div class="value white">
                                <p class="sbold addr-font-h1" data-counter="counterup" data-value="40,000"></p>
                                <p>RECEIVED PAYMENTS</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="overview-panel deepPink-bgcolor">
                            <div class="symbol">
                                <i class="fa fa-times-circle-o"></i>
                            </div>
                            <div class="value white">
                                <p class="sbold addr-font-h1" data-counter="counterup" data-value="10">0</p>
                                <p>PENDING <small>(UNITS)</small></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="overview-panel bg-success">
                            <div class="symbol">
                                <i class="fa fa-money"></i>
                            </div>
                            <div class="value white">
                                <p class="sbold addr-font-h1" data-counter="counterup" data-value="500">0</p>
                                <p>PAYBILL <small>(KSH)</small></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="overview-panel blue-bgcolor">
                            <div class="symbol">
                                <i class="fa fa-money"></i>
                            </div>
                            <div class="value white">
                                <p class="sbold addr-font-h1" data-counter="counterup" data-value="39,500">0</p>
                                <p>CASH & OTHERS <small>(KSH)</small></p>
                            </div>
                        </div>
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
                                                <header>All Transactions</header>
                                            </div>
                                            <div class="card-body">
                                                <div class="table-scrollable">
                                                    <table
                                                        class="table table-striped table-bordered table-hover table-checkable order-column valign-middle"
                                                        id="example4">
                                                        <thead>
                                                            <tr class="text-uppercase">
                                                                <th>##</th>
                                                                <th> Date </th>
                                                                <th> Tenant Name </th>
                                                                <th> Apartment </th>
                                                                <th> House No. </th>
                                                                <th> Amount </th>
                                                                <th> Description </th>
                                                                <th> Action </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($transactions as $transaction)
                                                                <tr class="odd gradeX text-capitalize">
                                                                    <td class="">
                                                                        {{ $loop->iteration }}
                                                                    </td>
                                                                    <td class="">
                                                                        {{ $transaction->payment_date }}
                                                                    </td>
                                                                    <td class="left">
                                                                        <a
                                                                            href="{{ route('admin.tenants.show', $transaction->tenant_id) }}">{{ $transaction->tenant->name ?? '' }}</a>
                                                                    </td>
                                                                    <td class="left">
                                                                        {{ $transaction->apartment->name ?? '' }}
                                                                    </td>
                                                                    <td class="left">
                                                                        {{ $transaction->tenant->house->name ?? '' }}
                                                                    </td>
                                                                    <td class=''>Ksh.
                                                                        {{ $transaction->amount_paid }}
                                                                    </td>
                                                                    <td>{{ $transaction->payment_method }} payment</td>
                                                                    <td>
                                                                        <span class='label label-danger label-mini'>
                                                                            Reversed</span>
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

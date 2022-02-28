@extends('layouts.admin')
@section('content')
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="page-bar">
                <div class="page-title-breadcrumb">
                    <div class=" pull-left">
                        <div class="page-title"><i class='fa fa-user-circle'></i> Tenant Profile</div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <!-- BEGIN PROFILE SIDEBAR -->
                    <div class="profile-sidebar">
                        <div class="card card-topline-gray">
                            <div class="card-body no-padding height-9">
                                <div class="row">
                                    <div class="profile-userpic">
                                        <img src="{{ asset('img/avatar.jpeg') }}" class="img-responsive" alt="">
                                    </div>
                                </div>
                                <div class="profile-usertitle text-capitalize">
                                    <div class="profile-usertitle-name">{{ $tenant->name ?? '' }}</div>
                                    <div class="profile-usertitle-job"> {{ $tenant->house->name ?? '' }}</div>
                                </div>
                                <ul class="list-group list-group-unbordered">
                                    <li class="list-group-item">
                                        <b>Id No:</b> <a class="pull-right">{{ $tenant->id_number ?? '' }}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Rent:</b> <a class="pull-right">Ksh.
                                            {{ number_format($tenant->rent) ?? '' }}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Balance:</b> <a class="pull-right">Ksh. 2,000</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Tenant Since:</b> <a class="pull-right">{{ $tenant->created_at ?? '' }}</a>
                                    </li>
                                </ul>

                                <div class="row list-separated profile-stat">
                                    <div class="col-md-4 col-sm-4 col-6">
                                        <div class="uppercase profile-stat-title"> 1 </div>
                                        <div class="uppercase profile-stat-text"> Months </div>
                                    </div>
                                    <div class="col-md-4 col-sm-4 col-6">
                                        <div class="uppercase profile-stat-title"> 0 </div>
                                        <div class="uppercase profile-stat-text"> Early </div>
                                    </div>
                                    <div class="col-md-4 col-sm-4 col-6">
                                        <div class="uppercase profile-stat-title"> 0 </div>
                                        <div class="uppercase profile-stat-text"> Late </div>
                                    </div>
                                </div>
                                <div class="profile-userbuttons">
                                    <a href="{{ route('admin.tenants.edit', $tenant->id) }}"
                                        class="btn btn-circle green btn-sm">Update</a>
                                    <a href='{{ route('admin.tenants.vacate', $tenant->id) }}'
                                        class='btn btn-circle red btn-sm vacate'>
                                        @if ($tenant->status == 1)
                                            Active
                                        @else
                                            Vacated
                                        @endif
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-head card-topline-aqua">
                                <header>Emergency Contact</header>
                            </div>
                            <div class="card-body no-padding height-9">
                                <ul class="performance-list">
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-circle-o" style="color:#F39C12;"></i> Name: <span
                                                class="pull-right">{{ $tenant->emergency_contact_name ?? ' ' }}</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-circle-o" style="color:#DD4B39;"></i> Contact: <span
                                                class="pull-right">{{ $tenant->emergency_contact_phone ?? ' ' }}</span>
                                        </a>
                                    </li>
                                    {{-- <li>
                                        <a href="#">
                                            <i class="fa fa-circle-o" style="color:#00A65A;"></i> Contact: <span
                                                class="pull-right">072345679</span>
                                        </a>
                                    </li> --}}
                                </ul>
                            </div>
                        </div>

                    </div>
                    <div class="profile-content">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-head card-topline-gray">
                                        <header>Payment History</header>
                                        <button id="invoice-action"
                                            class="mdl-button mdl-js-button mdl-button--icon pull-right"
                                            data-upgraded=",MaterialButton">
                                            <i class="material-icons">more_vert</i>
                                        </button>

                                        <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"
                                            data-mdl-for="invoice-action">
                                            <li class="mdl-menu__item"
                                                onclick="window.location='{{ route('admin.tenants.record.payment', $tenant->id) }}'">
                                                <i class="fa fa-bookmark"></i> Record Payment
                                            </li>
                                            {{-- <li class="mdl-menu__item"><i class="material-icons">print</i>Print Statement
                                            </li>
                                            <li class="mdl-menu__item"><i class="material-icons">mail</i> Send via email
                                            </li> --}}
                                        </ul>
                                    </div>
                                    <div class="card-body no-padding height-9">
                                        <div class="table-responsive">
                                            <table class="table table-striped custom-table table-hover">
                                                <thead>
                                                    <tr class="text-uppercase">
                                                        <th class="text-center">#</th>
                                                        <th class="text-right">Date</th>
                                                        <th class="text-right">Description</th>
                                                        <th class="text-right">Reference No.</th>
                                                        <th class="text-right">Amount</th>
                                                        <th class="text-right">Balance</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="text-center">1</td>
                                                        <td class="text-right">17-02-2022</td>
                                                        <td class="text-right">Cash payment</td>
                                                        <td class="text-right">Ref: 020025</td>
                                                        <td class="text-right">Ksh. 9,000</td>
                                                        <td class="text-right">Ksh. 3,000</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center">2</td>
                                                        <td class="text-right">22-02-2022</td>
                                                        <td class="text-right">Cash payment</td>
                                                        <td class="text-right">Ref: 020029</td>
                                                        <td class="text-right">Ksh. 1,000</td>
                                                        <td class="text-right">Ksh. 2,000</td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-head card-topline-gray">
                                        <header>Documents</header>
                                    </div>
                                    <div class="card-body no-padding height-9">
                                        <ul class="performance-list">
                                            @foreach ($tenant->file as $key => $item)
                                                {{-- <span class="badge badge-info">{{ $item->title }}</span> --}}
                                                <li>
                                                    <a href="{{ $item->getUrl() }}" target="_blank">
                                                        <i class="fa fa-circle-o" style="color:#F39C12;"></i>
                                                        {{ $item->name }} <span class="pull-right"><i
                                                                class="fa fa-file-pdf-o"></i></span>
                                                    </a>
                                                </li>
                                            @endforeach
                                            {{-- <li>
                                                <a href="#">
                                                    <i class="fa fa-circle-o" style="color:#DD4B39;"></i> KRA: <span
                                                        class="pull-right"><i class="fa fa-file-pdf-o"></i></span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-circle-o" style="color:#F39C12;"></i> National ID:
                                                    <span class="pull-right"><i class="fa fa-file-pdf-o"></i></span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-circle-o" style="color:#00A65A;"></i> Lease Agreement:
                                                    <span class="pull-right"><i class="fa fa-file-pdf-o"></i></span>
                                                </a>
                                            </li> --}}
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-head card-topline-gray">
                                        <header>Other Payments</header>
                                    </div>
                                    <div class="card-body no-padding height-9">
                                        <ul class="performance-list">
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-circle-o" style="color:#DD4B39;"></i> Water: <span
                                                        class="pull-right">Ksh. 0.00</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-circle-o" style="color:#F39C12;"></i> Electricity:
                                                    <span class="pull-right">Ksh. 0.00</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-circle-o" style="color:#00A65A;"></i>Rent Deposit:
                                                    <span class="pull-right">Ksh. 25,000</span>
                                                </a>
                                            </li>
                                        </ul>
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

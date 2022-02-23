@extends('layouts.admin')
@section('content')
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="page-bar">
                <div class="page-title-breadcrumb">
                    <div class=" pull-left">
                        <div class="page-title"><i class='fa fa-hospital-o'></i> {{ $property->name ?? '' }}</div>
                    </div>
                </div>
            </div>

            <!-- start widget -->

            <div class="state-overview">
                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="overview-panel purple">
                            <div class="symbol">
                                <i class="fa fa-home usr-clr"></i>
                            </div>
                            <div class="value white">
                                <p class="sbold addr-font-h1" data-counter="counterup"
                                    data-value="{{ $property->no_of_units ?? '' }}">0</p>
                                <p>UNITS ON PROPERTY</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="overview-panel deepPink-bgcolor">
                            <div class="symbol">
                                <i class="fa fa-times-circle-o"></i>
                            </div>
                            <div class="value white">
                                <p class="sbold addr-font-h1" data-counter="counterup" data-value="6">0</p>
                                <p>VACANT UNITS</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="overview-panel orange">
                            <div class="symbol">
                                <i class="fa fa-money"></i>
                            </div>
                            <div class="value white">
                                <p class="sbold addr-font-h1" data-counter="counterup" data-value="2,000">0</p>
                                <p>PENDING PAYMENTS</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="overview-panel blue-bgcolor">
                            <div class="symbol">
                                <i class="fa fa-money"></i>
                            </div>
                            <div class="value white">
                                <p class="sbold addr-font-h1" data-counter="counterup" data-value="10,000">0</p>
                                <p>THIS MONTH'S PAYMENTS</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end widget -->
            <div class="row">
                <div class="col-md-12">
                    <div class="tabbable-line">
                        <ul class="nav customtab nav-tabs d-none" role="tablist">
                            <li class="nav-item"><a href="#tab1" class="nav-link active" data-toggle="tab">List
                                    View</a></li>
                            <li class="nav-item"><a href="#tab2" class="nav-link" data-toggle="tab">Grid
                                    View</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane  active fontawesome-demo" id="tab2">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="card card-box">
                                            <div class="card-body no-padding ">
                                                <div class="doctor-profile">
                                                    <img src="{{ asset('img/avatar.jpeg') }}" class="doctor-pic"
                                                        alt="">
                                                    <div class="profile-usertitle">
                                                        <div class="doctor-name">{{ $property->landlord_name ?? '' }}
                                                        </div>
                                                        <div class="name-center"> Owner </div>
                                                    </div>
                                                    <div>
                                                        <p><i class="fa fa-phone"></i><a
                                                                href="tel:{{ $property->landlord_phone ?? '' }}">
                                                                {{ $property->landlord_phone ?? '' }}</a></p>
                                                    </div>
                                                    <div class="profile-userbuttons">
                                                        <a href="#" onclick="alert('Profile currently not available')"
                                                            class="btn btn-circle deepPink-bgcolor btn-sm">View Profile</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card card-box">
                                            <div class="card-body no-padding ">
                                                <div class="doctor-profile">
                                                    <img src="{{ asset('img/avatar.jpeg') }}" class="doctor-pic"
                                                        alt="">
                                                    <div class="profile-usertitle">
                                                        <div class="doctor-name">{{ $property->manager_name ?? '' }}
                                                        </div>
                                                        <div class="name-center"> Manager </div>
                                                    </div>
                                                    <div>
                                                        <p><i class="fa fa-phone"></i><a
                                                                href="tel:{{ $property->manager_phone ?? '' }}">
                                                                {{ $property->manager_phone ?? '' }}</a></p>
                                                    </div>
                                                    <div class="profile-userbuttons">
                                                        <a href="" class="btn btn-circle deepPink-bgcolor btn-sm">Change
                                                            Manager</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card card-box">
                                            <div class="card-body no-padding ">
                                                <div class="doctor-profile">
                                                    <img src="{{ asset('img/avatar.jpeg') }}" class="doctor-pic"
                                                        alt="">
                                                    <div class="profile-usertitle">
                                                        <div class="doctor-name">{{ $property->caretaker_name ?? '' }}
                                                        </div>
                                                        <div class="name-center"> Caretaker </div>
                                                    </div>
                                                    <div>
                                                        <p><i class="fa fa-phone"></i><a
                                                                href="tel:{{ $property->caretaker_phone ?? '' }}">{{ $property->caretaker_phone ?? '' }}</a>
                                                        </p>
                                                    </div>
                                                    <div class="profile-userbuttons">
                                                        <a href="" class="btn btn-circle deepPink-bgcolor btn-sm">Change
                                                            Caretaker</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="tab-pane active fontawesome-demo" id="tab1">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card card-box">
                                            <div class="card-head">
                                                <header>{{ $property->name ?? '' }} Tenants</header>
                                            </div>
                                            <div class="card-body ">
                                                <div class="row">
                                                    <div class="col-md-6 col-sm-6 col-6">
                                                        <div class="btn-group">
                                                            <a href="" id="addRow" class="btn btn-info">
                                                                Add New <i class="fa fa-plus"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-sm-6 col-6">

                                                    </div>
                                                </div>
                                                <div class="table-scrollable">
                                                    <table
                                                        class="table table-striped table-bordered table-hover table-checkable order-column valign-middle"
                                                        id="example4">
                                                        <thead>
                                                            <tr>
                                                                <th></th>
                                                                <th> Name </th>
                                                                <th> Apartment </th>
                                                                <th> House No. </th>
                                                                <th> Rent </th>
                                                                <th> Balance </th>
                                                                <th> Mobile </th>
                                                                <th> Status</th>
                                                                <th> Action </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>

                                                            <tr class="odd gradeX">
                                                                <td class="patient-img"> <img
                                                                        src="{{ asset('img/avatar.jpeg') }}" alt="1">
                                                                </td>
                                                                <td class="left">
                                                                    <a href="">Wilson Ke</a>
                                                                </td>
                                                                <td class="left">Keja Yetu</td>
                                                                <td class="left">F103</td>
                                                                <td>Ksh. 12,000</td>
                                                                <td>Ksh. 2,000</td>
                                                                <td><a href="tel:0717255460">0717255460</td>
                                                                <td><span class='label label-info label-mini'>Current</span>
                                                                </td>
                                                                <td
                                                                    data-info='{"name":"Wilson Ke","phone":"0717255460","email":"null@blocks.co.ke"}'>

                                                                    <a href="#remove_property"
                                                                        class="btn btn-danger btn-xs">
                                                                        <i class="fa fa-trash-o "></i>
                                                                    </a>
                                                                    <a href="#update_property"
                                                                        class="btn btn-primary btn-xs">
                                                                        <i class="fa fa-pencil"></i>
                                                                    </a>
                                                                    <a href="#remove_property"
                                                                        class="btn btn-primary btn-xs reminder-btn">
                                                                        <i class="fa fa-bell "></i>
                                                                    </a>
                                                                </td>
                                                            </tr>
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

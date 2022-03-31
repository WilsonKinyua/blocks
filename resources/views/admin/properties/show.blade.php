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
            <div class="state-overview">
                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="overview-panel purple">
                            <div class="symbol">
                                <i class="fa fa-home usr-clr"></i>
                            </div>
                            <div class="value white">
                                <p class="sbold addr-font-h1" data-counter="counterup"
                                    data-value="{{ \App\Models\Unit::where('property_id', $property->id)->count() }}">0
                                </p>
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
                                <p class="sbold addr-font-h1" data-counter="counterup"
                                    data-value="{{ \App\Models\Unit::where('property_id', $property->id)->where('is_active', false)->count() }}">
                                    0</p>
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
                                <p class="sbold addr-font-h1" data-counter="counterup" data-value="
                                                    {{ number_format($tenants->sum('rent') - $property_payments->sum('amount_paid')) }}
                                                    ">0</p>
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
                                <p class="sbold addr-font-h1" data-counter="counterup"
                                    data-value="{{ number_format($property_payments->sum('amount_paid')) }}">0
                                </p>
                                <p>THIS MONTH'S PAYMENTS</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="tabbable-line">
                        <div class="tab-content">
                            <div class="tab-pane  active fontawesome-demo" id="tab2">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="card card-topline-aqua">
                                            <div class="card-head ">
                                                <header>Property Details</header>
                                            </div>
                                            <div class="card-body no-padding height-9">
                                                <ul class="performance-list">
                                                    <li>
                                                        <a href="#" class="text-capitalize">
                                                            <i class="fa fa-briefcase" style="color:#F39C12;"></i> Name:
                                                            <span
                                                                class="pull-right">{{ $property->name ?? '' }}</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#" class="text-capitalize">
                                                            <i class="fa fa-map-marker" style="color:#DD4B39;"></i> Location
                                                            : <span
                                                                class="pull-right">{{ $property->location ?? '' }}</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#" class="text-capitalize">
                                                            <i class="fa fa-list" style="color:#a6001c;"></i> No of
                                                            Units: <span
                                                                class="pull-right">{{ \App\Models\Unit::where('property_id', $property->id)->count() }}</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#" class="text-capitalize">
                                                            <i class="fa fa-calendar" style="color:#0003a6;"></i> Management
                                                            Since: <span
                                                                class="pull-right">{{ $property->management_since ?? '' }}</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#" class="text-capitalize">
                                                            <i class="fa fa-calendar" style="color:#630707;"></i> Rent Due
                                                            Date: <span
                                                                class="pull-right">{{ $property->due_date ?? '' }} of every month</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                                <div class="profile-userbuttons">
                                                    <a href="{{ route('admin.properties.edit', $property->id) }}"
                                                        class="btn btn-circle blue btn-sm">Update &nbsp; Property</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
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
                                    <div class="col-md-3">
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
                                    <div class="col-md-3">
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
                                                <header>Tenants List</header>
                                            </div>
                                            <div class="card-body ">
                                                <div class="row">
                                                    <div class="col-md-6 col-sm-6 col-6">
                                                        <div class="btn-group">
                                                            <a href="{{ route('admin.tenants.create') }}" id="addRow"
                                                                class="btn btn-info">
                                                                Add New Tenant <i class="fa fa-plus"></i>
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
                                                                            <span class="text-success"
                                                                                style="font-weight: 900">
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
                                                                        @include(
                                                                            'modals.send-sms-reminder'
                                                                        )
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

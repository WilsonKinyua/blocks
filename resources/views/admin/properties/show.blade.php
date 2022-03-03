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
                                <p class="sbold addr-font-h1" data-counter="counterup"
                                    data-value="{{ number_format($property_payments->sum('amount_paid'), 0) ?? '00' }}">0
                                </p>
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
                                                            <a href="{{ route('admin.tenants.create') }}" id="addRow"
                                                                class="btn btn-info">
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
                                                                    <td>Ksh. 3000</td>
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
                                                                        <a href="{{ route('admin.tenants.delete', $tenant->id) }}"
                                                                            class="btn btn-danger btn-xs">
                                                                            <i class="fa fa-trash-o "></i>
                                                                        </a>
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
                                                                        <div class="modal fade"
                                                                            id="sendReminderNotification{{ $tenant->id }}"
                                                                            tabindex="-1"
                                                                            aria-labelledby="exampleModalLabel"
                                                                            aria-hidden="true">
                                                                            <div
                                                                                class="modal-dialog modal-dialog-centered">
                                                                                <div class="modal-content">
                                                                                    <form
                                                                                        action="{{ route('admin.tenants.sendReminder') }}"
                                                                                        method="post">
                                                                                        @csrf
                                                                                        <input type="hidden"
                                                                                            name="tenant_id"
                                                                                            value="{{ $tenant->id }}">
                                                                                        <div class="modal-body">
                                                                                            <div aria-labelledby="swal2-title"
                                                                                                aria-describedby="swal2-content"
                                                                                                class="swal2-popup swal2-modal swal2-show"
                                                                                                tabindex="-1" role="dialog"
                                                                                                aria-live="assertive"
                                                                                                aria-modal="true"
                                                                                                style="display: flex;">
                                                                                                <div
                                                                                                    class="swal2-header">
                                                                                                    <ul class="swal2-progress-steps"
                                                                                                        style="display: none;">
                                                                                                    </ul>
                                                                                                    <div class="swal2-icon swal2-error"
                                                                                                        style="display: none;">
                                                                                                    </div>
                                                                                                    <div class="swal2-icon swal2-question"
                                                                                                        style="display: none;">
                                                                                                    </div>
                                                                                                    <div class="swal2-icon swal2-warning"
                                                                                                        style="display: none;">
                                                                                                    </div>
                                                                                                    <div class="swal2-icon swal2-info"
                                                                                                        style="display: none;">
                                                                                                    </div>
                                                                                                    <div class="swal2-icon swal2-success"
                                                                                                        style="display: none;">
                                                                                                    </div><img
                                                                                                        class="swal2-image"
                                                                                                        style="display: none;">
                                                                                                    <h2 class="swal2-title"
                                                                                                        id="swal2-title"
                                                                                                        style="display: none;">
                                                                                                    </h2><button
                                                                                                        type="button"
                                                                                                        class="swal2-close"
                                                                                                        aria-label="Close this dialog"
                                                                                                        style="display: none;">×</button>
                                                                                                </div>
                                                                                                <div
                                                                                                    class="swal2-content">
                                                                                                    <div id="swal2-content"
                                                                                                        class="swal2-html-container"
                                                                                                        style="display: block;">
                                                                                                        <div
                                                                                                            class="card-head">
                                                                                                            <small
                                                                                                                class="text-uppercase">
                                                                                                                <i
                                                                                                                    class="fa fa-bell"></i>
                                                                                                                &nbsp;
                                                                                                                &nbsp;Send
                                                                                                                Reminders</small>
                                                                                                        </div>
                                                                                                        <div
                                                                                                            class="row">
                                                                                                            <div
                                                                                                                class="col-lg-12 p-t-20">
                                                                                                                <div class="mdl-textfield mdl-js-textfield txt-full-width is-upgraded is-dirty"
                                                                                                                    data-upgraded="MaterialTextfield">
                                                                                                                    <textarea
                                                                                                                        name="message"
                                                                                                                        class="mdl-textfield__input"
                                                                                                                        rows="4"
                                                                                                                        id="msg-input"
                                                                                                                        style="outline: none !important;"
                                                                                                                        placeholder="Compose Message:"
                                                                                                                        spellcheck="false">Hi {{ $tenant->name }}, your rent is now overdue, please make payments to avoid being disconnected.  </textarea>
                                                                                                                    <label
                                                                                                                        class="mdl-textfield__label text-info"
                                                                                                                        for="msg-input">Compose
                                                                                                                        Message:</label>
                                                                                                                    <small
                                                                                                                        class="float-left">
                                                                                                                        SMS:
                                                                                                                        <a
                                                                                                                            href="{{ $tenant->phone }}">{{ $tenant->phone }}</a>
                                                                                                                        &nbsp;&nbsp;&nbsp;&nbsp;
                                                                                                                        Mail-to:
                                                                                                                        <a
                                                                                                                            href="{{ $tenant->email }}">{{ $tenant->email }}</a>
                                                                                                                    </small>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div><input
                                                                                                        class="swal2-input"
                                                                                                        style="display: none;"><input
                                                                                                        type="file"
                                                                                                        class="swal2-file"
                                                                                                        style="display: none;">
                                                                                                    <div class="swal2-range"
                                                                                                        style="display: none;">
                                                                                                        <input
                                                                                                            type="range"><output></output>
                                                                                                    </div><select
                                                                                                        class="swal2-select"
                                                                                                        style="display: none;"></select>
                                                                                                    <div class="swal2-radio"
                                                                                                        style="display: none;">
                                                                                                    </div><label
                                                                                                        for="swal2-checkbox"
                                                                                                        class="swal2-checkbox"
                                                                                                        style="display: none;"><input
                                                                                                            type="checkbox"><span
                                                                                                            class="swal2-label"></span></label><textarea
                                                                                                        class="swal2-textarea"
                                                                                                        style="display: none;"></textarea>
                                                                                                    <div class="swal2-validation-message"
                                                                                                        id="swal2-validation-message">
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div
                                                                                                    class="swal2-actions">
                                                                                                    <button type="submit"
                                                                                                        class="swal2-confirm swal2-styled"
                                                                                                        aria-label="Save Changes"
                                                                                                        style="display: inline-block; background-color: rgb(48, 133, 214); border-left-color: rgb(48, 133, 214); border-right-color: rgb(48, 133, 214);"><i
                                                                                                            class="fa fa-send fa-rotate-90"></i>
                                                                                                        Send message
                                                                                                    </button><button
                                                                                                        type="button"
                                                                                                        class="swal2-cancel swal2-styled"
                                                                                                        aria-label="Cancel"
                                                                                                        onclick="window.location=''"
                                                                                                        style="display: inline-block; background-color: rgb(221, 51, 51);"><i
                                                                                                            class="fa fa-times-circle"></i>
                                                                                                        Cancel</button>
                                                                                                </div>
                                                                                                <div class="swal2-footer"
                                                                                                    style="display: none;">
                                                                                                </div>
                                                                                                <div
                                                                                                    class="swal2-timer-progress-bar-container">
                                                                                                    <div class="swal2-timer-progress-bar"
                                                                                                        style="display: none;">
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </form>
                                                                                </div>
                                                                            </div>
                                                                        </div>
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

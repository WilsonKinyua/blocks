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
                                                                        <div class="modal fade"
                                                                            id="sendReminderNotification{{ $tenant->id }}"
                                                                            tabindex="-1"
                                                                            aria-labelledby="exampleModalLabel"
                                                                            aria-hidden="true">
                                                                            <div class="modal-dialog modal-dialog-centered">
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
                                                                                                <div class="swal2-header">
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
                                                                                                <div class="swal2-content">
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
                                                                                                <div class="swal2-actions">
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

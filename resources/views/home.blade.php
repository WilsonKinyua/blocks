@extends('layouts.admin')
<style>
    .text-dark a {
        color: rgb(0, 0, 0);
    }

</style>
@section('content')
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="page-bar">
                <div class="page-title-breadcrumb">
                    <div class=" pull-left">
                        <div class="page-title">Dashboard</div>
                    </div>
                </div>
            </div>
            <!-- start widget -->
            <div class="row">
                <div class="col-xl-5">
                    <div class="w-100">
                        <div class="row text-dark">
                            <div class="col-sm-6">
                                <a href="{{ route('admin.properties.index') }}">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col mt-0">
                                                    <h4 class="info-box-title">My Properties</h4>
                                                </div>
                                                <div class="col-auto">
                                                    <div class="l-bg-green info-icon">
                                                        <i class="fa fa-home pull-left col-gray font-30"></i>
                                                        <!-- <i class="fas fa-hospital-user "></i> -->
                                                    </div>
                                                </div>
                                            </div>
                                            <h1 class="mt-1 mb-3 info-box-title">{{ $properties }}</h1>
                                            <div class="mb-0">
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <a href="">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col mt-0">
                                                    <h4 class="info-box-title">Vacant Units</h4>
                                                </div>
                                                <div class="col-auto">
                                                    <div class="col-purple info-icon">
                                                        <i class="fa fa-building-o pull-left card-icon font-30"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <h1 class="mt-1 mb-3 info-box-title">{{ $units }}</h1>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-sm-6">
                                <a href="{{ route('admin.tenants.index') }}">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col mt-0">
                                                    <h4 class="info-box-title">All Tenants</h4>
                                                </div>
                                                <div class="col-auto">
                                                    <div class="col-teal info-icon">
                                                        <i class="fa fa-users pull-left card-icon font-30"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <h1 class="mt-1 mb-3 info-box-title">{{ count($tenants) }}</h1>
                                        </div>
                                    </div>
                                </a>
                                <a href="">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col mt-0">
                                                    <h4 class="info-box-title">Overdue</h4>
                                                </div>
                                                <div class="col-auto">
                                                    <div class="col-pink info-icon">
                                                        <i class="fa fa-calendar pull-left card-icon font-30"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <h1 class="mt-1 mb-3 info-box-title">Ksh
                                                {{ number_format($tenants->sum('rent') - $tenants_payments->sum('amount_paid')) }}
                                            </h1>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Activity feed start -->
                <div class="col-xl-7 ">
                    <div class="card-box">
                        <div class="card-head">
                            <header>Update Center</header>

                        </div>
                        <div class="card-body ">
                            <ul class="feedBody">
                                <li class="active-feed">
                                    <div class="feed-user-img">
                                        <img src="{{ asset('img/blocks-logo.png') }}" class="img-radius "
                                            alt="User-Profile-Image">
                                    </div>
                                    <h6>
                                        <span class="feedLblStyle lblFileStyle">Blocks </span> - 2022-01-25 09:18:09 <small
                                            class="text-muted"> 6 hours ago</small>
                                    </h6>
                                    <p class="m-b-15 m-t-15">
                                        Welcome to blocks, your record management made easy!
                                    </p>
                                </li>

                            </ul>
                            <p> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                If you experience any challanges, please feel free to chat with us.
                                <a href="tel:+254798272066">+(254) 798-272-066</a>
                            </p>
                            <hr>
                            <div class="row">
                                <div class="col-md-4 col-sm-4 text-center">
                                    <a href="tel:+254798272066" class="col-green"><i class="fa fa-phone"
                                            style="font-size: 25px;"></i> </a>
                                    <small class='text-muted' style='margin-top:-30px;'></small>
                                </div>
                                <div class="col-md-4 col-sm-4 text-center">
                                    <a target="_blank"
                                        href="https://api.whatsapp.com/send/?phone=254757644414&text=Hi+Blocks"
                                        class="text-success"><i class="fa  fa-whatsapp " style="font-size: 25px;"></i></a>
                                </div>
                                <div class="col-md-4 col-sm-4 text-center">
                                    <a target="_blank" href="https://www.instagram.com/brancetech/"
                                        class="text-danger"><i class="fa fa-instagram " style="font-size: 25px;"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Activity feed end -->
            </div>
            <!-- end widget -->

            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-topline-gray">
                                <div class="card-head">
                                    <header>RENT COLLECTION</header>
                                    <div class="tools">
                                        <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
                                        <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
                                        <a class="t-close btn-color fa fa-times" href="javascript:;"></a>
                                    </div>
                                </div>
                                <div class="card-body ">
                                    <div class="table-responsive">
                                        <table
                                            class="table table-striped table-bordered table-hover table-checkable order-column valign-middle"
                                            id="example4">
                                            <thead>
                                                <tr class="text-uppercase">
                                                    <th> #</th>
                                                    <th> TENANT</th>
                                                    <th>PLOT NAME.</th>
                                                    <th>HOUSE NO.</th>
                                                    <th>Paid </th>
                                                    <th>Balance </th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($tenants as $tenant)
                                                    <tr class="odd gradeX text-capitalize">
                                                        <td>
                                                            {{ $loop->index + 1 }}
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
                                                        <td>Ksh. {{ $tenant->payments->sum('amount_paid') }}
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
                                                        <td>
                                                            @if ($tenant->payments->sum('amount_paid') >= $tenant->rent)
                                                                <span class="label label-sm label-success">
                                                                    fully paid
                                                                </span>
                                                            @elseif ($tenant->payments->sum('amount_paid') === 0)
                                                                <span class="label label-sm label-danger">NOW
                                                                    OVERDUE</span>
                                                            @elseif($tenant->payments->sum('amount_paid') < $tenant->rent)
                                                                <span class="label label-sm label-warning">
                                                                    PARTIALLY paid
                                                                </span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <a href="{{ route('admin.tenants.record.payment', $tenant->id) }}"
                                                                class="btn btn-default btn-xs">
                                                                <i class="fa fa-bookmark-o"></i>Record Payment
                                                            </a>
                                                            <a data-bs-toggle="modal"
                                                                data-bs-target="#sendReminderNotification{{ $tenant->id }}"
                                                                class="btn btn-primary btn-xs reminder-btn">
                                                                <i class="fa fa-bell "></i> Send Reminder
                                                            </a>
                                                            {{-- send tenant notification --}}
                                                            <div class="modal fade"
                                                                id="sendReminderNotification{{ $tenant->id }}"
                                                                tabindex="-1" aria-labelledby="exampleModalLabel"
                                                                aria-hidden="true">
                                                                <div class="modal-dialog modal-dialog-centered">
                                                                    <div class="modal-content">
                                                                        <form
                                                                            action="{{ route('admin.tenants.sendReminder') }}"
                                                                            method="post">
                                                                            @csrf
                                                                            <input type="hidden" name="tenant_id"
                                                                                value="{{ $tenant->id }}">
                                                                            <div class="modal-body">
                                                                                <div aria-labelledby="swal2-title"
                                                                                    aria-describedby="swal2-content"
                                                                                    class="swal2-popup swal2-modal swal2-show"
                                                                                    tabindex="-1" role="dialog"
                                                                                    aria-live="assertive" aria-modal="true"
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
                                                                                        </div><img class="swal2-image"
                                                                                            style="display: none;">
                                                                                        <h2 class="swal2-title"
                                                                                            id="swal2-title"
                                                                                            style="display: none;">
                                                                                        </h2><button type="button"
                                                                                            class="swal2-close"
                                                                                            aria-label="Close this dialog"
                                                                                            style="display: none;">×</button>
                                                                                    </div>
                                                                                    <div class="swal2-content">
                                                                                        <div id="swal2-content"
                                                                                            class="swal2-html-container"
                                                                                            style="display: block;">
                                                                                            <div class="card-head">
                                                                                                <small
                                                                                                    class="text-uppercase">
                                                                                                    <i
                                                                                                        class="fa fa-bell"></i>
                                                                                                    &nbsp;
                                                                                                    &nbsp;Send
                                                                                                    Reminders</small>
                                                                                            </div>
                                                                                            <div class="row">
                                                                                                <div
                                                                                                    class="col-lg-12 p-t-20">
                                                                                                    <div class="mdl-textfield mdl-js-textfield txt-full-width is-upgraded is-dirty"
                                                                                                        data-upgraded="MaterialTextfield">
                                                                                                        <blade
                                                                                                            ___html_tags_0___ />
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
                                                                                        </div><input class="swal2-input"
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
                                                                                        </div><label for="swal2-checkbox"
                                                                                            class="swal2-checkbox"
                                                                                            style="display: none;"><input
                                                                                                type="checkbox"><span
                                                                                                class="swal2-label"></span></label>
                                                                                        <textarea class="swal2-textarea" style="display: none;"></textarea>
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
                                                                                        </button><button type="button"
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
@endsection

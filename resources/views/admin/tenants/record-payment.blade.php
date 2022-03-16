@extends('layouts.admin')
@section('content')
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="page-bar">
                <div class="page-title-breadcrumb">
                    <div class=" pull-left">
                        <div class="page-title"><i class="fa fa-bookmark"></i> Record Payment</div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="card-box">
                        <div class="card-head">
                            <header>Tenant Information</header>
                        </div>
                        <form action="{{ route('admin.tenant-payments.storePayment') }}" method="post">
                            @csrf
                            <input type="hidden" name="tenant_id" value="{{ $tenant->id }}">
                            <input type="hidden" name="property_id" value="{{ $tenant->property_id }}">
                            <input type="hidden" name="business_id" value="{{ $tenant->business_id }}">
                            <input type="hidden" name="unit_id" value="{{ $tenant->unit_id }}">
                            <div class="card-body row">
                                <div class="col-lg-6 p-t-20">
                                    <div
                                        class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                        <input class="mdl-textfield__input tenant" type="text" id="24" name="tenant"
                                            value="{{ $tenant->name ?? '' }}" readonly>
                                        <label class="mdl-textfield__label"><i class="fa fa-user"></i> Tenat
                                            Name:</label>
                                    </div>
                                </div>
                                <div class="col-lg-6 p-t-20">
                                    <div
                                        class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                        <input class="mdl-textfield__input" type="number" id="amount" name="amount_paid"
                                            value="{{ $tenant->rent ?? '00' }}" required>
                                        <label class="mdl-textfield__label"><i class="fa fa-dollar"></i> Amount
                                            Paid:</label>
                                    </div>
                                </div>

                                <div class="col-lg-4 p-t-20">
                                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                        <input class="mdl-textfield__input prop" type="text" id="13" name="property"
                                            value="{{ $tenant->apartment->name ?? '' }}" readonly>
                                        <label class="mdl-textfield__label"><i class="fa fa-building-o"></i> Apartment
                                            (Plot)</label>
                                    </div>
                                </div>
                                <div class="col-lg-4 p-t-20">
                                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                        <input class="mdl-textfield__input" type="text" id="unit" name="unit"
                                            value="{{ $tenant->house->name }}" readonly>
                                        <label class="mdl-textfield__label"><i class="fa fa-home"></i> Unit No. (Room
                                            No.)</label>
                                    </div>
                                </div>

                                <div class="col-lg-4 p-t-20 ">
                                    <div
                                        class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                        <input class="mdl-textfield__input" type="text" id="date" name="payment_date"
                                            required>
                                        <label class="mdl-textfield__label"> <i class="fa fa-calendar"></i> Payment Date:
                                        </label>
                                    </div>
                                </div>

                                <div class="col-lg-6 p-t-20">
                                    <div class="form-group">
                                        <label>Payment Method: <span class="text-danger">*</span></label>
                                        <select class="mdl-textfield__input" name="payment_method" id="payment_method"
                                            required>
                                            <option value="cash" id="cash">Cash</option>
                                            <option value="mpesa" id="mpesa">Mpesa</option>
                                            <option value="bank" id="bank">Bank</option>
                                            <option value="other" id="other">Other</option>
                                        </select>
                                    </div>
                                </div>

                                <style>
                                    #mpesa_div,
                                    #cheque_div {
                                        display: none
                                    }

                                </style>

                                <div class="col-lg-6 p-t-20">
                                    <div id="mpesa_div"
                                        class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                        <input class="mdl-textfield__input tenant" type="text" id="mpesa_code"
                                            name="mpesa_code">
                                        <label class="mdl-textfield__label"><i class="fa fa-pencil"></i> Mpesa
                                            Code:</label>
                                    </div>
                                    <div id="cheque_div"
                                        class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                        <input class="mdl-textfield__input tenant" type="text" id="bank_receipt_number"
                                            name="bank_receipt_number">
                                        <label class="mdl-textfield__label"><i class="fa fa-pencil"></i> Cheque
                                            Number:</label>
                                    </div>
                                </div>

                                <div class="col-lg-12 p-t-20 text-center pull-right" style='margin-top:100px;'>
                                    <a href='{{ route('admin.tenants.index') }}' type="button"
                                        class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-default btn-block">Cancel</a>

                                    <button type="submit"
                                        class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-primary">Record
                                        Payment
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card box">
                        <div class="card-head">
                            <header> </header>
                        </div>
                        <div class="card-body print_section" id="bar-parent">
                            <div class="white-box" style='margin-top:0; padding:0;'>
                                <h3 class=''><b>RECEIPT </b> <span
                                        class="pull-right text-capitalize">#IN-<?php echo rand(1, 10000); ?></span></h3>
                                <hr>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="pull-left">
                                            <address>
                                                @if ($business->logo)
                                                    <img src="{{ $business->logo->getUrl() }}" height=110 alt="logo"
                                                        class="logo-default" id='bs-logo' style="border-radius: 51%;">
                                                @else
                                                    <img src="{{ asset('img/avatar.jpeg') }}" height=110 alt="logo"
                                                        class="logo-default" id='bs-logo' style="border-radius: 51%;">
                                                @endif
                                                <p class="text-muted m-l-5 text-capitalize">
                                                    {{ $business->name ?? '' }},
                                                    <br>{{ $business->location ?? '' }}
                                                    <br>{{ $business->email ?? '' }} <br>Tel:
                                                    {{ $business->phone ?? '' }}
                                                </p>
                                            </address>
                                        </div>
                                        <div class="pull-right text-right text-capitalize">
                                            <address>
                                                <p class="addr-font-h3">To,</p>
                                                <p class="font-bold addr-font-h4 tenant_name">{{ $tenant->name ?? '' }}
                                                </p>
                                                <p class="text-muted m-l-30 apartment_info ">
                                                    {{ $tenant->house->name ?? '' }},
                                                    {{ $tenant->apartment->name ?? '' }} </p>
                                                <p class="m-t-30">
                                                    <i class="fa fa-calendar"></i> &nbsp; <?php echo date('Y-m-d'); ?>
                                                </p>
                                            </address>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="table-responsive m-t-40">
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center">#</th>
                                                        <th class="text-right">Description</th>
                                                        <th class="text-right">Reference No</th>
                                                        <th class="text-right">Payment Date</th>
                                                        <th class="text-right">Amount Paid</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if (count($payments) > 0)
                                                        @foreach ($payments as $payment)
                                                            <tr class="text-capitalize">
                                                                <td class="text-center">
                                                                    <?php echo $loop->iteration; ?>
                                                                </td>
                                                                <td class="text-right">
                                                                    {{ date('F', mktime(0, 0, 0, date('m', strtotime($payment->payment_date)), 10)) }}
                                                                    {{ date('Y', strtotime($payment->payment_date)) }}
                                                                    Rent Payment
                                                                </td>
                                                                <td class="text-right text-uppercase">
                                                                    @if ($payment->payment_method == 'cash')
                                                                        <span>{{ $payment->cash_receipt_number ?? '' }}
                                                                            <sup class="badge badge-info">Cash</sup></span>
                                                                    @elseif ($payment->payment_method == 'mpesa')
                                                                        <span>{{ $payment->mpesa_code ?? '' }} <sup
                                                                                class="badge badge-info">Mpesa</sup></span>
                                                                    @elseif ($payment->payment_method == 'bank')
                                                                        <span>{{ $payment->bank_receipt_number ?? '' }}
                                                                            <sup class="badge badge-info">Bank</sup></span>
                                                                    @else
                                                                        <span>{{ $payment->other_payment_description ?? '' }}
                                                                            <sup class="badge badge-info">Other</sup></span>
                                                                    @endif
                                                                </td>
                                                                <td class="text-right">
                                                                    <?php echo date('Y-m-d', strtotime($payment->payment_date)); ?>
                                                                </td>
                                                                <td class="text-right">Ksh.
                                                                    <?php echo number_format($payment->amount_paid, 0); ?>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    @else
                                                        <tr class="text-capitalize text-center">
                                                            <td colspan="5">Current Year records not available</td>
                                                        </tr>
                                                    @endif
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="pull-right text-right">
                                            <p>
                                                {{-- @if ($amount_paid_this_month >= $tenant->rent)
                                                    Prepaid:
                                                    <span class="text-success" style="font-weight: 900">
                                                        Ksh.
                                                        {{ number_format($amount_paid_this_month - $tenant->rent) }}
                                                    </span>
                                                @else
                                                    Rent Balance:
                                                    <span class="text-danger">
                                                        Ksh.
                                                        {{ number_format($tenant->rent - $amount_paid_this_month) }}
                                                    </span>
                                                @endif --}}
                                                @if ($tenant->rent - $amount_paid_this_month > 0)
                                                    Rent Balance<small>(This Month):</small>
                                                    <span class="text-danger">
                                                        Ksh.
                                                        {{ number_format($tenant->rent - $amount_paid_this_month) }}
                                                    </span>
                                                @endif
                                            </p>
                                            <hr>
                                            <h4><b>Total Paid :</b> Ksh.
                                                {{ number_format($payments->sum('amount_paid')) }}</h4>
                                        </div>
                                        <div class="clearfix"></div>
                                        <hr>
                                        <div class="text-right pull-right">
                                            <a id="mail_btn" class="btn btn-danger"
                                                href="{{ route('admin.tenants.send.invoice', $tenant->id) }}"> <i
                                                    class="fa fa-envelope-o"></i> Send Via Mail</a>
                                            <a href="{{ route('admin.tenants.print.invoice', $tenant->id) }}"
                                                class="btn btn-default btn-outline" type="button">
                                                <span> <i class="fa fa-print"></i> Print Reciept</span>
                                            </a>
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
@section('js')
    <script>
        $(document).ready(function() {
            $('#payment_method').on('change', function() {
                var method = $(this).val();
                if (method == 'mpesa') {
                    $('#mpesa_div').show();
                    $('#cheque_div').hide();
                } else if (method == 'bank') {
                    $('#mpesa_div').hide();
                    $('#cheque_div').show();
                } else {
                    $('#mpesa_div').hide();
                    $('#cheque_div').hide();
                }
            });
        });
    </script>
@endsection

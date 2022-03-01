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

                                <div class="col-lg-6 p-t-20">
                                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                        <input class="mdl-textfield__input prop" type="text" id="13" name="property"
                                            value="{{ $tenant->apartment->name ?? '' }}" readonly>
                                        <label class="mdl-textfield__label"><i class="fa fa-building-o"></i> Apartment
                                            (Plot)</label>
                                    </div>
                                </div>
                                <div class="col-lg-6 p-t-20">
                                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                        <input class="mdl-textfield__input" type="text" id="unit" name="unit"
                                            value="{{ $tenant->house->name }}" readonly>
                                        <label class="mdl-textfield__label"><i class="fa fa-home"></i> Unit No. (Room
                                            No.)</label>
                                    </div>
                                </div>

                                <div class="col-lg-6 p-t-20">
                                    <div class="form-group">
                                        <label>Payment Method: <span class="text-danger">*</span></label>
                                        <select class="mdl-textfield__input" name="payment_method" id="payment_method"
                                            required>
                                            <option value="cash">Cash</option>
                                            <option value="mpesa">Mpesa</option>
                                            <option value="bank">Bank</option>
                                            <option value="other">Other</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 p-t-20 ">
                                    <div
                                        class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                        <input class="mdl-textfield__input" type="text" id="date" name="payment_date"
                                            required>
                                        <label class="mdl-textfield__label"> <i class="fa fa-calendar"></i> Payment Date:
                                        </label>
                                    </div>
                                </div>

                                <div class="col-lg-12 p-t-20 text-center pull-right" style='margin-top:100px;'>
                                    <a href='{{ route('admin.tenants.index') }}' type="button"
                                        class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-default btn-block">Cancel</a>

                                    <button type="submit"
                                        class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-primary"
                                        id='record_pay'>Record Payment
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
                                                        <th class="text-right">Date</th>
                                                        <th class="text-right">Reference No.</th>
                                                        <th class="text-right">Amount</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($payments as $payment)
                                                        <tr class="text-capitalize">
                                                            <td class="text-center">
                                                                <?php echo $loop->iteration; ?>
                                                            </td>
                                                            <td class="text-right">{{ $payment->payment_method }}
                                                                payment</td>
                                                            <td class="text-right">
                                                                <?php echo date('Y-m-d', strtotime($payment->payment_date)); ?>
                                                            </td>
                                                            <td class="text-right">
                                                                {{ $payment->payment_reference ?? '' }}
                                                            </td>
                                                            <td class="text-right">Ksh.
                                                                <?php echo number_format($payment->amount_paid, 0); ?>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="pull-right text-right">
                                            <p>Rent Balance &nbsp;&nbsp; : Ksh. 2,000 </p>
                                            <hr>
                                            <h4><b>Total Paid :</b> Ksh. 10,000</h4>
                                        </div>
                                        <div class="clearfix"></div>
                                        <hr>
                                        <div class="text-right pull-right">
                                            <a id="mail_btn" class="btn btn-danger"
                                                href="{{ route('admin.tenants.send.invoice', $tenant->id) }}"> <i
                                                    class="fa fa-envelope-o"></i> Send Via Mail</a>
                                            <a href="{{ route('admin.tenants.print.invoice',$tenant->id)}}" class="btn btn-default btn-outline"
                                                type="button">
                                                <span> <i class="fa fa-print"></i> Print Reciept</span>
                                            </a>
                                            {{-- onclick="window.print()" --}}
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

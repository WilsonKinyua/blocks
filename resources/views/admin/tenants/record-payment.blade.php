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
                        <form action="" method="post">
                            @csrf
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
                                        <input class="mdl-textfield__input" type="number" id="amount" name="amount"
                                            value="{{ $tenant->rent ?? '00' }}">
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
                                        <input class="mdl-textfield__input" type="text" id="date" name="payment_date">
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
                                <h3 class=''><b>RECEIPT </b> <span class="pull-right">#IN-</span></h3>
                                <hr>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="pull-left">
                                            <address>
                                                <img src="assets/img/files/8ae26d52be75a7f61869f46a932454f0.png" height=110
                                                    alt="logo" class="logo-default" id='bs-logo'
                                                    style="border-radius: 51%;" />
                                                <p class="text-muted m-l-5">
                                                    Next Block Africa Ltd,
                                                    <br>Nyali, Mombasa -Kenya
                                                    <br>hello@mail.com <br>Tel: 0789456123
                                                </p>
                                            </address>
                                        </div>
                                        <div class="pull-right text-right">
                                            <address>
                                                <p class="addr-font-h3">To,</p>
                                                <p class="font-bold addr-font-h4 tenant_name">Wilson Ke</p>
                                                <p class="text-muted m-l-30 apartment_info">
                                                    Tenant F103, Keja Yetu </p>
                                                <p class="m-t-30">
                                                    <i class="fa fa-calendar"></i> &nbsp; February 28, 2022
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
                                                    <tr>
                                                        <td class="text-center">1</td>
                                                        <td class="text-right">Cash payment</td>
                                                        <td class="text-right">22-02-2022</td>
                                                        <td class="text-right">#Ref:020029</td>
                                                        <td class="text-right">Ksh. 1,000</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center">2</td>
                                                        <td class="text-right">Cash payment</td>
                                                        <td class="text-right">17-02-2022</td>
                                                        <td class="text-right">#Ref:020025</td>
                                                        <td class="text-right">Ksh. 9,000</td>
                                                    </tr>

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
                                            <button id="mail_btn" class="btn btn-danger" type="submit"> <i
                                                    class="fa fa-envelope-o"></i> Send Via Mail</button>
                                            <a href="print_receipt.php?id=24" class="btn btn-default btn-outline"
                                                type="button">
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

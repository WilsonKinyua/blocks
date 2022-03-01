<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Invoice Tenant</title>
    <!-- google font -->
    <link href="{{ asset('google-fonts/css6079.css?family=Poppins:300,400,500,600,700') }}" rel="stylesheet"
        type="text/css" />
    <!-- icons -->
    <link href="{{ asset('fonts/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
    <!--bootstrap -->
    <link href="{{ asset('plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Styles -->
    <link href="{{ asset('css/theme/full/theme_style.css') }}" rel="stylesheet" id="rt_style_components"
        type="text/css" />
    <link href="{{ asset('css/theme/full/style.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/responsive.css') }}" rel="stylesheet" type="text/css" />


</head>
<!-- END HEAD -->

<body
    class="page-header-fixed sidemenu-closed-hidelogo page-content-white page-md page-full-width header-white white-sidebar-color logo-white">
    <div class="page-wrapper">
        <!-- start page container -->
        <div class="mt-3">
            <div class="page-content-wrapper">
                <div class="page-content">
                    <div class="row">
                        <div class="col-md-3"></div>
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
                                                            <img src="{{ $business->logo->getUrl() }}" height=110
                                                                alt="{{ $business->name ?? '' }}" class="logo-default" id='bs-logo'
                                                                style="border-radius: 51%;">
                                                        @else
                                                            <img src="{{ asset('img/avatar.jpeg') }}" height=110
                                                                alt="{{ $business->name ?? '' }}" class="logo-default" id='bs-logo'
                                                                style="border-radius: 51%;">
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
                                                        <p class="font-bold addr-font-h4 tenant_name">
                                                            {{ $tenant->name ?? '' }}
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
                                                                    <td class="text-right">
                                                                        {{ $payment->payment_method }}
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
</body>

</html>

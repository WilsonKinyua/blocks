@extends('layouts.admin')
@section('content')
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="page-bar">
                <div class="page-title-breadcrumb">
                    <div class=" pull-left">
                        <div class="page-title"> <i class="material-icons">alarm</i> OVERDUE PAYMENTS</div>
                    </div>

                    <form class="search-form-opened pull-right" action="#" method="GET">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search..." name="query">
                            <span class="input-group-btn">
                                <a href="javascript:;" class="btn submit">
                                    <i class="icon-magnifier"></i>
                                </a>
                            </span>
                        </div>
                    </form>
                    <ol class="breadcrumb page-breadcrumb pull-right d-none">
                        <li><i class="fa fa-dollar"></i>&nbsp;<a class="parent-item"
                                href="all_records.php">Payments</a>&nbsp;<i class="fa fa-angle-right"></i>
                        </li>
                        <li class="active">Overdue</li>
                    </ol>
                </div>
            </div>
            <!-- start widget -->

            <div class="state-overview">
                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="overview-panel purple">
                            <div class="symbol">
                                <i class="fa fa-users usr-clr"></i>
                            </div>
                            <div class="value white">
                                <p class="sbold addr-font-h1" data-counter="counterup" data-value="10">0</p>
                                <p>UP COMPING</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="overview-panel deepPink-bgcolor">
                            <div class="symbol">
                                <i class="fa fa-heartbeat"></i>
                            </div>
                            <div class="value white">
                                <p class="sbold addr-font-h1" data-counter="counterup" data-value="0">0</p>
                                <p>NOW OVERDUE</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="overview-panel orange">
                            <div class="symbol">
                                <i class="fa fa-heartbeat"></i>
                            </div>
                            <div class="value white">
                                <p class="sbold addr-font-h1" data-counter="counterup" data-value="0">0</p>
                                <p> PATIALLY PAID </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="overview-panel blue-bgcolor">
                            <div class="symbol">
                                <i class="fa fa-money"></i>
                            </div>
                            <div class="value white">
                                <p class="sbold addr-font-h1" data-counter="counterup" data-value="195,000">0</p>

                                <p>SHILLINGS OVERDUE</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end widget -->

            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-topline-gray">
                                <div class="card-head">
                                    <header>RENT PAYMENT RECORDS</header>
                                    <div class="tools">
                                        <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
                                        <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
                                        <a class="t-close btn-color fa fa-times" href="javascript:;"></a>
                                    </div>
                                </div>
                                <div class="card-body ">
                                    <div class="table-responsive">
                                        <table class="table table-striped custom-table table-hover">
                                            <thead>
                                                <tr class="text-uppercase">
                                                    <th>#</th>
                                                    <th> TENANT</th>
                                                    <th>PLOT NO.</th>
                                                    <th>HOUSE NO.</th>
                                                    <th>Rent </th>
                                                    <th>Balance </th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>

                                                <tr
                                                    data-info='{"name":"Tevin Jack","phone":"0743082150","email":"tevin@gmail.com"}'>
                                                    <td>2</td>
                                                    <td>
                                                        <a href="view_tenant.php?id=14"> Tevin Jack </a>
                                                    </td>
                                                    <td class="text-right">HSE-106</td>
                                                    <td class="text-right">G3</td>
                                                    <td class="text-right">Ksh. 12,500</td>
                                                    <td class="text-right">Ksh. 2,000</td>
                                                    <td class="text-right">
                                                        <span class="label label-sm label-warning">PARTIALLY paid
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <a href="record_payment.php?id=14" class="btn btn-default btn-xs">
                                                            <i class="fa fa-bookmark-o"></i> Record Payment
                                                        </a>
                                                        <button class="btn btn-primary btn-xs reminder-btn">
                                                            <i class="fa fa-bell-o"></i> Send Reminder
                                                        </button>
                                                    </td>
                                                </tr>


                                                <tr
                                                    data-info='{"name":"Lilian","phone":"0798214811","email":"lilian@gmail.com"}'>
                                                    <td>3</td>
                                                    <td>
                                                        <a href="view_tenant.php?id=8"> Lilian </a>
                                                    </td>
                                                    <td class="text-right">HSE-106</td>
                                                    <td class="text-right">G3</td>
                                                    <td class="text-right">Ksh. 12,000</td>
                                                    <td class="text-right">Ksh. 12,000</td>
                                                    <td class="text-right">
                                                        <span class="label label-sm label-danger">NOW OVERDUE</span>
                                                    </td>
                                                    <td>
                                                        <a href="record_payment.php?id=8" class="btn btn-default btn-xs">
                                                            <i class="fa fa-bookmark-o"></i> Record Payment
                                                        </a>
                                                        <button class="btn btn-primary btn-xs reminder-btn">
                                                            <i class="fa fa-bell-o"></i> Send Reminder
                                                        </button>
                                                    </td>
                                                </tr>


                                                <tr
                                                    data-info='{"name":"John Paul","phone":"071234567","email":"johnp@gmail.com"}'>
                                                    <td>4</td>
                                                    <td>
                                                        <a href="view_tenant.php?id=5"> John Paul </a>
                                                    </td>
                                                    <td class="text-right">Nyali Apartments</td>
                                                    <td class="text-right">NY-6</td>
                                                    <td class="text-right">Ksh. 27,000</td>
                                                    <td class="text-right">Ksh. 27,000</td>
                                                    <td class="text-right">
                                                        <span class="label label-sm label-danger">NOW OVERDUE</span>
                                                    </td>
                                                    <td>
                                                        <a href="record_payment.php?id=5" class="btn btn-default btn-xs">
                                                            <i class="fa fa-bookmark-o"></i> Record Payment
                                                        </a>
                                                        <button class="btn btn-primary btn-xs reminder-btn">
                                                            <i class="fa fa-bell-o"></i> Send Reminder
                                                        </button>
                                                    </td>
                                                </tr>


                                                <tr
                                                    data-info='{"name":"Man Paul","phone":"0757644414","email":"bair@brancetech.com"}'>
                                                    <td>5</td>
                                                    <td>
                                                        <a href="view_tenant.php?id=3"> Man Paul </a>
                                                    </td>
                                                    <td class="text-right">Nyali Apartments</td>
                                                    <td class="text-right">NY-2</td>
                                                    <td class="text-right">Ksh. 45,000</td>
                                                    <td class="text-right">Ksh. 45,000</td>
                                                    <td class="text-right">
                                                        <span class="label label-sm label-danger">NOW OVERDUE</span>
                                                    </td>
                                                    <td>
                                                        <a href="record_payment.php?id=3" class="btn btn-default btn-xs">
                                                            <i class="fa fa-bookmark-o"></i> Record Payment
                                                        </a>
                                                        <button class="btn btn-primary btn-xs reminder-btn">
                                                            <i class="fa fa-bell-o"></i> Send Reminder
                                                        </button>
                                                    </td>
                                                </tr>


                                                <tr
                                                    data-info='{"name":"Solomon Solomon","phone":"0707064650","email":"solomon@blocks.com"}'>
                                                    <td>6</td>
                                                    <td>
                                                        <a href="view_tenant.php?id=15"> Solomon Solomon </a>
                                                    </td>
                                                    <td class="text-right">Kisimani Heights</td>
                                                    <td class="text-right">K-005</td>
                                                    <td class="text-right">Ksh. 23,000</td>
                                                    <td class="text-right">Ksh. 23,000</td>
                                                    <td class="text-right">
                                                        <span class="label label-sm label-danger">NOW OVERDUE</span>
                                                    </td>
                                                    <td>
                                                        <a href="record_payment.php?id=15" class="btn btn-default btn-xs">
                                                            <i class="fa fa-bookmark-o"></i> Record Payment
                                                        </a>
                                                        <button class="btn btn-primary btn-xs reminder-btn">
                                                            <i class="fa fa-bell-o"></i> Send Reminder
                                                        </button>
                                                    </td>
                                                </tr>


                                                <tr
                                                    data-info='{"name":"LYDIAH demo","phone":"0722504028","email":"test@gmail.com"}'>
                                                    <td>7</td>
                                                    <td>
                                                        <a href="view_tenant.php?id=7"> LYDIAH demo </a>
                                                    </td>
                                                    <td class="text-right">Kisimani Heights</td>
                                                    <td class="text-right">K-004</td>
                                                    <td class="text-right">Ksh. 25,000</td>
                                                    <td class="text-right">Ksh. 25,000</td>
                                                    <td class="text-right">
                                                        <span class="label label-sm label-danger">NOW OVERDUE</span>
                                                    </td>
                                                    <td>
                                                        <a href="record_payment.php?id=7" class="btn btn-default btn-xs">
                                                            <i class="fa fa-bookmark-o"></i> Record Payment
                                                        </a>
                                                        <button class="btn btn-primary btn-xs reminder-btn">
                                                            <i class="fa fa-bell-o"></i> Send Reminder
                                                        </button>
                                                    </td>
                                                </tr>


                                                <tr
                                                    data-info='{"name":"Julia Lizzy","phone":"072345670","email":"julia@test.com"}'>
                                                    <td>8</td>
                                                    <td>
                                                        <a href="view_tenant.php?id=6"> Julia Lizzy </a>
                                                    </td>
                                                    <td class="text-right">Kisimani Heights</td>
                                                    <td class="text-right">K-005</td>
                                                    <td class="text-right">Ksh. 15,000</td>
                                                    <td class="text-right">Ksh. 15,000</td>
                                                    <td class="text-right">
                                                        <span class="label label-sm label-danger">NOW OVERDUE</span>
                                                    </td>
                                                    <td>
                                                        <a href="record_payment.php?id=6" class="btn btn-default btn-xs">
                                                            <i class="fa fa-bookmark-o"></i> Record Payment
                                                        </a>
                                                        <button class="btn btn-primary btn-xs reminder-btn">
                                                            <i class="fa fa-bell-o"></i> Send Reminder
                                                        </button>
                                                    </td>
                                                </tr>


                                                <tr
                                                    data-info='{"name":"Collins Becky ","phone":"0796770664","email":"becky@brancetech.com"}'>
                                                    <td>9</td>
                                                    <td>
                                                        <a href="view_tenant.php?id=2"> Collins Becky </a>
                                                    </td>
                                                    <td class="text-right">White House</td>
                                                    <td class="text-right">G-003</td>
                                                    <td class="text-right">Ksh. 10,000</td>
                                                    <td class="text-right">Ksh. 7,000</td>
                                                    <td class="text-right">
                                                        <span class="label label-sm label-warning">PARTIALLY paid
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <a href="record_payment.php?id=2" class="btn btn-default btn-xs">
                                                            <i class="fa fa-bookmark-o"></i> Record Payment
                                                        </a>
                                                        <button class="btn btn-primary btn-xs reminder-btn">
                                                            <i class="fa fa-bell-o"></i> Send Reminder
                                                        </button>
                                                    </td>
                                                </tr>


                                                <tr
                                                    data-info='{"name":"Patrick","phone":"0798272066","email":"patrick@gmail.com"}'>
                                                    <td>10</td>
                                                    <td>
                                                        <a href="view_tenant.php?id=1"> Patrick </a>
                                                    </td>
                                                    <td class="text-right">White House</td>
                                                    <td class="text-right">G-003</td>
                                                    <td class="text-right">Ksh. 13,500</td>
                                                    <td class="text-right">Ksh. 1,000</td>
                                                    <td class="text-right">
                                                        <span class="label label-sm label-warning">PARTIALLY paid
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <a href="record_payment.php?id=1" class="btn btn-default btn-xs">
                                                            <i class="fa fa-bookmark-o"></i> Record Payment
                                                        </a>
                                                        <button class="btn btn-primary btn-xs reminder-btn">
                                                            <i class="fa fa-bell-o"></i> Send Reminder
                                                        </button>
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
@endsection

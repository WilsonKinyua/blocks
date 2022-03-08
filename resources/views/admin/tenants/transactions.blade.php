@extends('layouts.admin')
@section('content')
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="page-bar">
                <div class="page-title-breadcrumb">
                    <div class=" pull-left">
                        <div class="page-title"><i class="material-icons">assignment</i> Transcation History</div>
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
                        <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="./">Home</a>&nbsp;<i
                                class="fa fa-angle-right"></i>
                        </li>
                        <li><a class="parent-item" href="#">Tenants</a>&nbsp;<i class="fa fa-angle-right"></i>
                        </li>
                        <li class="active"> List</li>
                    </ol>
                </div>
            </div>


            <!-- start widget -->

            <div class="state-overview d-none">
                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="overview-panel purple">
                            <div class="symbol">
                                <i class="fa fa-bank usr-clr"></i>
                            </div>
                            <div class="value white">
                                <p class="sbold addr-font-h1" data-counter="counterup" data-value="40,000"></p>
                                <p>RECEIVED PAYMENTS</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="overview-panel deepPink-bgcolor">
                            <div class="symbol">
                                <i class="fa fa-times-circle-o"></i>
                            </div>
                            <div class="value white">
                                <p class="sbold addr-font-h1" data-counter="counterup" data-value="10">0</p>
                                <p>PENDING <small>(UNITS)</small></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="overview-panel bg-success">
                            <div class="symbol">
                                <i class="fa fa-money"></i>
                            </div>
                            <div class="value white">
                                <p class="sbold addr-font-h1" data-counter="counterup" data-value="500">0</p>
                                <p>PAYBILL <small>(KSH)</small></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="overview-panel blue-bgcolor">
                            <div class="symbol">
                                <i class="fa fa-money"></i>
                            </div>
                            <div class="value white">
                                <p class="sbold addr-font-h1" data-counter="counterup" data-value="39,500">0</p>
                                <p>CASH & OTHERS <small>(KSH)</small></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end widget -->

            <div class="row">
                <div class="col-md-12">
                    <div class="tabbable-line">
                        <div class="tab-content">
                            <div class="tab-pane active fontawesome-demo" id="tab1">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card card-box">
                                            <div class="card-head">
                                                <header>All Transcations</header>
                                            </div>
                                            <div class="card-body">
                                                <div class="table-scrollable">
                                                    <table
                                                        class="table table-striped table-bordered table-hover table-checkable order-column valign-middle"
                                                        id="example4">
                                                        <thead>
                                                            <tr class="text-uppercase">
                                                                <th>##</th>
                                                                <th> Date </th>
                                                                <th> Tenant Name </th>
                                                                <th> Apartment </th>
                                                                <th> House No. </th>
                                                                <th> Amount </th>
                                                                <th> Description </th>
                                                                <th> Action </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr class="odd gradeX">
                                                                <td class="">1</td>
                                                                <td class="">06-02-2022</td>
                                                                <td class="left">
                                                                    <a href="view_tenant.php?id=1">Patrick</a>
                                                                </td>
                                                                <td class="left">White House</td>
                                                                <td class="left">G-003</td>
                                                                <td class=''>Ksh. 10,500</td>
                                                                <td>Ksh. Cash payment</td>
                                                                <td>
                                                                    <span class='label label-danger label-mini'>
                                                                        Reversed</span>
                                                                </td>
                                                            </tr>

                                                            <tr class="odd gradeX">
                                                                <td class="">2</td>
                                                                <td class="">06-02-2022</td>
                                                                <td class="left">
                                                                    <a href="view_tenant.php?id=1">Patrick</a>
                                                                </td>
                                                                <td class="left">White House</td>
                                                                <td class="left">G-003</td>
                                                                <td class=''>Ksh. 2,000</td>
                                                                <td>Ksh. Cash payment</td>
                                                                <td>
                                                                    <span class='label label-danger label-mini'>
                                                                        Reversed</span>
                                                                </td>
                                                            </tr>

                                                            <tr class="odd gradeX">
                                                                <td class="">3</td>
                                                                <td class="">08-02-2022</td>
                                                                <td class="left">
                                                                    <a href="view_tenant.php?id=2">Collins Becky </a>
                                                                </td>
                                                                <td class="left">White House</td>
                                                                <td class="left">G-003</td>
                                                                <td class=''>Ksh. 3,000</td>
                                                                <td>Ksh. Cash payment</td>
                                                                <td>
                                                                    <a class='label btn-primary label-mini reverse'
                                                                        id='9'>Delete</a>
                                                                </td>
                                                            </tr>

                                                            <tr class="odd gradeX">
                                                                <td class="">4</td>
                                                                <td class="">11-02-2022</td>
                                                                <td class="left">
                                                                    <a href="view_tenant.php?id=14">Tevin Jack</a>
                                                                </td>
                                                                <td class="left">White House</td>
                                                                <td class="left">G3</td>
                                                                <td class=''>Ksh. 9,000</td>
                                                                <td>Ksh. Cash payment</td>
                                                                <td>
                                                                    <a class='label btn-primary label-mini reverse'
                                                                        id='11'>Delete</a>
                                                                </td>
                                                            </tr>

                                                            <tr class="odd gradeX">
                                                                <td class="">5</td>
                                                                <td class="">11-02-2022</td>
                                                                <td class="left">
                                                                    <a href="view_tenant.php?id=14">Tevin Jack</a>
                                                                </td>
                                                                <td class="left">White House</td>
                                                                <td class="left">G3</td>
                                                                <td class=''>Ksh. 1,000</td>
                                                                <td>Ksh. Cash payment</td>
                                                                <td>
                                                                    <a class='label btn-primary label-mini reverse'
                                                                        id='12'>Delete</a>
                                                                </td>
                                                            </tr>

                                                            <tr class="odd gradeX">
                                                                <td class="">6</td>
                                                                <td class="">17-02-2022</td>
                                                                <td class="left">
                                                                    <a href="view_tenant.php?id=24">Wilson Ke</a>
                                                                </td>
                                                                <td class="left">White House</td>
                                                                <td class="left">F103</td>
                                                                <td class=''>Ksh. 9,000</td>
                                                                <td>Ksh. Cash payment</td>
                                                                <td>
                                                                    <a class='label btn-primary label-mini reverse'
                                                                        id='25'>Delete</a>
                                                                </td>
                                                            </tr>

                                                            <tr class="odd gradeX">
                                                                <td class="">7</td>
                                                                <td class="">20-02-2022</td>
                                                                <td class="left">
                                                                    <a href="view_tenant.php?id=14">Tevin Jack</a>
                                                                </td>
                                                                <td class="left">White House</td>
                                                                <td class="left">G3</td>
                                                                <td class=''>Ksh. 500</td>
                                                                <td>Ksh. M-Pesa payment</td>
                                                                <td>
                                                                    <a class='label btn-primary label-mini reverse'
                                                                        id='26'>Delete</a>
                                                                </td>
                                                            </tr>

                                                            <tr class="odd gradeX">
                                                                <td class="">8</td>
                                                                <td class="">22-02-2022</td>
                                                                <td class="left">
                                                                    <a href="view_tenant.php?id=24">Wilson Ke</a>
                                                                </td>
                                                                <td class="left">White House</td>
                                                                <td class="left">F103</td>
                                                                <td class=''>Ksh. 1,000</td>
                                                                <td>Ksh. Cash payment</td>
                                                                <td>
                                                                    <a class='label btn-primary label-mini reverse'
                                                                        id='29'>Delete</a>
                                                                </td>
                                                            </tr>

                                                            <tr class="odd gradeX">
                                                                <td class="">9</td>
                                                                <td class="">07-03-2022</td>
                                                                <td class="left">
                                                                    <a href="view_tenant.php?id=24">Wilson Ke</a>
                                                                </td>
                                                                <td class="left">White House</td>
                                                                <td class="left">F103</td>
                                                                <td class=''>Ksh. 4,000</td>
                                                                <td>Ksh. Cash payment</td>
                                                                <td>
                                                                    <a class='label btn-primary label-mini reverse'
                                                                        id='39'>Delete</a>
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

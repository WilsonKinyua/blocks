@extends('layouts.admin')
@section('content')
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="page-bar">
                <div class="page-title-breadcrumb">
                    <div class=" pull-left">
                        <div class="page-title">Dashboard</div>
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
                        <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
                                href="{{ route('admin.home') }}">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                        </li>
                        <li class="active">Dashboard</li>
                    </ol>
                </div>
            </div>
            <!-- start widget -->
            <div class="row">
                <div class="col-xl-5">
                    <div class="w-100">
                        <div class="row">
                            <div class="col-sm-6">
                                <a href="">
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
                                            <h1 class="mt-1 mb-3 info-box-title">5</h1>
                                            <div class="mb-0">

                                                <span class="text-muted">
                                                    Hapa, Majaoni, Nyali, </span>

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
                                            <h1 class="mt-1 mb-3 info-box-title">29</h1>
                                            <div class="mb-0">
                                                <span class="text-muted">Nothing here yet!</span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-sm-6">
                                <a href="">
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
                                            <h1 class="mt-1 mb-3 info-box-title">10</h1>
                                            <div class="mb-0">
                                                <span class="text-success m-r-10"><i
                                                        class="material-icons col-green align-middle">trending_up</i>
                                                    10 </span>
                                                <span class="text-muted">New tenants</span>
                                            </div>
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
                                            <h1 class="mt-1 mb-3 info-box-title">0</h1>
                                            <div class="mb-0">
                                                <span class="text-danger m-r-10"><i
                                                        class="material-icons col-red align-middle">trending_down</i>
                                                    0
                                                </span>
                                                <span class="text-muted">Overdue payments</span>
                                            </div>
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
                            <button id="feedMenu" class="mdl-button mdl-js-button mdl-button--icon pull-right"
                                data-upgraded=",MaterialButton">
                                <i class="material-icons">more_vert</i>
                            </button>
                            <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"
                                data-mdl-for="feedMenu">
                                <li class="mdl-menu__item"><i class="material-icons">sort</i> Refresh updates
                                </li>
                            </ul>
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
                                        <table class="table table-striped custom-table table-hover">
                                            <thead>
                                                <tr class="text-uppercase">
                                                    <th> #</th>
                                                    <th> TENANT</th>
                                                    <th>PLOT NO.</th>
                                                    <th>HOUSE NO.</th>
                                                    <th>Paid </th>
                                                    <th>Balance </th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr
                                                    data-info='{"name":"Wilson","phone":"0717255460","email":"mzae@gmail.com"}'>
                                                    <td>1</td>
                                                    <td><a href=""> Wilson Ke </a>
                                                    </td>
                                                    <td>Keja Yetu</td>
                                                    <td>F103</td>
                                                    <td>Ksh. 9,000</td>
                                                    <td>Ksh. 3,000</td>
                                                    <td><span class="label label-primary label-mini">Due on 11th</span>
                                                    </td>
                                                    <td>
                                                        <a href="" class="btn btn-default btn-xs">
                                                            <i class="fa fa-bookmark-o"></i>Record Payment
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

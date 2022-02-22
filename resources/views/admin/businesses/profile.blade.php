@extends('layouts.admin')
@section('content')
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="page-bar">
                <div class="page-title-breadcrumb">
                    <div class=" pull-left">
                        <div class="page-title"><i class='material-icons'>business</i> Business Profile</div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <!-- BEGIN PROFILE SIDEBAR -->
                    <div class="profile-sidebar">
                        <div class="card card-topline-aqua">
                            <div class="card-head ">
                                <header>Business Details</header>
                            </div>
                            <div class="card-body no-padding height-9">
                                <div class="row mb-3">
                                    <div class="profile-userpic">
                                        <img src="http://localhost:8000/img/avatar.jpeg" id="bs-logo" class="img-responsive"
                                            alt="">
                                    </div>
                                </div>
                                <ul class="performance-list">
                                    <li>
                                        <a href="#" class="text-capitalize">
                                            <i class="fa fa-briefcase" style="color:#F39C12;"></i> Name: <span
                                                class="pull-right">{{ $business->name ?? '' }}</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="text-capitalize">
                                            <i class="fa fa-map-marker" style="color:#DD4B39;"></i> Office : <span
                                                class="pull-right">{{ $business->location ?? '' }}</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="text-capitalize">
                                            <i class="fa fa-phone" style="color:#00A65A;"></i> Contact: <span
                                                class="pull-right">{{ $business->phone ?? '' }}</span>
                                        </a>
                                    </li>
                                </ul>
                                <div class="profile-userbuttons">
                                    <form id="update_bs_logo" enctype="multipart/form-data">
                                        <div class="d-none">
                                            <input type="file" name="file" id="bs_logo" class="d-none" />
                                            <input type="hidden" name="bs_logo" value="bs_logo_update" />
                                            <input type="hidden" name="logo" value="8ae26d52be75a7f61869f46a932454f0.png">
                                        </div>
                                        <button type="submit" class="btn btn-circle blue btn-sm">Update &nbsp; Logo</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="card card-topline-gray">
                            <div class="card-head ">
                                <header>User Details</header>
                            </div>
                            <div class="card-body no-padding height-9">
                                <div class="row">
                                    <div class="profile-userpic">
                                        <img src="http://localhost:8000/img/avatar.jpeg" id="bs-logo" class="img-responsive"
                                            alt="">
                                    </div>
                                </div>
                                <div class="profile-usertitle text-capitalize">
                                    <div class="profile-usertitle-name">{{ Auth::user()->name ?? '' }} </div>
                                    <div class="profile-usertitle-job"> <i class='fa fa-map-marker'></i>
                                        {{ Auth::user()->location ?? '' }}
                                    </div>
                                </div>
                                <ul class="list-group list-group-unbordered">
                                    <li class="list-group-item">
                                        <b>Properties:</b> <a
                                            class="pull-right">{{ Auth::user()->no_of_properties ?? '0' }} </a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Phone :</b> <a class="pull-right">{{ Auth::user()->phone ?? '' }} </a>
                                    </li>
                                    <li class="list-group-item text-lowercase">
                                        <b>Email :</b> <a class="pull-right">{{ Auth::user()->email ?? '' }} </a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Account Created:</b> <a
                                            class="pull-right">{{ Auth::user()->created_at ?? '' }} </a>
                                    </li>
                                </ul>
                                <!-- SIDEBAR BUTTONS -->
                                <div class="profile-userbuttons">
                                    <form id="update_bs_logo" enctype="multipart/form-data">
                                        <div class="d-none">
                                            <input type="file" name="file" id="bs_logo" class="d-none" />
                                            <input type="hidden" name="bs_logo" value="bs_logo_update" />
                                            <input type="hidden" name="logo" value="8ae26d52be75a7f61869f46a932454f0.png">
                                        </div>
                                        <button type="submit" class="btn btn-circle blue btn-sm">Update &nbsp;
                                            Profile</button>
                                    </form>
                                </div>
                                <!-- END SIDEBAR BUTTONS -->
                            </div>
                        </div>
                    </div>
                    <!-- END BEGIN PROFILE SIDEBAR -->
                    <!-- BEGIN PROFILE CONTENT -->
                    <div class="profile-content">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card card-topline-gray">
                                    <div class="card-head ">
                                        <header>Business Profile</header>
                                        <button id="invoice-action"
                                            class="mdl-button mdl-js-button mdl-button--icon pull-right"
                                            data-upgraded=",MaterialButton">
                                            <i class="material-icons">more_vert</i>
                                        </button>
                                        <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"
                                            data-mdl-for="invoice-action">
                                            <li class="mdl-menu__item update_bs_profile"><i class="material-icons">sort</i>
                                                Update Profile
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="card-body no-padding height-9">
                                        <div id="biography">
                                            <div class="row">
                                                <div class="col-md-3 col-6 b-r text-capitalize"> <strong>Business
                                                        Name</strong>
                                                    <br>
                                                    <p class="text-muted">{{ $business->name ?? '' }}</p>
                                                </div>
                                                <div class="col-md-3 col-6 b-r"> <strong>Mobile</strong>
                                                    <br>
                                                    <p class="text-muted"> <a
                                                            href="tel:{{ $business->phone ?? '' }}">{{ $business->phone ?? '' }}</a>
                                                    </p>
                                                </div>
                                                <div class="col-md-3 col-6 b-r"> <strong>Email</strong>
                                                    <br>
                                                    <p class="text-muted"><a
                                                            href="malto:{{ $business->email ?? '' }}">{{ $business->email ?? '' }}</a>
                                                    </p>
                                                </div>
                                                <div class="col-md-3 col-6 text-capitalize"> <strong>Location</strong>
                                                    <br>
                                                    <p class="text-muted">{{ $business->location ?? '' }}</p>
                                                </div>

                                                <p class="">
                                                    {!! $business->description ?? '' !!}
                                                </p>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Info Box -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card card-topline-gray">
                                    <div class="card-head ">
                                        <header>Paybill Details</header>
                                        <button id="edit-action"
                                            class="mdl-button mdl-js-button mdl-button--icon pull-right"
                                            data-upgraded=",MaterialButton">
                                            <i class="material-icons">more_vert</i>
                                        </button>
                                        <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"
                                            data-mdl-for="edit-action">
                                            <li class="mdl-menu__item update_bs_profile"><i class="material-icons">sort</i>
                                                Update Iinformation</li>
                                        </ul>
                                    </div>
                                    <div class="card-body no-padding height-9">
                                        <ul class="performance-list">
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-briefcase" style="color:#F39C12;"></i> Name: <span
                                                        class="pull-right">Next Block Africa Ltd</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-map-marker" style="color:#DD4B39;"></i> Office : <span
                                                        class="pull-right">Nyali, Mombasa -Kenya</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-phone" style="color:#00A65A;"></i> Contact: <span
                                                        class="pull-right">0789456123</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card card-topline-gray">
                                    <div class="card-head ">
                                        <header>Paybill Details</header>
                                        <button id="edit-action"
                                            class="mdl-button mdl-js-button mdl-button--icon pull-right"
                                            data-upgraded=",MaterialButton">
                                            <i class="material-icons">more_vert</i>
                                        </button>
                                        <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"
                                            data-mdl-for="edit-action">
                                            <li class="mdl-menu__item update_bs_profile"><i class="material-icons">sort</i>
                                                Update Iinformation</li>
                                        </ul>
                                    </div>
                                    <div class="card-body no-padding height-9">
                                        <ul class="performance-list">
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-briefcase" style="color:#F39C12;"></i> Name: <span
                                                        class="pull-right">Next Block Africa Ltd</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-map-marker" style="color:#DD4B39;"></i> Office : <span
                                                        class="pull-right">Nyali, Mombasa -Kenya</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-phone" style="color:#00A65A;"></i> Contact: <span
                                                        class="pull-right">0789456123</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Info Box -->
                        <div class="row d-none">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="recent-report__chart">
                                            Data on the graphs below shows how your payment distribution and business
                                            perfomance will be visualized!
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- start chart -->
                        <div class="row clearfix d-nonee">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 col-6">
                                <div class="card">
                                    <div class="card-head">
                                        <header>Monthly Payment Destribution</header>
                                        <div class="tools">
                                            <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
                                            <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
                                            <a class="t-close btn-color fa fa-times" href="javascript:;"></a>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="recent-report__chart">
                                            <div id="chart1"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 col-6">
                                <div class="card">
                                    <div class="card-head">
                                        <header>Business Perfomance</header>
                                        <div class="tools">
                                            <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
                                            <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
                                            <a class="t-close btn-color fa fa-times" href="javascript:;"></a>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="recent-report__chart">
                                            <div id="chart2"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END PROFILE CONTENT -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <!--apex chart-->
    <script src="{{ asset('plugins/apexcharts/apexcharts.min.js') }}"></script>
    <!-- Page Specific JS File -->
    <script src="{{ asset('js/pages/chart/apex/apexcharts.data.js') }}"></script>
@endsection

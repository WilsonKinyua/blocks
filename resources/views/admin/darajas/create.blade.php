@extends('layouts.admin')
@section('content')
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="page-bar">
                <div class="page-title-breadcrumb">
                    <div class=" pull-left">
                        <div class="page-title text-uppercase"><i class="fa fa-hospital-o"></i> Add Daraja Record</div>
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
                                href="{{ route('admin.home') }}">Blocks</a>&nbsp;<i class="fa fa-angle-right"></i>
                        </li>
                        <li><a class="parent-item" href="{{ route('admin.darajas.index') }}">Daraja</a>&nbsp;<i
                                class="fa fa-angle-right"></i>
                        </li>
                        <li class="active">Add</li>
                    </ol>
                </div>
            </div>
            <form action="{{ route('admin.darajas.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="business_id" value="{{ $business->id }}">
                <div class="row">
                    <div class="col-12">
                        <div class="card-box">
                            <div class="card-head">
                                <header>Daraja Record</header>
                            </div>
                            <div class="card-body row">
                                <div class="col-12 p-t-20">
                                    <div
                                        class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                        <input class="mdl-textfield__input" type="text" id="prop_short_code" name="short_code" required>
                                        <label class="mdl-textfield__label">
                                            <i class="fa fa-credit-card"></i> 
                                            Short Code:
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-6 p-t-20">
                                    <div
                                        class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                        <input class="mdl-textfield__input" type="text" id="prop_consumer_key" name="consumer_key" required>
                                        <label class="mdl-textfield__label">
                                            <i class="fa fa-key"></i>
                                            Consumer Key:
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-6 p-t-20">
                                    <div
                                        class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                        <input class="mdl-textfield__input" type="text" id="prop_consumer_secret" name="consumer_secret" required>
                                        <label class="mdl-textfield__label">
                                            <i class="fa fa-lock"></i> 
                                            Consumer Secret:
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-6 p-t-20">
                                    <div
                                        class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                        <input class="mdl-textfield__input" type="text" id="prop_validation_webhook" name="validation_webhook" required>
                                        <label class="mdl-textfield__label">
                                            <i class="fa fa-link"></i>
                                            Validation Webhook:
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-6 p-t-20">
                                    <div
                                        class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                        <input class="mdl-textfield__input" type="text" id="prop_confirmation_webhook" name="confirmation_webhook" required>
                                        <label class="mdl-textfield__label">
                                            <i class="fa fa-link"></i>
                                            Confirmation Webhook:
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 p-t-20 text-center">
                        <strong class="text-muted">Please check if you have completed all the necesary
                            fields
                            before saving the Daraja record!</strong>
                        <br><br>
                        <button
                            class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-warning"
                            onclick="window.location='./'">Cancel</button>

                        <button id="add_prop_btn" name='add_property' type="submit"
                            class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-primary tstMidCenter">Create
                            Daraja Record</button>
                    </div>
                </div>
            </form>

        </div>
        <!-- end page content -->
    </div>
@endsection

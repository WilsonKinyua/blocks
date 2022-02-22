@extends('layouts.admin')
@section('content')
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="page-bar">
                <div class="page-title-breadcrumb">
                    <div class=" pull-left">
                        <div class="page-title"><i class="fa fa-building"></i> New Business</div>
                    </div>
                </div>
            </div>
            <form action="{{ route('admin.business.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="card-box">
                            <div class="card-head">
                                <header>Business Information</header>
                            </div>
                            <div class="card-body row">
                                <div class="col-lg-6 p-t-20">
                                    <div
                                        class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                        <input class="mdl-textfield__input" type="text" id="name" name="name" required>
                                        <label class="mdl-textfield__label"><i class="fa fa-user"></i>
                                            Name:</label>
                                    </div>
                                </div>
                                <div class="col-lg-6 p-t-20">
                                    <div
                                        class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                        <input class="mdl-textfield__input" type="tel" id="id" name="phone" required>
                                        <label class="mdl-textfield__label"><i class="fa fa-id-card"></i> Phone</label>
                                    </div>
                                </div>
                                <div class="col-lg-6 p-t-20">
                                    <div
                                        class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                        <input class="mdl-textfield__input" type="email" id="email" name="email" required>
                                        <label class="mdl-textfield__label"><i class="fa fa-envelope"></i> Email
                                            Address:</label>
                                        <span class="mdl-textfield__error">Enter Valid Email Address!</span>
                                    </div>
                                </div>
                                <div class="col-lg-6 p-t-20">
                                    <div
                                        class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                        <input class="mdl-textfield__input" type="text" id="rent" name="location" required>
                                        <label class="mdl-textfield__label"> Location</label>
                                    </div>
                                </div>
                                <div class="col-lg-12 p-t-20 text-center">
                                    <button type="button" onclick="window.location='/'"
                                        class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-default btn-block">Cancel</button>

                                    <button type="submit" id="add_tenant"
                                        class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-pink">Submit
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card box">
                            <div class="card-head">
                                <header>Business Description <small>(Optional)</small> </header>
                            </div>
                            <div class="card-body" id="bar-parent">
                                <div class="row">
                                    <div class="col-lg-12 p-t-20">
                                        <div
                                            class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                            <textarea class="mdl-textfield__input" type="text" name="description"
                                                rows="3"></textarea>
                                            <label class="mdl-textfield__label"><i class="fa fa-pen"></i>
                                                Description</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card box">
                            <div class="card-head">
                                <header>Business Logo <span class="text-danger">*</span> </header>
                            </div>
                            <div class="card-body" id="bar-parent">
                            </div>
                        </div>
                    </div>
                </div>
            </form>

        </div>
        <!-- end page content -->
    </div>
@endsection

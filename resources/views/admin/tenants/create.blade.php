@extends('layouts.admin')
@section('content')
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="page-bar">
                <div class="page-title-breadcrumb">
                    <div class=" pull-left">
                        <div class="page-title"><i class="fa fa-user-plus"></i> New Tenant</div>
                    </div>
                </div>
            </div>
            <form action="{{ route('admin.tenants.store') }}" method="post">
                @csrf
                <input type="hidden" name="business_id" value="{{ Auth::user()->business_id ?? '' }}">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card-box">
                            <div class="card-head">
                                <header>Tenants Information</header>
                            </div>
                            <div class="card-body row">
                                <div class="col-lg-6 p-t-20">
                                    <div
                                        class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                        <input class="mdl-textfield__input" type="text" id="name" name="name" required>
                                        <label class="mdl-textfield__label"><i class="fa fa-user"></i> Tenat
                                            Name:</label>
                                    </div>
                                </div>
                                <div class="col-lg-6 p-t-20">
                                    <div
                                        class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                        <input class="mdl-textfield__input" type="number" id="id_number" name="id_number"
                                            required>
                                        <label class="mdl-textfield__label"><i class="fa fa-id-card"></i> Identification
                                            No.
                                            (ID):</label>
                                    </div>
                                </div>
                                <div class="col-lg-6 p-t-20">
                                    <div
                                        class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                        <input class="mdl-textfield__input" type="tel" id="phone" name="phone" required>
                                        <label class="mdl-textfield__label"><i class="fa fa-phone"></i> Phone No.</label>
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
                                    <div class="form-group">
                                        <label>Property <span class="text-danger">*</span></label>
                                        <select class="mdl-textfield__input text-capitalize" name="property_id"
                                            id="property_id" required>
                                            <option>Select Property</option>
                                            @foreach ($properties as $property)
                                                <option value="{{ $property->id }}">{{ $property->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 p-t-20">
                                    <div class="form-group">
                                        <label>Unit No. (Room No.) <span class="text-danger">*</span></label>
                                        <select class="mdl-textfield__input" name="unit_id" id="unit_id" required>
                                            <option>Select Room No</option>
                                            @foreach ($units as $unit)
                                                <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 p-t-20">
                                    <div
                                        class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                        <input class="mdl-textfield__input" type="number" id="rent" name="rent" value="">
                                        <label class="mdl-textfield__label"><i class="fa fa-dollar"></i> Monthly
                                            Rent:</label>
                                    </div>
                                </div>
                                <div class="col-lg-6 p-t-20">
                                    <div
                                        class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                        <input class="mdl-textfield__input" type="number" id="deposit" name="deposit"
                                            value="">
                                        <label class="mdl-textfield__label"><i class="fa fa-dollar"></i> Rent
                                            Deposit:</label>
                                    </div>
                                </div>
                                <div class="col-lg-6 p-t-20">
                                    <div
                                        class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                        <input class="mdl-textfield__input" type="text" id="next_kin" value="N/A"
                                            name="emergency_contact_name">
                                        <label class="mdl-textfield__label"><i class="fa fa-user-plus"></i> Emergency
                                            Contact:</label>
                                    </div>
                                </div>
                                <div class="col-lg-6 p-t-20">
                                    <div
                                        class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                        <input class="mdl-textfield__input" type="tel" id="next_contact" value="N/A"
                                            name="emergency_contact_phone">
                                        <label class="mdl-textfield__label"><i class="fa fa-phone"></i> Contact</label>
                                    </div>
                                </div>
                                <div class="col-lg-12 p-t-20 text-center">
                                    <button type="button" onclick="window.location='./'"
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
                                <header>Documents <small> (if any) </small> </header>
                                <button id="action-button" class="mdl-button mdl-js-button mdl-button--icon pull-right"
                                    data-upgraded=",MaterialButton">
                                    <i class="material-icons">more_vert</i>
                                </button>
                                <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"
                                    data-mdl-for="action-button">

                                    <li class="mdl-menu__item"><i class="material-icons">sort</i> No actions available</li>
                                </ul>
                            </div>
                            <div class="card-body" id="bar-parent">
                                <form id="my-awesome-dropzone" action="#" class="dropzone form-horizontal">
                                </form>
                            </div>
                        </div>

                    </div>


                </div>
            </form>

        </div>
        <!-- end page content -->
    </div>
@endsection

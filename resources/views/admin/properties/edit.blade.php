@extends('layouts.admin')
@section('content')
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="page-bar">
                <div class="page-title-breadcrumb">
                    <div class=" pull-left">
                        <div class="page-title text-uppercase"><i class="fa fa-hospital-o"></i> Edit Property</div>
                    </div>
                </div>
            </div>
            <form action="{{ route('admin.properties.update', [$property->id]) }}" method="POST"
                enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <div class="card-box">
                            <div class="card-head">
                                <header>Property Information</header>
                            </div>
                            <div class="card-body row">
                                <div class="col-lg-6 p-t-20">
                                    <div
                                        class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                        <input class="mdl-textfield__input" type="text" id="prop_name" name="name"
                                            value="{{ old('name', $property->name) }}" required>
                                        <label class="mdl-textfield__label"><i class="fa fa-home"></i> Property
                                            Name:</label>
                                    </div>
                                </div>
                                <div class="col-lg-6 p-t-20">
                                    <div
                                        class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                        <input class="mdl-textfield__input" type="text" id="prop_location" name="location"
                                            value="{{ old('location', $property->location) }}" required>
                                        <label class="mdl-textfield__label"><i class="fa fa-map-marker"></i>
                                            Location:</label>
                                    </div>
                                </div>
                                <div class="col-lg-3 p-t-20">
                                    <div
                                        class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                        <input class="mdl-textfield__input" type="number" id="prop_units" name="no_of_units"
                                            value="{{ old('no_of_units', $property->no_of_units) }}">
                                        <label class="mdl-textfield__label"><i class="fa fa-building-o"></i> Number of
                                            units:</label>
                                    </div>
                                </div>
                                <div class="col-lg-4 p-t-20">
                                    <div
                                        class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                        <input class="mdl-textfield__input prop_date" type="text" id="date"
                                            name="management_since"
                                            value="{{ old('management_since', $property->management_since) }}">
                                        <label class="mdl-textfield__label"> <i class="fa fa-calendar"></i> Under management
                                            since: </label>
                                    </div>
                                </div>
                                <div class="col-lg-5 p-t-20">
                                    <div
                                        class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                        <input class="mdl-textfield__input" type="number" name="due_date"
                                            value="{{ old('due_date', $property->due_date) }}" required>
                                        <label class="mdl-textfield__label"><i class="fa fa-calendar"></i> Rent Due Date:</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-6">
                        <div class="card card-box">
                            <div class="card-head">
                                <header>Property Management</header>
                            </div>
                            <div class="card-body row">
                                <div class="col-lg-6 p-t-20">
                                    <div
                                        class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                        <input class="mdl-textfield__input" type="text" id="prop_owner" name="landlord_name"
                                            value="{{ old('landlord_name', $property->landlord_name) }}">
                                        <label class="mdl-textfield__label"><i class="fa fa-user-plus"></i> Landlord
                                            Name:</label>
                                    </div>
                                </div>
                                <div class="col-lg-6 p-t-20">
                                    <div
                                        class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                        <input class="mdl-textfield__input" type="tel" id="owner_contact"
                                            name="landlord_phone"
                                            value="{{ old('landlord_phone', $property->landlord_phone) }}">
                                        <label class="mdl-textfield__label"><i class="fa fa-phone"></i> Contact</label>
                                    </div>
                                </div>
                                <div class="col-lg-6 p-t-20">
                                    <div
                                        class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                        <input class="mdl-textfield__input" type="text" id="prop_manager"
                                            name="manager_name"
                                            value="{{ old('manager_name', $property->manager_name) }}">
                                        <label class="mdl-textfield__label"><i class="fa fa-user-plus"></i> Manager
                                            Name:</label>
                                    </div>
                                </div>
                                <div class="col-lg-6 p-t-20">
                                    <div
                                        class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                        <input class="mdl-textfield__input" type="tel" id="manager_contact"
                                            name="manager_phone"
                                            value="{{ old('manager_phone', $property->manager_phone) }}">
                                        <label class="mdl-textfield__label"><i class="fa fa-phone"></i> Contact</label>
                                    </div>
                                </div>
                                <div class="col-lg-6 p-t-20">
                                    <div
                                        class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                        <input class="mdl-textfield__input" type="text" id="prop_caretaker"
                                            name="caretaker_name"
                                            value="{{ old('caretaker_name', $property->caretaker_name) }}">
                                        <label class="mdl-textfield__label"><i class="fa fa-user-plus"></i> Caretaker
                                            Name:</label>
                                    </div>
                                </div>
                                <div class="col-lg-6 p-t-20">
                                    <div
                                        class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                        <input class="mdl-textfield__input" type="tel" id="caretaker_contact"
                                            name="caretaker_phone"
                                            value="{{ old('caretaker_phone', $property->caretaker_phone) }}">
                                        <label class="mdl-textfield__label"><i class="fa fa-phone"></i> Contact</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card card-box">
                            <div class="card-head">
                                <header>Edit Property Units</header>
                            </div>
                            <div class="card-body " id="bar-parent1">
                                <div class="form-group text-uppercase">
                                    <input type="text" class="tags tags-input prop_units text-uppercase" data-type="tags"
                                        value="<?php foreach ($units as $unit) {
                                            echo $unit->name . ',';
                                        } ?>" name="units" />
                                </div>
                                <div class="col-lg-12 p-t-20 text-center">
                                    <button
                                        class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-warning"
                                        onclick="window.location='./'">Cancel</button>

                                    <button id="add_prop_btn" name='add_property' type="submit"
                                        class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-primary tstMidCenter">Update
                                        Property</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </form>

        </div>
        <!-- end page content -->
    </div>
@endsection

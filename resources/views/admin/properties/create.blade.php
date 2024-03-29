@extends('layouts.admin')
@section('content')
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="page-bar">
                <div class="page-title-breadcrumb">
                    <div class=" pull-left">
                        <div class="page-title text-uppercase"><i class="fa fa-hospital-o"></i> Add Property</div>
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
                        <li><a class="parent-item" href="{{ route('admin.properties.index') }}">Properties</a>&nbsp;<i
                                class="fa fa-angle-right"></i>
                        </li>
                        <li class="active">Add</li>
                    </ol>
                </div>
            </div>
            <form action="{{ route('admin.properties.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="business_id" value="{{ $business->id }}">
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
                                        <input class="mdl-textfield__input" type="text" id="prop_name" name="name" required>
                                        <label class="mdl-textfield__label"><i class="fa fa-home"></i> Property
                                            Name:</label>
                                    </div>
                                </div>
                                <div class="col-lg-6 p-t-20">
                                    <div
                                        class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                        <input class="mdl-textfield__input" type="text" id="prop_location" name="location"
                                            required>
                                        <label class="mdl-textfield__label"><i class="fa fa-map-marker"></i>
                                            Location:</label>
                                    </div>
                                </div>
                                <div class="col-lg-3 p-t-20">
                                    <div
                                        class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                        <input class="mdl-textfield__input" type="number" id="prop_units"
                                            name="no_of_units">
                                        <label class="mdl-textfield__label"><i class="fa fa-building-o"></i> Number of
                                            units:</label>
                                    </div>
                                </div>
                                <div class="col-lg-4 p-t-20">
                                    <div
                                        class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                        <input class="mdl-textfield__input prop_date" type="text" id="date"
                                            name="management_since">
                                        <label class="mdl-textfield__label"> <i class="fa fa-calendar"></i> Under management
                                            since: </label>
                                    </div>
                                </div>
                                <div class="col-lg-5 p-t-20">
                                    <div
                                        class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                        <input class="mdl-textfield__input" type="number" name="due_date" value="5" required>
                                        <label class="mdl-textfield__label"><i class="fa fa-calendar"></i> Rent Due Date <small>(default set to 5th of every month)</small>:</label>
                                    </div>
                                </div>
                                {{-- <div class="col-lg-6 p-t-20">
                                    <div
                                        class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                        <input class="mdl-textfield__input" type="tel" id="agent_contact" readonly>
                                        <label class="mdl-textfield__label"><i class="fa fa-phone"></i> Contact *SKIP
                                            THIS
                                            TOO</label>
                                    </div>
                                </div> --}}
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
                                        <input class="mdl-textfield__input" type="text" id="prop_owner"
                                            name="landlord_name">
                                        <label class="mdl-textfield__label"><i class="fa fa-user-plus"></i> Landlord
                                            Name:</label>
                                    </div>
                                </div>
                                <div class="col-lg-6 p-t-20">
                                    <div
                                        class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                        <input class="mdl-textfield__input" type="tel" id="owner_contact"
                                            name="landlord_phone">
                                        <label class="mdl-textfield__label"><i class="fa fa-phone"></i> Contact</label>
                                    </div>
                                </div>
                                <div class="col-lg-6 p-t-20">
                                    <div
                                        class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                        <input class="mdl-textfield__input" type="text" id="prop_manager"
                                            name="manager_name">
                                        <label class="mdl-textfield__label"><i class="fa fa-user-plus"></i> Manager
                                            Name:</label>
                                    </div>
                                </div>
                                <div class="col-lg-6 p-t-20">
                                    <div
                                        class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                        <input class="mdl-textfield__input" type="tel" id="manager_contact"
                                            name="manager_phone">
                                        <label class="mdl-textfield__label"><i class="fa fa-phone"></i> Contact</label>
                                    </div>
                                </div>
                                <div class="col-lg-6 p-t-20">
                                    <div
                                        class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                        <input class="mdl-textfield__input" type="text" id="prop_caretaker"
                                            name="caretaker_name">
                                        <label class="mdl-textfield__label"><i class="fa fa-user-plus"></i> Caretaker
                                            Name:</label>
                                    </div>
                                </div>
                                <div class="col-lg-6 p-t-20">
                                    <div
                                        class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                        <input class="mdl-textfield__input" type="tel" id="caretaker_contact"
                                            name="caretaker_phone">
                                        <label class="mdl-textfield__label"><i class="fa fa-phone"></i> Contact</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card card-box">
                            <div class="card-head">
                                <header>Add Property Units</header>
                            </div>
                            <div class="card-body " id="bar-parent1">
                                <div class="form-group">
                                    <label class="control-label">Add units below:
                                        <small class="text-muted" style="font-weight:bold">( first remove the examples
                                            in
                                            the box )</small>
                                    </label>
                                    <input type="text" class="tags tags-input prop_units text-uppercase" data-type="tags"
                                        value="G-001,G-002,G-003,G-004" name="units" />
                                </div>
                                <div class="col-lg-12 p-t-20 text-center">
                                    <strong class="text-muted">Please check if you have completed all the necesary
                                        fields
                                        before adding property!</strong>
                                    <br><br>
                                    <button
                                        class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-warning"
                                        onclick="window.location='./'">Cancel</button>

                                    <button id="add_prop_btn" name='add_property' type="submit"
                                        class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-primary tstMidCenter">Add
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

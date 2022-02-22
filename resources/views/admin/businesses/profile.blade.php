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
                                        @if ($business->logo)
                                            <img src="{{ $business->logo->getUrl() }}" id="bs-logo" class="img-responsive"
                                                alt="" style="height: 130px">
                                        @else
                                            <img src="http://localhost:8000/img/avatar.jpeg" id="bs-logo"
                                                class="img-responsive" alt="">
                                        @endif
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
                                    <button type="submit" class="btn btn-circle blue btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#updateLogo">Update &nbsp; Logo</button>
                                </div>
                                {{-- update logo modal start --}}
                                <div class="modal fade" id="updateLogo" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <div aria-labelledby="swal2-title" aria-describedby="swal2-content"
                                                    class="swal2-popup swal2-modal swal2-show" tabindex="-1" role="dialog"
                                                    aria-live="assertive" aria-modal="true" style="display: flex;">
                                                    <div class="swal2-header">
                                                        <ul class="swal2-progress-steps" style="display: none;"></ul>
                                                        <div class="swal2-icon swal2-error" style="display: none;"></div>
                                                        <div class="swal2-icon swal2-question" style="display: none;"></div>
                                                        <div class="swal2-icon swal2-warning" style="display: none;"></div>
                                                        <div class="swal2-icon swal2-info" style="display: none;"></div>
                                                        <div class="swal2-icon swal2-success" style="display: none;"></div>
                                                        <img class="swal2-image" style="display: none;">
                                                        <h2 class="swal2-title" id="swal2-title" style="display: none;">
                                                        </h2><button type="button" class="swal2-close"
                                                            aria-label="Close this dialog" style="display: none;">×</button>
                                                    </div>
                                                    <div class="swal2-content">
                                                        <div id="swal2-content" class="swal2-html-container"
                                                            style="display: block;">
                                                            <div class="card-head"><small class="text-uppercase"> <i
                                                                        class="fa fa-image"></i> &nbsp; &nbsp;Update
                                                                    &nbsp; Business &nbsp; Logo</small></div>
                                                            <form class="row business_form"
                                                                action="{{ route('admin.business.update', [$business->id]) }}"
                                                                method="POST" enctype="multipart/form-data">
                                                                @method('PUT')
                                                                @csrf
                                                                <div class="col-lg-12 p-t-20">
                                                                    <div class="needsclick dropzone {{ $errors->has('logo') ? 'is-invalid' : '' }}"
                                                                        id="logo-dropzone">
                                                                    </div>
                                                                </div>
                                                                <div class="swal2-actions"><button type="submit"
                                                                        class="swal2-confirm swal2-styled"
                                                                        aria-label="Save Changes"
                                                                        style="display: inline-block; background-color: rgb(48, 133, 214); border-left-color: rgb(48, 133, 214); border-right-color: rgb(48, 133, 214);"><i
                                                                            class="fa fa-save"></i> Update
                                                                        Changes</button><button onclick="window.location=''"
                                                                        type="button" class="swal2-cancel swal2-styled"
                                                                        aria-label="Cancel"
                                                                        style="display: inline-block; background-color: rgb(221, 51, 51);"><i
                                                                            class="fa fa-times-circle"></i> Cancel</button>
                                                                </div>
                                                                <div class="swal2-footer" style="display: none;"></div>
                                                                <div class="swal2-timer-progress-bar-container">
                                                                    <div class="swal2-timer-progress-bar"
                                                                        style="display: none;"></div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- update logo modal end --}}
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
                                <div class="profile-userbuttons">
                                    <button type="submit" class="btn btn-circle blue btn-sm">Update &nbsp;
                                        Profile</button>
                                </div>
                                {{-- update logo modal start --}}
                                {{-- <div class="modal fade" id="exampleModal" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <div aria-labelledby="swal2-title" aria-describedby="swal2-content"
                                                    class="swal2-popup swal2-modal swal2-show" tabindex="-1" role="dialog"
                                                    aria-live="assertive" aria-modal="true" style="display: flex;">
                                                    <div class="swal2-header">
                                                        <ul class="swal2-progress-steps" style="display: none;"></ul>
                                                        <div class="swal2-icon swal2-error" style="display: none;"></div>
                                                        <div class="swal2-icon swal2-question" style="display: none;"></div>
                                                        <div class="swal2-icon swal2-warning" style="display: none;"></div>
                                                        <div class="swal2-icon swal2-info" style="display: none;"></div>
                                                        <div class="swal2-icon swal2-success" style="display: none;"></div>
                                                        <img class="swal2-image" style="display: none;">
                                                        <h2 class="swal2-title" id="swal2-title" style="display: none;">
                                                        </h2><button type="button" class="swal2-close"
                                                            aria-label="Close this dialog" style="display: none;">×</button>
                                                    </div>
                                                    <div class="swal2-content">
                                                        <div id="swal2-content" class="swal2-html-container"
                                                            style="display: block;">
                                                            <div class="card-head"><small class="text-uppercase"> <i
                                                                        class="fa fa-bank"></i> &nbsp; &nbsp;Update
                                                                    &nbsp; Business &nbsp; Information</small></div>
                                                            <form class="row business_form">

                                                                <div class="col-lg-6 p-t-20">
                                                                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width is-dirty is-upgraded"
                                                                        data-upgraded=",MaterialTextfield">
                                                                        <input class="mdl-textfield__input" type="text"
                                                                            name="name" value="Next Block Africa Ltd">
                                                                        <label class="mdl-textfield__label"><i
                                                                                class="fa fa-briefcase"></i> Agency
                                                                            Name:</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6 p-t-20">
                                                                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width is-dirty is-upgraded"
                                                                        data-upgraded=",MaterialTextfield">
                                                                        <input class="mdl-textfield__input" type="text"
                                                                            name="location" value="Nyali, Mombasa -Kenya">
                                                                        <label class="mdl-textfield__label"><i
                                                                                class="fa fa-map-marker"></i> Office
                                                                            Location:</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6 p-t-20">
                                                                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width is-dirty is-upgraded"
                                                                        data-upgraded=",MaterialTextfield">
                                                                        <input class="mdl-textfield__input" type="tel"
                                                                            name="phone" value="0789456123">
                                                                        <label class="mdl-textfield__label"><i
                                                                                class="fa fa-phone"></i> Office
                                                                            Numner:</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6 p-t-20">
                                                                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width is-dirty is-upgraded"
                                                                        data-upgraded=",MaterialTextfield">
                                                                        <input class="mdl-textfield__input" type="email"
                                                                            name="email" value="hello@mail.com">
                                                                        <label class="mdl-textfield__label"><i
                                                                                class="fa fa-envelope"></i> Email
                                                                            Address:</label>
                                                                    </div><input type="hidden" name="block_data"
                                                                        value="add_update">
                                                                </div>
                                                                <div class="col-lg-12 p-t-20">
                                                                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width is-dirty is-upgraded"
                                                                        data-upgraded=",MaterialTextfield">
                                                                        <textarea class="mdl-textfield__input" rows="2"
                                                                            name="description">Blocks is a digital property management agency operating across</textarea>
                                                                        <label class="mdl-textfield__label text-info"
                                                                            for="msg-input"><i class="fa fa-file-text"></i>
                                                                            Briefly describe your business below:</label>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div><input class="swal2-input" style="display: none;"><input
                                                            type="file" class="swal2-file" style="display: none;">
                                                        <div class="swal2-range" style="display: none;"><input
                                                                type="range"><output></output></div><select
                                                            class="swal2-select" style="display: none;"></select>
                                                        <div class="swal2-radio" style="display: none;"></div><label
                                                            for="swal2-checkbox" class="swal2-checkbox"
                                                            style="display: none;"><input type="checkbox"><span
                                                                class="swal2-label"></span></label><textarea
                                                            class="swal2-textarea" style="display: none;"></textarea>
                                                        <div class="swal2-validation-message" id="swal2-validation-message">
                                                        </div>
                                                    </div>
                                                    <div class="swal2-actions"><button type="button"
                                                            class="swal2-confirm swal2-styled" aria-label="Save Changes"
                                                            style="display: inline-block; background-color: rgb(48, 133, 214); border-left-color: rgb(48, 133, 214); border-right-color: rgb(48, 133, 214);"><i
                                                                class="fa fa-save"></i> Save Changes</button><button
                                                            type="button" class="swal2-cancel swal2-styled"
                                                            aria-label="Cancel"
                                                            style="display: inline-block; background-color: rgb(221, 51, 51);"><i
                                                                class="fa fa-times-circle"></i> Cancel</button></div>
                                                    <div class="swal2-footer" style="display: none;"></div>
                                                    <div class="swal2-timer-progress-bar-container">
                                                        <div class="swal2-timer-progress-bar" style="display: none;"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                                {{-- update logo modal end --}}
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
                                            <li class="mdl-menu__item update_bs_profile"><i
                                                    class="material-icons">sort</i>
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
                                            <li class="mdl-menu__item update_bs_profile"><i
                                                    class="material-icons">sort</i>
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
    <script>
        Dropzone.options.logoDropzone = {
            url: '{{ route('admin.business.storeMedia') }}',
            maxFilesize: 2, // MB
            acceptedFiles: '.jpeg,.jpg,.png,.gif',
            maxFiles: 1,
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            params: {
                size: 2,
                width: 4096,
                height: 4096
            },
            success: function(file, response) {
                $('form').find('input[name="logo"]').remove()
                $('form').append('<input type="hidden" name="logo" value="' + response.name + '">')
            },
            removedfile: function(file) {
                file.previewElement.remove()
                if (file.status !== 'error') {
                    $('form').find('input[name="logo"]').remove()
                    this.options.maxFiles = this.options.maxFiles + 1
                }
            },
            init: function() {
                @if (isset($showroomLogo) && $showroomLogo->logo)
                    var file = {!! json_encode($showroomLogo->logo) !!}
                    this.options.addedfile.call(this, file)
                    this.options.thumbnail.call(this, file, file.preview)
                    file.previewElement.classList.add('dz-complete')
                    $('form').append('<input type="hidden" name="logo" value="' + file.file_name + '">')
                    this.options.maxFiles = this.options.maxFiles - 1
                @endif
            },
            error: function(file, response) {
                if ($.type(response) === 'string') {
                    var message = response //dropzone sends it's own error messages in string
                } else {
                    var message = response.errors.file
                }
                file.previewElement.classList.add('dz-error')
                _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
                _results = []
                for (_i = 0, _len = _ref.length; _i < _len; _i++) {
                    node = _ref[_i]
                    _results.push(node.textContent = message)
                }

                return _results
            }
        }
    </script>
@endsection

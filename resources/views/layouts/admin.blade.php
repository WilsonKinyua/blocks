<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Blocks | Admin Dashboard</title>
    <!-- google font -->
    <link href="{{ asset('google-fonts/css6079.css?family=Poppins:300,400,500,600,700') }}" rel="stylesheet"
        type="text/css" />
    <!-- icons -->
    <link href="{{ asset('fonts/simple-line-icons/simple-line-icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('fonts/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('fonts/material-design-icons/material-icon.css') }}" rel="stylesheet" type="text/css" />
    <!--bootstrap -->
    <link href="{{ asset('plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('plugins/flatpicker/css/flatpickr.min.css') }}" />
    <link href="{{ asset('plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet"
        media="screen">
    <link href="{{ asset('plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.css') }}" rel="stylesheet"
        media="screen">
    <!-- data tables -->
    <link href="{{ asset('plugins/datatables/plugins/bootstrap/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
    <!-- Material Design Lite CSS -->
    <link rel="stylesheet" href="{{ asset('plugins/material/material.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/material_style.css') }}">

    <!-- Jquery Toast css -->
    <link rel="stylesheet" href="{{ asset('plugins/jquery-toast/dist/jquery.toast.min.css') }}">
    <!-- Styles -->
    <link href="{{ asset('css/theme/full/theme_style.css') }}" rel="stylesheet" id="rt_style_components"
        type="text/css" />
    <link href="{{ asset('css/plugins.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/theme/full/style.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/responsive.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/theme/full/theme-color.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('plugins/sweet-alert/sweetalert2.min.css') }}" rel="stylesheet">
    <!-- dropzone -->
    <link href="{{ asset('plugins/dropzone/dropzone.css') }}" rel="stylesheet" media="screen">
    <!--tagsinput-->
    <link href="{{ asset('plugins/jquery-tags-input/jquery-tags-input.css') }}" rel="stylesheet">
    <!-- favicon -->
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" />
    <!-- Jquery Toast css -->
    <link rel="stylesheet" href="{{ asset('css/toastr.min.css') }}">
    @yield('css')
    <style>
        select.mdl-textfield__input:active,
        select.mdl-textfield__input:focus {
            outline: none !important;
            box-shadow: none !important;
            -webkit-appearance: none;
        }

    </style>
</head>
<!-- END HEAD -->

<body
    class="page-header-fixed sidemenu-closed-hidelogo page-content-white page-md page-full-width header-white white-sidebar-color logo-white">
    <div class="page-wrapper">

        <!-- start header -->
        @include('partials.header')
        <!-- end header -->

        <!-- start page container -->
        <div class="page-container">
            @if (session('message'))
                <div class="row mb-2">
                    <div class="col-lg-12">
                        <div class="alert alert-success" role="alert">{{ session('message') }}</div>
                    </div>
                </div>
            @endif
            @if ($errors->count() > 0)
                <div class="alert alert-danger">
                    <ul class="list-unstyled">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @yield('content')

            <form id="logoutform" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>

        </div>
        <!-- end page container -->

        <!-- start footer -->
        @include('partials.footer')
        <!-- end footer -->
    </div>
    <!-- start js include path -->

    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('plugins/popper/popper.js') }}"></script>
    <script src="{{ asset('plugins/jquery-blockui/jquery.blockui.min.js') }}"></script>
    <script src="{{ asset('plugins/jquery-slimscroll/jquery.slimscroll.js') }}"></script>
    <!-- bootstrap -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap-inputmask/bootstrap-inputmask.min.js') }}"></script>

    <script src="{{ asset('plugins/flatpicker/js/flatpicker.min.js') }}"></script>
    <script src="{{ asset('js/pages/date-time/date-time.init.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js') }}" charset="UTF-8">
    </script>
    <script src="{{ asset('plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker-init.js') }}" charset="UTF-8">
    </script>

    <!-- data tables -->
    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables/plugins/bootstrap/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('js/pages/table/table_data.js') }}"></script>

    <!-- notifications -->
    <script src="{{ asset('plugins/jquery-toast/dist/jquery.toast.min.js') }}"></script>

    <!-- counterup -->
    <script src="{{ asset('plugins/counterup/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('plugins/counterup/jquery.counterup.min.js') }}"></script>
    <!-- Common js-->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/layout.js') }}"></script>
    <script src="{{ asset('js/theme-color.js') }}"></script>
    <!-- material -->
    <script src="{{ asset('plugins/material/material.min.js') }}"></script>
    <script src="{{ asset('plugins/sweet-alert/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('plugins/sweet-alert/sweetalert2.min.js') }}"></script>
    <!-- dropzone -->
    <script src="{{ asset('plugins/dropzone/dropzone.js') }}"></script>
    <!--tags input-->
    <script src="{{ asset('plugins/jquery-tags-input/jquery-tags-input.js') }}"></script>
    <script src="{{ asset('plugins/jquery-tags-input/jquery-tags-input-init.js') }}"></script>

    <script>
        @if (session()->has('success'))
            Swal.fire("Success!", "{{ session()->get('success') }}", "success");
        @endif
        @if (session()->has('danger'))
            Swal.fire("Ooops!", "{{ session()->get('danger') }}", "danger");
        @endif
        @if (session()->has('error'))
            Swal.fire("Ooops!", "{{ session()->get('error') }}", "error");
        @endif
    </script>
    @yield('js')
</body>

</html>

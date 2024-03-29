<div class="page-header navbar navbar-fixed-top">
    <div class="page-header-inner ">
        <!-- logo start -->
        <div class="page-logo">
            <a href="{{ route('admin.home') }}">
                <span class="logo-icon material-icons fa-rotate-45">school</span>
                <span class="logo-default" style="font-family: cambria; font-weight:bolder;">Blocks</span> </a>
        </div>

        <!-- start mobile menu -->
        <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse"
            data-target=".navbar-collapse">
            <span></span>
        </a>
        <!-- end mobile menu -->
        <!-- start header menu -->
        <div class="top-menu">
            <ul class="nav navbar-nav pull-right">
                <li><a href="javascript:;" class="fullscreen-btn"><i class="fa fa-arrows-alt"></i></a></li>

                <!-- start notification dropdown -->
                <li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar">
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                        data-close-others="true">
                        <i class="fa fa-bell-o"></i>
                        <span class="badge headerBadgeColor1"> 0 </span>
                    </a>
                </li>
                <!-- end notification dropdown -->
                <!-- start message dropdown -->
                <li class="dropdown dropdown-extended dropdown-inbox" id="header_inbox_bar">
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                        data-close-others="true">
                        <i class="fa fa-envelope-o"></i>
                        <span class="badge headerBadgeColor2"> 0 </span>
                    </a>
                </li>
                <!-- end message dropdown -->
                <li class="dropdown dropdown-user">
                    <a class="dropdown-toggle" data-bs-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                        <img alt="" class="img-circle pull-right" src="{{ asset('img/avatar.jpeg') }}" />
                        <span class="username username-hide-on-mobile"> {{ Auth::user()->name }} </span>
                        <i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-default">
                        <li>
                            <a href="{{ route('admin.business.profile') }}">
                                <i class="icon-user"></i> Profile </a>
                        </li>
                        <li>
                            <a href="">
                                <i class="fa fa-cogs"></i> Paybill config
                            </a>
                        </li>
                        <li class="divider"> </li>
                        <li>
                            <a href="#lock_screen"
                                onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                                <i class="icon-lock"></i> Lock
                            </a>
                        </li>
                        <li>
                            <a href=""
                                onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                                <i class="icon-logout"></i> Log Out </a>
                        </li>
                    </ul>
                </li>

                <li class="dropdown dropdown-quick-sidebar-toggler">
                    <a id="headerSettingButton" class="mdl-button mdl-js-button mdl-button--icon pull-right"
                        data-upgraded=",MaterialButton">
                        <i class="material-icons">more_vert</i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <!-- start horizontal menu -->
    <div class="navbar-custom">
        <div class="hor-menu hidden-sm hidden-xs">
            <ul class="nav navbar-nav">
                <li class="mega-menu-dropdown active open">
                    <a href="{{ route('admin.home') }}" class="dropdown-toggle"> <i
                            class="material-icons">dashboard</i> Dashboard
                        <span class="selected"></span>
                    </a>
                </li>
                @can('tenant_access')
                    <li class="mega-menu-dropdown mega-menu-dropdown">
                        <a href="#" class="dropdown-toggle"> <i class="material-icons">dvr</i>Manage Tenants
                            <i class="fa fa-angle-down"></i>
                            <span class="arrow "></span>
                        </a>
                        <ul class="dropdown-menu pull-left">
                            <li class="dropdown-submenu">
                                <a href="{{ route('admin.tenants.index') }}">
                                    <i class="fa fa-briefcase"></i> Manage Tenants</a>
                            </li>
                            @can('tenant_create')
                                <li class="dropdown-submenu">
                                    <a href="{{ route('admin.tenants.create') }}">
                                        <i class="fa fa-user-plus"></i> Add Tenant</a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('property_access')
                    <li class="mega-menu-dropdown mega-menu-dropdown">
                        <a href="#" class="dropdown-toggle"> <i class="material-icons">business</i> Properties
                            <i class="fa fa-angle-down"></i>
                            <span class="arrow "></span>
                        </a>
                        <ul class="dropdown-menu pull-left">
                            @can('property_access')
                                <li class="dropdown-submenu">
                                    <a href="{{ route('admin.properties.index') }}">
                                        <i class="fa fa-briefcase"></i> Manage </a>
                                </li>
                            @endcan
                            @can('property_create')
                                <li class="dropdown-submenu">
                                    <a href="{{ route('admin.properties.create') }}">
                                        <i class="fa fa-hospital-o"></i> Add New</a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('account_access')
                    <li class="classic-menu-dropdown mega-menu-dropdown">
                        <a href="#" class=" megamenu-dropdown" data-close-others="true"> <i
                                class="material-icons">assignment</i> Accounting
                            <i class="fa fa-angle-down"></i>
                            <span class="arrow "></span>
                        </a>
                        <ul class="dropdown-menu pull-left">
                            @can('records_list')
                                <li class="dropdown-submenu">
                                    <a href="{{ route('admin.accounts.allRecords') }}" class="nav-link nav-toggle"> <i
                                            class="fa fa-list"></i>
                                        <span class="title">Overview</span> </span>
                                    </a>
                                </li>
                            @endcan
                            @can('record_payment')
                                <li class="dropdown-submenu">
                                    <a href="{{ route('admin.tenant-payments.create') }}" class="nav-link nav-toggle"> <i
                                            class="fa fa-bookmark"></i>
                                        <span class="title">Record Payment</span> </span>
                                    </a>
                                </li>
                            @endcan
                            @can('penalty_access')
                                <li class="dropdown-submenu">
                                    <a href="{{ route('admin.penalties.create') }}" class="nav-link nav-toggle"> <i
                                            class="fa fa-bookmark"></i>
                                        <span class="title">Record Penalty</span> </span>
                                    </a>
                                </li>
                            @endcan
                            {{-- @can('overdue_payment')
                                <li class="dropdown-submenu">
                                    <a href="{{ route('admin.tenant-payments.overdue') }}" class="nav-link nav-toggle"> <i
                                            class="fa fa-calendar"></i>
                                        <span class="title">Overdue Payment</span> </span>
                                    </a>
                                </li>
                            @endcan --}}
                            @can('record_management_access')
                                <li class="dropdown-submenu">
                                    <a href="{{ route('admin.tenant-payments.transactions') }}">
                                        <i class="fa fa-briefcase"></i> Manage Records</a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                <li class="mega-menu-dropdown ">
                    <a href="" class="dropdown-toggle"> <i class="material-icons">group</i> Landlords
                    </a>
                </li>

            </ul>
        </div>
    </div>
</div>

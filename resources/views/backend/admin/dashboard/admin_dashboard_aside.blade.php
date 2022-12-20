@php
    $prefix = Request::route()->getprefix();
    $route = Route::current()->getName();
@endphp
<aside class="main-sidebar">
    <section class="sidebar">

        <div class="user-profile">
            <div class="ulogo">
                <a href="/">
                    <div class="d-flex align-items-center justify-content-center">
                        <img src="{{ asset('assets/images/logo-dark.png') }}" alt="Logo">
                        <h3><b>School</b> Management</h3>
                    </div>
                </a>
            </div>
        </div>

        <ul class="sidebar-menu" data-widget="tree">

            <li class="{{ $route == 'admin_dashboard' ? 'active' : '' }}">
                <a href="{{ route('admin_dashboard') }}">
                    <i data-feather="pie-chart"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="treeview {{ $prefix == 'admin/users' ? 'active' : '' }}">
                <a href="#">
                    <i data-feather="message-circle"></i>
                    <span>Manage User</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('admin_user_view') }}"><i
                                class="ti-more {{ $route == route('admin_user_view') ? 'active' : '' }}"></i>View
                            User</a></li>
                    <li><a href="{{ route('admin_user_add') }}"><i class="ti-more"></i>Add User</a></li>
                </ul>
            </li>

            <li class="treeview {{ $prefix == 'admin/profile' ? 'active' : '' }}">
                <a href="#">
                    <i data-feather="mail"></i> <span>Profile</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('admin_profile_view') }}"><i class="ti-more"></i>Profile View</a></li>
                    <li><a href="{{ route('admin_profile_edit') }}"><i class="ti-more"></i>Profile Edit</a></li>
                    <li><a href="{{ route('admin_password_view') }}"><i class="ti-more"></i>Change Password</a>
                    </li>
                </ul>
            </li>
            <li class="treeview {{ $prefix == 'admin/setups' ? 'active' : '' }}">
                <a href="#">
                    <i data-feather="mail"></i> <span>Setup Management</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('admin_profile_view') }}"><i class="ti-more"></i>Student Class</a></li>
                    <li><a href="{{ route('admin_profile_edit') }}"><i class="ti-more"></i>Profile Edit</a></li>
                    <li><a href="{{ route('admin_password_view') }}"><i class="ti-more"></i>Change Password</a>
                    </li>
                </ul>
            </li>

            <li class="header nav-small-cap">User Interface</li>

            <li class="treeview">
                <a href="#">
                    <i data-feather="grid"></i>
                    <span>Components</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="components_alerts.html"><i class="ti-more"></i>Alerts</a></li>
                    <li><a href="components_badges.html"><i class="ti-more"></i>Badge</a></li>
                </ul>
            </li>

            <li>
                <a href="auth_login.html">
                    <i data-feather="lock"></i>
                    <span>Log Out</span>
                </a>
            </li>

        </ul>
    </section>

    <div class="sidebar-footer">
        <a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Settings"
            aria-describedby="tooltip92529"><i class="ti-settings"></i></a>
        <a href="mailbox_inbox.html" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i
                class="ti-email"></i></a>
        <a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i
                class="ti-lock"></i></a>
    </div>
</aside>

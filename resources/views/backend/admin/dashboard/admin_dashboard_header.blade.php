<header class="main-header">
    <nav class="navbar navbar-static-top pl-30 d-flex justify-content-end">

        <div class="navbar-custom-menu r-side">
            <ul class="nav navbar-nav">
                @php
                    $user = DB::table('admins')
                        // ->where('id', Auth::user()->id)
                        ->where('id', \App\Models\Admin::find(1))
                        ->first();
                @endphp
                <!-- User Account-->
                <li class="dropdown user user-menu">
                    <a href="#" class="waves-effect waves-light rounded dropdown-toggle p-0" data-toggle="dropdown"
                        title="User">
                        <img src="{{ !empty($user->image) ? url('upload/user_images/' . $user->image) : url('upload/no_image.jpg') }}"
                            alt="">
                    </a>
                    <ul class="dropdown-menu animated flipInX">
                        <li class="user-body">
                            <a class="dropdown-item" href="{{ route('admin_profile_view') }}"><i
                                    class="ti-user text-muted mr-2"></i> Profile</a>
                            <a class="dropdown-item" href="#"><i class="ti-wallet text-muted mr-2"></i> My
                                Wallet</a>
                            <a class="dropdown-item" href="#"><i class="ti-settings text-muted mr-2"></i>
                                Settings</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('admin_logout') }}"><i
                                    class="ti-lock text-muted mr-2"></i> Logout</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#" data-toggle="control-sidebar" title="Setting" class="waves-effect waves-light">
                        <i class="ti-settings"></i>
                    </a>
                </li>

            </ul>
        </div>
    </nav>
</header>

@extends('login_base')
@section('title', 'SMY | Admin Register')
@section('main_content')
    <div class="wrapper without_header_sidebar">
        <div class="content_wrapper">
            <div class="login_page center_container">
                <div class="center_content">
                    <div class="logo">
                        <img src="{{ asset('assets/images/logo.png') }}" alt="" class="img-fluid">
                    </div>

                    @if (Session::has('alert'))
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>{{ session::get('alert') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    <form action="{{ route('admin_register_store') }}" method="post">
                        @csrf
                        <div class="form-group icon_parent">
                            <label for="uname">Username</label>
                            <input type="text" class="form-control" name="name" placeholder="Full Name">
                            <span class="icon_soon_bottom_right"><i class="fas fa-user"></i></span>
                        </div>
                        <div class="form-group icon_parent">
                            <label for="email">E-mail</label>
                            <input type="email" class="form-control" name="email" placeholder="Email Address">
                            <span class="icon_soon_bottom_right"><i class="fas fa-envelope"></i></span>
                        </div>
                        <div class="form-group icon_parent">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Password">
                            <span class="icon_soon_bottom_right"><i class="fas fa-unlock"></i></span>
                        </div>
                        <div class="form-group icon_parent">
                            <label for="rtpassword">Re-type Password</label>
                            <input type="password" class="form-control" name="password_confirmation"
                                placeholder="Confirm Password">
                            <span class="icon_soon_bottom_right"><i class="fas fa-unlock"></i></span>
                        </div>
                        <div class="form-group">
                            <a class="registration" href="{{ route('admin_login') }}">Already have an account</a><br>
                            <button type="submit" class="btn btn-blue">Signup</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

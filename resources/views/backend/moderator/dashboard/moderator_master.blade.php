@extends('base')
@section('title', 'SMY | Dashboard')
@section('main_content')
    <div class="wrapper">
        <header class="header_area">
            <div class="sidebar_logo">
                <a href="{{ route('moderator_dashboard') }}">
                    <img src="{{ asset('assets/images/logo.png') }}" alt="" style="width:95% !important;"
                        class="img-fluid logo1">
                </a>
            </div>
            <ul class="header_menu">
                <li>
                    <a href="{{ route('moderator_logout') }}"><span><i class="fas fa-unlock-alt"></i></span>
                        <i class="fas fa-sign-out-alt"></i></a>
                </li>
                <li>
                    <a class="responsive_menu_toggle" href="#"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
        </header>
        <aside class="sidebar-wrapper ">
            <nav class="sidebar-nav">
                <ul class="metismenu" id="menu1">
                    <li class="single-nav-wrapper">
                        <a href="{{ route('moderator_dashboard') }}" class="menu-item">
                            <span class="left-icon"><i class="fas fa-home"></i></span>
                            <span class="menu-text">Dashboard</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </aside>
        <div class="content_wrapper">

            @if (Session::has('alert'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>{{ session::get('alert') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            @yield('moderator')
        </div>
    </div>
@endsection('main_content')

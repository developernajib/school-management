@extends('dashboard_base')
@section('title', 'SMS | Dashboard')
@section('main_content')

    @include('backend.admin.dashboard.admin_dashboard_header')
    @include('backend.admin.dashboard.admin_dashboard_aside')

    @yield('admin')

    @include('backend.admin.dashboard.admin_dashboard_footer')

@endsection

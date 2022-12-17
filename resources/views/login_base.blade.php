<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ asset('assets/images/favicon.png') }}">
    <title>@yield('title', 'School Management System')</title>
    <link rel="stylesheet" href="{{ asset('assets/multi_auth/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/multi_auth/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/multi_auth/css/style.css') }}">
</head>

<body id="page-top">


    @yield('main_content')


    <script src="{{ asset('assets/multi_auth/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/multi_auth/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/multi_auth/js/all.min.js') }}"></script>
    <script src="{{ asset('assets/multi_auth/js/main.js') }}"></script>
</body>

</html>

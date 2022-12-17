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

    {{-- Theme --}}
    <link rel="stylesheet" href="{{ asset('assets/admin_dashboard/css/vendors_css.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin_dashboard/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin_dashboard/css/skin_color.css') }}">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
</head>

<body class="hold-transition dark-skin sidebar-mini theme-primary fixed">
    <div class="wrapper">

        @yield('main_content')

        {{-- Theme --}}
        <script src="{{ asset('assets/admin_dashboard/js/vendors.min.js') }}"></script>
        <script src="{{ asset('assets/icons/feather-icons/feather.min.js') }}"></script>
        <script src="{{ asset('assets/vendor_components/easypiechart/dist/jquery.easypiechart.js') }}"></script>
        <script src="{{ asset('assets/vendor_components/apexcharts-bundle/irregular-data-series.js') }}"></script>
        <script src="{{ asset('assets/vendor_components/apexcharts-bundle/dist/apexcharts.js') }}"></script>
        <script src="{{ asset('assets/admin_dashboard/js/template.js') }}"></script>
        <script src="{{ asset('assets/admin_dashboard/js/pages/dashboard.js') }}"></script>
        <script src="{{ asset('assets/icons/feather-icons/feather.min.js') }}"></script>
        <script src="{{ asset('assets/vendor_components/datatable/datatables.min.js') }}"></script>
        <script src="{{ asset('assets/admin_dashboard/js/pages/data-table.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

        <script type="text/javascript">
            $(function() {
                $(document).on('click', '#delete', function(e) {
                    e.preventDefault();
                    var link = $(this).attr("href");
                    Swal.fire({
                        title: 'Are you sure?',
                        text: "Delete This Data?",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = link
                            Swal.fire(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                            )
                        }
                    })
                });
            });
        </script>

        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        <script>
            @if (Session::has('message'))
                var type = "{{ Session::get('alert-type', 'info') }}"
                switch (type) {
                    case 'info':
                        toastr.info(" {{ Session::get('message') }} ");
                        break;

                    case 'success':
                        toastr.success(" {{ Session::get('message') }} ");
                        break;

                    case 'warning':
                        toastr.warning(" {{ Session::get('message') }} ");
                        break;

                    case 'error':
                        toastr.error(" {{ Session::get('message') }} ");
                        break;
                }
            @endif
        </script>
    </div>
</body>

</html>

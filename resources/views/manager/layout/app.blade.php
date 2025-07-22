<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Dashboard | Greeva - Responsive Bootstrap 5 Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('manager/images/favicon.ico') }}">

    <!-- Vector Maps css -->
    <link href="{{ asset('manager/vendor/jsvectormap/jsvectormap.min.css') }}" rel="stylesheet" type="text/css">

    <!-- Theme Config Js -->
    <script src="{{ asset('manager/js/config.js') }}"></script>

    <!-- Vendor css -->
    <link href="{{ asset('manager/css/vendor.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- App css -->
    <link href="{{ asset('manager/css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-style" />

    <!-- Icons css -->
    <link href="{{ asset('manager/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    @yield('css')
</head>

<body>
    <!-- Begin page -->
    <div class="wrapper">


        <!-- Sidenav Menu Start -->
        @include('manager.partials.side-menu')
        <!-- Sidenav Menu End -->


        <!-- Topbar Start -->
        @include('manager.partials.header')
        <!-- Topbar End -->

        <!-- Search Modal -->
        @include('manager.partials.search-modal')

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->
        <div class="page-content">
            @yield('main')
            <!-- Footer Start -->
            @include('manager.partials.footer')
            <!-- end Footer -->

        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->

    </div>
    <!-- END wrapper -->

    <!-- Theme Settings -->
    @include('manager.partials.theme')

    <!-- Vendor js -->
    <script src="{{ asset('manager/js/vendor.min.js') }}"></script>

    <!-- App js -->
    <script src="{{ asset('manager/js/app.js') }}"></script>

    <!-- Apex Chart js -->
    <script src="{{ asset('manager/vendor/apexcharts/apexcharts.min.js') }}"></script>

    <!-- Vector Map Js -->
    <script src="{{ asset('manager/vendor/jsvectormap/jsvectormap.min.js') }}"></script>
    <script src="{{ asset('manager/vendor/jsvectormap/maps/world-merc.js') }}"></script>
    <script src="{{ asset('manager/vendor/jsvectormap/maps/world.js') }}"></script>

    <!-- Projects Analytics Dashboard App js -->
    <script src="{{ asset('manager/js/pages/dashboard.js') }}"></script>
    @yield('js')
</body>

</html>

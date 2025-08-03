<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $pageTitle?? 'BanquetHub' }}</title>
    
    <!-- ajax Spinner css code -->
    <link rel="stylesheet" href="{{asset('manager/css/spinner.css')}}"><link>
    <!--  Favicon -->
    <link rel="icon" href="{{ asset('manager/images/favicon/favicon.png') }}" type="image/png">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

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
        @include('manager.partials.spinner')
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
    @include('manager.partials.modal')

    <!-- ajax Spinner js code -->
    <script src="{{asset('manager/js/spinner.js')}}"></script>
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
    <script src="{{ asset('manager/js/logout.js') }}"></script>

    @yield('js')
</body>

</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $pageTitle . ' Page' ?? 'BanquetHub' }}</title>

    <!-- ajax Spinner css code -->
    <link rel="stylesheet" href="{{ asset('customer/css/spinner.css') }}">
    <!--  Favicon -->
    <link rel="icon" href="{{ asset('customer/img/favicon/favicon.png') }}" type="image/png">
    <!-- Fonts -->
    <link href="{{ asset('customer/fonts.googleapis.com/index.html') }}" rel="preconnect">
    <link href="{{ asset('customer/fonts.googleapis.com/css2485a.css') }}" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('customer/vendors/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('customer/vendors/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('customer/vendors/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('customer/vendors/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    <link href="{{ asset('customer/vendors/glightbox/css/glightbox.min.css') }}" rel="stylesheet">

    <!-- Toastr CSS File-->
    <link rel="stylesheet" href="{{ asset('customer/toastr/toastr.min.css') }}">

    <!-- Main CSS File -->
    <link href="{{ asset('customer/css/main.css') }}" rel="stylesheet">
    @yield('css')
</head>

<body class="index-page">
    @include('customer.partials.spinner')

    @include('customer.partials.header')

    @yield('main')

    @include('customer.partials.footer')

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

            
    <!-- ajax Spinner js code -->
    <script src="{{ asset('customer/js/spinner.js') }}"></script>
    <!-- Vendor JS Files -->
    <script src="{{ asset('customer/vendors/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('customer/vendors/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('customer/vendors/aos/aos.js') }}"></script>
    <script src="{{ asset('customer/vendors/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('customer/vendors/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('customer/vendors/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('customer/vendors/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('customer/vendors/glightbox/js/glightbox.min.js') }}"></script>

    <!-- JQuery File  -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Toastr JS File-->
    <script src="{{ asset('customer/toastr/toastr.min.js') }}"></script>

    <!-- Main JS File -->
    <script src="{{ asset('customer/js/main.js') }}"></script>
    @include('customer.partials.toastr')
    @yield('js')
</body>

</html>

@extends('customer.layout.app')
@section('css')
    <style>
        .form-title {
            text-align: center;
            margin-bottom: 15px;
            color: #004d5c;
        }

        .contact .form-container-overlap {
            margin-top: -50px;
        }
    </style>
@endsection
@section('main')
    <!-- Page Title -->
    <div class="page-title dark-background" data-aos="fade"
        style="background-image: url({{ asset('customer/img/travel/showcase-8.webp') }});">
        <div class="container position-relative">
            <h1>Login</h1>
            <p>Esse dolorum voluptatum ullam est sint nemo et est ipsa porro placeat quibusdam quia assumenda numquam
                molestias.</p>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="index.html">Home</a></li>
                    <li class="current">{{ $pageTitle ?? 'BanquetHub' }}</li>
                </ol>
            </nav>
        </div>
    </div><!-- End Page Title -->

    <!-- Login Section -->
    <section id="contact" class="contact section">

        <div class="container form-container-overlap">
            <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="300">
                <div class="col-lg-10">
                    <div class="contact-form-wrapper">
                        <h2 class="form-title">{{ $pageTitle ?? 'BanquetHub' }}</h2>

                        <form id="loginForm" method="POST">
                            <div class="row g-3">
                                <div class="col-md-12" id="emaiAddressContainer">
                                    <div class="form-group">
                                        <div class="input-with-icon">
                                            <i class="bi bi-envelope"></i>
                                            <input type="text" class="form-control" name="email"
                                                placeholder="Email Address">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="input-with-icon">
                                            <i class="bi bi-key"></i>
                                            <input type="password" class="form-control" name="password"
                                                placeholder="Password">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-5 text-center">
                                    <button type="submit" class="btn btn-primary btn-submit">Login</button>
                                </div>

                                <div class="col-md-5">
                                    <p>Don't have an account? <a href="{{ route('customer.signup') }}">Sign up</a></p>
                                    <p><a href="{{route('customer.show-link-request-form')}}">Forget Password</a></p>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

        </div>

    </section><!-- /Login Section -->
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            toastr.options = {
                "closeButton": false,
                "debug": false,
                "newestOnTop": false,
                "progressBar": true,
                "positionClass": "toast-top-center",
                "preventDuplicates": true,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "7000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
            // ✅ Setup CSRF token for all AJAX
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            const $form = $('#loginForm');

            $form.on('submit', function(e) {
                e.preventDefault();
                $('#preloader').show(); // Show preloader before sending

                let formData = $form.serialize();

                $.ajax({
                    url: '{{ route('customer.login-user') }}',
                    type: "POST",
                    data: formData,
                    success: function(response) {
                        $('#preloader').hide(); // Hide preloader
                        $form[0].reset(); // Reset form
                        toastr.success(response.success);
                        if (response.user_type == 'customer') {
                            window.location.href = '{{ route('customer') }}'
                        } else if (response.user_type == 'banquet_manager') {
                            window.location.href = '{{ route('manager') }}'
                        }
                    },
                    error: function(xhr) {
                        $('#preloader').hide(); // Always hide preloader
                        if (xhr.status === 422) {
                            let errors = xhr.responseJSON.errors;
                            let errorMessages = '';

                            $.each(errors, function(key, value) {
                                errorMessages += `• ${value[0]}<br>`;
                            });
                            toastr.error(errorMessages);
                        } else if (xhr.status === 401) {
                            toastr.error(xhr.responseJSON.error);

                        }

                    }
                });
            });
        });
    </script>
@endsection

@extends('customer.layout.app')
@section('css')
    <style>
        .form-title {
            text-align: center;
            margin-bottom: 15px;
            color: #004d5c;
        }

        .tabs {
            text-align: center;
            margin-bottom: 25px;
        }

        .tab {
            border: none;
            background: none;
            color: #004d5c;
            font-weight: bold;
            padding: 10px 20px;
            margin: 0 10px;
            cursor: pointer;
            border-bottom: 2px solid transparent;
            transition: 0.3s;
        }

        .tab.active {
            border-bottom: 3px solid #00a5c0;
        }

        .contact .form-container-overlap {
            margin-top: -50px;
        }
    </style>
@endsection
@section('main')
    <!-- Page Title -->
    <div class="page-title dark-background" data-aos="fade"
        style="background-image: url({{ asset('customer/img/page_title/page_title1\.jpg') }});">
        <div class="container position-relative">
            <h1>{{ $pageTitle ?? 'BanquetHub' }}</h1>
            <p>Join us today! Create an account to unlock access to exclusive features, and a seamless
                experience. Signing up is quick and easy—just fill in your details below to get started</p>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="{{route('customer')}}">Home</a></li>
                    <li class="current">{{ $pageTitle ?? 'BanquetHub' }}</li>
                </ol>
            </nav>
        </div>
    </div><!-- End Page Title -->

    <!-- Signup Section -->
    <section id="contact" class="contact section">

        <div class="container form-container-overlap">
            <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="300">
                <div class="col-lg-10">
                    <div class="contact-form-wrapper">
                        <h2 class="form-title">Signup</h2>
                        <div class="tabs">
                            <button id="customerBTN" class="tab active">Customer Signup</button>
                            <button id="moBTN" class="tab">Manager/Owner Signup</button>
                        </div>

                        <form id="registerForm" method="POST">
                            <input type="hidden" id="userRole" name="role" value="customer">

                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="input-with-icon">
                                            <i class="bi bi-person"></i>
                                            <input type="text" class="form-control" name="name" placeholder="Name">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6" id="banquetNameField">
                                    <div class="form-group">
                                        <div class="input-with-icon">
                                            <i class="bi bi-house-door"></i>
                                            <input type="text" class="form-control" name="banquet_name"
                                                placeholder="Banquet Name">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12" id="banquetAddressField">
                                    <div class="form-group">
                                        <div class="input-with-icon">
                                            <i class="bi bi-house"></i>
                                            <input type="text" class="form-control" name="banquet_address"
                                                placeholder="Banquet Address">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6" id="emaiAddressContainer">
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
                                            <i class="bi bi-phone"></i>
                                            <input type="text" class="form-control" name="phone" placeholder="Phone">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="input-with-icon">
                                            <i class="bi bi-key"></i>
                                            <input type="password" class="form-control" name="password"
                                                placeholder="Password">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="input-with-icon">
                                            <i class="bi bi-key-fill"></i>
                                            <input type="password" class="form-control" name="confirm_password"
                                                placeholder="Confirm Password">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-5 text-center">
                                    <button type="submit" class="btn btn-primary btn-submit">Sign up</button>
                                </div>

                                <div class="col-md-5">
                                    <p>Already have an account? <a href="{{ route('customer.login') }}">Login</a></p>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

        </div>

    </section><!-- /Signup Section -->
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
            // Setup CSRF token for all AJAX
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            const $banquetFields = $('#banquetNameField, #banquetAddressField');
            const $emailContainer = $('#emaiAddressContainer');
            const $form = $('#registerForm');
            const $roleInput = $('#userRole'); // Hidden input to store role

            $banquetFields.hide();

            $('#customerBTN').click(function() {
                $emailContainer.removeClass('col-md-12').addClass('col-md-6');
                $(this).addClass('active');
                $('#moBTN').removeClass('active');
                $banquetFields.hide();
                $roleInput.val('customer');
            });

            $('#moBTN').click(function() {
                $emailContainer.removeClass('col-md-6').addClass('col-md-12');
                $(this).addClass('active');
                $('#customerBTN').removeClass('active');
                $banquetFields.show();
                $roleInput.val('manager');
            });

            $form.on('submit', function(e) {
                e.preventDefault();
                $('#preloader').show(); // Show preloader before sending
                let formData = $form.serialize();
                let role = $roleInput.val();
                let url = "";

                if (role === 'customer') {
                    url = "{{ route('customer.signup-customer') }}";
                } else if (role === 'manager') {
                    url = "{{ route('customer.signup-manager') }}";
                } else {
                    alert('Please select a role first.');
                    return;
                }

                $.ajax({
                    url: url,
                    type: "POST",
                    data: formData,
                    success: function(response) {
                        $('#preloader').hide(); // Hide preloader on error too
                        $form[0].reset();
                        toastr.success(response.success);
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
                        }
                    }
                });
            });

        });
    </script>
@endsection

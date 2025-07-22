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
    @include('customer.partials.page-title')

    <!-- Reset Password Section -->
    <section id="contact" class="contact section">

        <div class="container form-container-overlap">
            <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="300">
                <div class="col-lg-10">
                    <div class="contact-form-wrapper">
                        <h2 class="form-title">{{ $pageTitle ?? 'BanquetHub' }}</h2>

                        <form id="resetForm" method="POST">
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

                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn btn-primary btn-submit">Send Link</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

        </div>

    </section><!-- /Reset Password Section -->
@endsection
@section('js')
    <script>
        $(document).ready(function() {

            // ✅ Setup CSRF token for all AJAX
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            const $form = $('#resetForm');

            $form.on('submit', function(e) {
                e.preventDefault();
                $('#preloader').show(); // Show preloader before sending

                let formData = $form.serialize();

                $.ajax({
                    url: '{{ route('customer.send-reset-link-email') }}',
                    type: "POST",
                    data: formData,
                    success: function(response) {
                        $('#preloader').hide(); // Hide preloader
                        $form[0].reset(); // Reset form
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
                        } else if (xhr.status === 401) {
                            toastr.error(xhr.responseJSON.error);
                        } else {
                            toastr.error('Check your Network Connection');
                        }
                    }
                });
            });
        });
    </script>
@endsection

@extends('customer.layout.app')
@section('css')
    <style>
        .btn-submit {
            padding: 12px 32px;
            border-radius: 50px;
            background: var(--accent-color);
            color: var(--contrast-color);
            border: none;
            font-size: 16px;
            font-weight: 500;
            transition: 0.3s;
            position: relative;
            overflow: hidden;
        }
    </style>
@endsection
@section('main')
    <!-- Page Title -->
    @include('customer.partials.page-title')

    <!-- Travel Booking Section -->
    <section id="travel-booking" class="travel-booking section">
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row">
                <div class="col-lg-8 order-2 order-lg-1">
                    <div class="booking-form-container">
                        <!-- Booking Form -->
                        <form class="booking-form" data-aos="fade-up" data-aos-delay="300">
                            <div class="tab-content" id="bookingTabContent">
                                <div class="form-step tab-pane fade show active" id="travel-booking-step-2" role="tabpanel">
                                    <h4>Customer and Banquet Information</h4>
                                    <div class="traveler-info">
                                        <div class="row gy-3">
                                            <div class="col-md-6">
                                                <label>Name</label>
                                                <input type="text" name="name" readonly
                                                    value="{{ Auth::guard('web')->user()->name }}" class="form-control">
                                            </div>
                                            <div class="col-md-6">
                                                <label>Email</label>
                                                <input type="text" readonly
                                                    value="{{ Auth::guard('web')->user()->email }}" name="email"
                                                    class="form-control">
                                            </div>
                                            <div class="col-md-6">
                                                <label>Phone</label>
                                                <input type="number" readonly
                                                    value="{{ Auth::guard('web')->user()->phone }}" name="phone"
                                                    class="form-control">
                                            </div>
                                            <div class="col-md-6">
                                                <label>Address</label>
                                                <input type="text" name="address" class="form-control">
                                            </div>
                                            <div class="col-md-6">
                                                <label>Event Date</label>
                                                <input type="date" name="event_date" id="event-date"
                                                    class="form-control">
                                            </div>
                                            <div class="col-md-6">
                                                <label>Event Time</label>
                                                <select name="event_time" id="event-time" class="form-select">
                                                    <option value="">Select Time</option>
                                                    <option value="Day (1 PM - 5 PM)">Day (1 PM - 5 PM)</option>
                                                    <option value="Night (9 PM - 1 AM)">Night (9 PM - 1 AM)</option>
                                                </select>
                                            </div>

                                            <div class="special-requirements">
                                                <h5>Special Requirements</h5>
                                                <div class="row gy-3">
                                                    <div class="col-12">
                                                        <textarea name="special_requirements" class="form-control" rows="3"
                                                            placeholder="Any special requests or accessibility needs..."></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn-submit">Book Now</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form><!-- End Booking Form -->
                    </div>
                </div>

                <!-- Booking Summary Sidebar -->
                <div class="col-lg-4 order-1 order-lg-2">
                    <div class="booking-summary" data-aos="fade-up" data-aos-delay="400">
                        <div class="summary-header">
                            <h4>Booking Summary</h4>
                        </div>

                        <div class="selected-tour">
                            <img src="{{ asset('manager/images/banquet_images/' . $manager->banquet->images->profile_image) }}"
                                alt="profile_image" class="img-fluid">
                            <div class="tour-info">
                                <h5>{{ $manager->banquet->name }}</h5>
                                <p id="selected-date-icon" style="display: none;">
                                    <i class="bi bi-calendar"></i> <span class="date-text"></span>
                                </p>
                                <p id="selected-time-icon" style="display: none;">
                                    <i class="bi bi-watch"></i> <span class="time-text"></span>
                                </p>
                                <p><i class="bi bi-geo-alt"></i> {{ $manager->banquet_address }}</p>
                            </div>
                        </div>

                        <div class="booking-details">
                            <div class="detail-item">
                                <span class="label">Manager/Owner:</span>
                                <span class="value">{{ $manager->name }}</span>
                            </div>
                            <div class="detail-item">
                                <span class="label">Customer:</span>
                                <span class="value">{{ Auth::guard('web')->user()->name }}</span>
                            </div>
                        </div>

                        @php
                            $rate = $manager->banquet->rental_rate;
                            $discount = $manager->banquet->discount;
                            $advance = $manager->banquet->advance_amount;
                            $discountAmount = 0;
                            $discountText = 'No discount';
                            $totalAmount = $rate;

                            if ($discount > 0) {
                                $discountAmount = ($rate * $discount) / 100;
                                $totalAmount = $rate - $discountAmount;
                                $discountText =
                                    $discount . '% Discount (−' . number_format($discountAmount, 0) . ' PKR)';
                            }
                        @endphp

                        <div class="price-breakdown">
                            <div class="price-item">
                                <span class="description">Base Rental Rate</span>
                                <span class="amount">{{ number_format($rate, 0) }} PKR</span>
                            </div>

                            <div class="price-item">
                                <span class="description">Discount</span>
                                <span class="amount">{{ $discountText }}</span>
                            </div>

                            <div class="price-item">
                                <span class="description">Advance Payment (Pay Now)</span>
                                <span class="amount">{{ number_format($advance, 0) }} PKR</span>
                            </div>

                            <div class="price-total">
                                <span class="description">Total Amount (After Discount)</span>
                                <span class="amount">{{ number_format($totalAmount, 0) }} PKR</span>
                            </div>

                            @php
                                $remainingAmount = $totalAmount - $advance;
                            @endphp
                            <div class="price-item">
                                <span class="description">Remaining Amount (Pay at Banquet)</span>
                                <span class="amount">{{ number_format($remainingAmount, 0) }} PKR</span>
                            </div>

                            <div class="note mt-2">
                                <small class="text-muted">
                                    <i class="bi bi-info-circle"></i>
                                    You will pay {{ number_format($advance, 0) }} PKR now, and
                                    {{ number_format($remainingAmount, 0) }} PKR at the banquet.
                                </small>
                            </div>
                        </div>
                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-success w-100 py-2" style="font-size: 18px;">
                                Pay Now – {{ number_format($advance, 0) }} PKR
                            </button>
                        </div>

                        <div class="help-section">
                            <h5>Need Help?</h5>
                            <p>Our support team is available to assist you.</p>
                            <div class="contact-info">
                                <p><i class="bi bi-telephone"></i> +1 (555) 123-4567</p>
                                <p><i class="bi bi-envelope"></i> <a
                                        href="mailto:info@banquetbooking.com">info@banquetbooking.com</a></p>
                            </div>
                            <div class="support-hours">
                                <small>Available 24/7</small>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section><!-- /Travel Booking Section -->
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#event-date').on('change', function() {
                let selectedDateVal = $(this).val();

                if (selectedDateVal) {
                    let selectedDate = new Date(selectedDateVal);
                    let options = {
                        year: 'numeric',
                        month: 'long',
                        day: 'numeric'
                    };
                    let formattedDate = selectedDate.toLocaleDateString('en-US', options);

                    $('#selected-date-icon .date-text').text(formattedDate);
                    $('#selected-date-icon').fadeIn();
                } else {
                    $('#selected-date-icon').fadeOut();
                }
            });

            $('#event-time').on('change', function() {
                let selectedTime = $(this).val();

                if (selectedTime) {
                    $('#selected-time-icon .time-text').text(selectedTime);
                    $('#selected-time-icon').fadeIn();
                } else {
                    $('#selected-time-icon').fadeOut();
                }
            });
            $('.booking-form').on('submit', function(e) {
                e.preventDefault();

                let form = $(this);
                let formData = form.serialize();

                $.ajax({
                    url: "{{ route('customer.book-banquet') }}",
                    type: "POST",
                    data: formData,
                    beforeSend: function() {
                        $('#ajax-spinner').removeClass('d-none');
                    },
                    success: function(response) {
                        if (response.status == 'success') {
                            $('#ajax-spinner').addClass('d-none');
                            form[0].reset(); 
                            toastr.success(response.message);
                        }
                    },
                    error: function(xhr) {
                        $('#ajax-spinner').addClass('d-none');
                        const {
                            status,
                            responseJSON
                        } = xhr;
                        const showError = msg => toastr.error(msg);

                        if (status === 422) {
                            const errors = responseJSON.errors;
                            const messages = Object.values(errors).map(msg => `• ${msg[0]}`)
                                .join('<br>');
                            showError(messages);
                        } else {
                            showError('Check your Network Connection');
                        }
                    }
                });
            });
        });
    </script>
@endsection

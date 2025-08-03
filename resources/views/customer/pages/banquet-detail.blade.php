@extends('customer.layout.app')
@section('css')
    <style>
        .btn-submit {
            width: 100%;
            background: var(--accent-color);
            color: var(--contrast-color);
            padding: 15px;
            border: none;
            border-radius: 10px;
            font-size: 1.1rem;
            font-weight: 600;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .line-clamp-3 {
            overflow: hidden;
            display: -webkit-box;
            -webkit-line-clamp: 1;
            -webkit-box-orient: vertical;
        }

        .hero-image-wrapper {
            max-height: 500px;
            overflow: hidden;
        }

        .hero-image-wrapper img {
            object-fit: cover;
            height: 100%;
            width: 100%;
        }
    </style>
@endsection
@section('main')
    <!-- Travel Tour Details Section -->
    <section id="travel-tour-details" class="travel-tour-details section">

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <!-- Hero Section -->
            <div class="tour-hero">
                <div class="hero-image-wrapper">
                    <img src="{{ asset('manager/images/banquet_images/' . $manager->banquet->images->cover_image) }}"
                        srcset="{{ asset('manager/images/banquet_images/' . $manager->banquet->images->cover_image) }} 1x,
            {{ asset('manager/images/banquet_images/' . $manager->banquet->images->cover_image) }} 2x"
                        class="img-fluid w-100" alt="Banquet Cover" />

                    <div class="hero-overlay">
                        <div class="hero-content">
                            <h1>{{ $manager->banquet->name }}</h1>
                            <div class="hero-meta">
                                <span class="duration"><i class="bi bi-calendar"></i> 12 Days</span>
                                <span class="destination"><i class="bi bi-geo-alt"></i>
                                    {{ $manager->banquet->address }}</span>
                                <span class="rating"><i class="bi bi-star-fill"></i> 4.8 (124 reviews)</span>
                            </div>
                            <p class="hero-tagline line-clamp-3">{{ $manager->banquet->description }}</p>
                            <a href="#booking" class="btn-book">Check Availability</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Gallery -->
            <div class="tour-gallery" data-aos="fade-up" data-aos-delay="700">
                <h2>Photo Gallery</h2>
                <div class="gallery-grid">
                    @php

                        $galleryFields = ['img_1', 'img_2', 'img_3', 'img_4', 'img_5', 'img_6'];
                    @endphp

                    @foreach ($galleryFields as $field)
                        @php
                            $image = $manager->banquet->images->$field ?? null;
                        @endphp

                        @if ($image)
                            <div class="gallery-item">
                                <a href="{{ asset('manager/images/banquet_images/' . $image) }}" class="glightbox">
                                    <img src="{{ asset('manager/images/banquet_images/' . $image) }}"
                                        alt="{{ $field }}" class="img-fluid" loading="lazy">
                                </a>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>

            <!-- Tour Overview -->
            <div class="tour-overview" data-aos="fade-up" data-aos-delay="200">
                <div class="row">
                    <div class="col-lg-8">
                        <h2>About Banquet</h2>
                        <p>{{ $manager->banquet->description }}</p>
                    </div>
                    <div class="col-lg-4">
                        <div class="tour-highlights">
                            <h3>Banquet Manager Details</h3>
                            <ul>
                                <li><i class="bi bi-check-circle"></i>{{ $manager->name }}</li>
                                <li><i class="bi bi-check-circle"></i>{{ $manager->email }}</li>
                                <li><i class="bi bi-check-circle"></i>{{ $manager->phone }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>



            <!-- Inclusions -->
            <div class="tour-inclusions" data-aos="fade-up" data-aos-delay="400">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="included-section">
                            <h3><i class="bi bi-check-circle-fill"></i> What's Included</h3>
                            <ul class="inclusion-list included">
                                @if ($manager->banquet->parking_available === 'Yes')
                                    <li><i class="bi bi-check"></i> Parking Available</li>
                                @endif

                                @if ($manager->banquet->personal_caterer_available === 'Yes')
                                    <li><i class="bi bi-check"></i> Personal Caterer Available</li>
                                @endif

                                @if ($manager->banquet->personal_decorator_available === 'Yes')
                                    <li><i class="bi bi-check"></i> Personal Decorator Available</li>
                                @endif

                                @if ($manager->banquet->outside_decorator_allowed === 'Yes')
                                    <li><i class="bi bi-check"></i> Outside Decorator Allowed</li>
                                @endif

                                @if ($manager->banquet->ac === 'Yes')
                                    <li><i class="bi bi-check"></i> Air Conditioning</li>
                                @endif

                                @if ($manager->banquet->screen_available === 'Yes')
                                    <li><i class="bi bi-check"></i> Screen Available</li>
                                @endif

                                @if ($manager->banquet->sound_system_available === 'Yes')
                                    <li><i class="bi bi-check"></i> Sound System Available</li>
                                @endif

                                @if ($manager->banquet->bridal_room_available === 'Yes')
                                    <li><i class="bi bi-check"></i> Bridal Room Available</li>
                                @endif

                                @if ($manager->banquet->fire_safety === 'Yes')
                                    <li><i class="bi bi-check"></i> Fire Safety Measures</li>
                                @endif

                                @if ($manager->banquet->security_personnel === 'Yes')
                                    <li><i class="bi bi-check"></i> Security Personnel</li>
                                @endif
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="excluded-section">
                            <h3><i class="bi bi-x-circle-fill"></i> What's Not Included</h3>
                            <ul class="inclusion-list excluded">
                                @if ($manager->banquet->parking_available === 'No')
                                    <li><i class="bi bi-x"></i> Parking Not Available</li>
                                @endif

                                @if ($manager->banquet->personal_caterer_available === 'No')
                                    <li><i class="bi bi-x"></i> Personal Caterer Not Available</li>
                                @endif

                                @if ($manager->banquet->personal_decorator_available === 'No')
                                    <li><i class="bi bi-x"></i> Personal Decorator Not Available</li>
                                @endif

                                @if ($manager->banquet->outside_decorator_allowed === 'No')
                                    <li><i class="bi bi-x"></i> Outside Decorator Not Allowed</li>
                                @endif

                                @if ($manager->banquet->ac === 'No')
                                    <li><i class="bi bi-x"></i> No Air Conditioning</li>
                                @endif

                                @if ($manager->banquet->screen_available === 'No')
                                    <li><i class="bi bi-x"></i> No Screen Available</li>
                                @endif

                                @if ($manager->banquet->sound_system_available === 'No')
                                    <li><i class="bi bi-x"></i> No Sound System</li>
                                @endif

                                @if ($manager->banquet->bridal_room_available === 'No')
                                    <li><i class="bi bi-x"></i> Bridal Room Not Available</li>
                                @endif

                                @if ($manager->banquet->fire_safety === 'No')
                                    <li><i class="bi bi-x"></i> No Fire Safety Measures</li>
                                @endif

                                @if ($manager->banquet->security_personnel === 'No')
                                    <li><i class="bi bi-x"></i> No Security Personnel</li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pricing -->
            <div class="tour-pricing" data-aos="fade-up" data-aos-delay="500">
                <h2>Pricing &amp; Dates</h2>
                <div class="pricing-table">
                    <div class="pricing-header">
                        <div class="price-item">
                            <h3>Rental Rates</h3>
                            <div class="price-amount">{{ number_format($manager->banquet->rental_rate) }} PKR</div>
                        </div>
                    </div>
                    <div class="pricing-details" id="booking">
                        <div class="row">
                            @php
                                $rental_amount = $manager->banquet->rental_rate;
                                $advance_amount = $manager->banquet->advance_amount;
                                $discount = $manager->banquet->discount ?? 0;

                                // Calculate discounted rental amount if discount > 0
                                $discounted_price =
                                    $discount > 0
                                        ? $rental_amount - ($rental_amount * $discount) / 100
                                        : $rental_amount;

                                $remaining_amount = $discounted_price - $advance_amount;
                            @endphp

                            <div class="col-lg-4">
                                <div class="price-type">
                                    @if ($discount > 0)
                                        <h4>{{ $discount }}% Discount</h4>
                                        <div class="price">{{ number_format($discounted_price) }} PKR</div>
                                    @else
                                        <h4>No Discount Available</h4>
                                        <div class="price">{{ number_format($rental_amount) }} PKR</div>
                                    @endif
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="price-type">
                                    <h4>Advance Amount</h4>
                                    <div class="price">{{ number_format($advance_amount) }} PKR</div>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="price-type">
                                    <h4>Remaining Amount</h4>
                                    <div class="price">{{ number_format($remaining_amount) }} PKR</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="available-dates">
                        <h3>Unavailable Dates of Banquets</h3>
                        {{-- <div class="dates-grid">
                            <div class="date-option">
                                <div class="date">May 15-26</div>
                                <div class="availability">6 spots left</div>
                            </div>
                            <div class="date-option">
                                <div class="date">June 12-23</div>
                                <div class="availability">Available</div>
                            </div>
                            <div class="date-option">
                                <div class="date">July 10-21</div>
                                <div class="availability">Almost full</div>
                            </div>
                            <div class="date-option">
                                <div class="date">August 14-25</div>
                                <div class="availability">Available</div>
                            </div>
                            <div class="date-option">
                                <div class="date">September 18-29</div>
                                <div class="availability">Available</div>
                            </div>
                            <div class="date-option">
                                <div class="date">October 9-20</div>
                                <div class="availability">11 spots left</div>
                            </div>
                        </div> --}}
                        <div class=" dates-grid">
                            <div class="date-option">
                                <div class="date">No bookings found — this banquet is fully available on all dates.</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn-submit" data-id="{{ $manager->banquet->id }}" id="submitBtn">Proceed to Booking</button>
        </div>

    </section><!-- /Travel Tour Details Section -->
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            $('.btn-book').on('click', function(e) {
                e.preventDefault();
                var target = $($(this).attr('href'));
                if (target.length) {
                    $('html, body').animate({
                        scrollTop: target.offset().top -
                            100 // 
                    }, 800);
                }
            });
            $('#submitBtn').on('click', function() {
                let banquetId = $(this).data('id');
                window.location.href = `/customer/banquets-booking/${banquetId}`;
            });
        });
    </script>
@endsection

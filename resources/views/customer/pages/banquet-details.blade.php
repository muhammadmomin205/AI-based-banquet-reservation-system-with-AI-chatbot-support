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
    </style>
@endsection
@section('main')
    <!-- Travel Tour Details Section -->
    <section id="travel-tour-details" class="travel-tour-details section">

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <!-- Hero Section -->
            <div class="tour-hero">
                <div class="hero-image-wrapper">
                    <img src="https://bootstrapmade.com/content/demo/Tour/assets/img/travel/showcase-9.webp"
                        alt="Mediterranean Adventure Tour" class="img-fluid w-100">
                    <div class="hero-overlay">
                        <div class="hero-content">
                            <h1>Mediterranean Adventure</h1>
                            <div class="hero-meta">
                                <span class="duration"><i class="bi bi-calendar"></i> 12 Days</span>
                                <span class="destination"><i class="bi bi-geo-alt"></i> Italy, Greece &amp; Turkey</span>
                                <span class="rating"><i class="bi bi-star-fill"></i> 4.8 (124 reviews)</span>
                            </div>
                            <p class="hero-tagline">Experience ancient wonders, pristine beaches, and vibrant cultures
                                across three magnificent countries</p>
                            <a href="#booking" class="btn-book">Check Availability</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Gallery -->
            <div class="tour-gallery" data-aos="fade-up" data-aos-delay="700">
                <h2>Photo Gallery</h2>
                <div class="gallery-grid">
                    <div class="gallery-item">
                        <a href="https://bootstrapmade.com/content/demo/Tour/assets/img/travel/destination-1.webp"
                            class="glightbox">
                            <img src="https://bootstrapmade.com/content/demo/Tour/assets/img/travel/destination-1.webp"
                                alt="Venice Canals" class="img-fluid" loading="lazy">
                        </a>
                    </div>
                    <div class="gallery-item">
                        <a href="{{ asset('customer/img/travel/destination-2.webp') }}" class="glightbox">
                            <img src="{{ asset('customer/img/travel/destination-2.webp') }}" alt="Florence Cathedral"
                                class="img-fluid" loading="lazy">
                        </a>
                    </div>
                    <div class="gallery-item">
                        <a href="{{ asset('customer/img/travel/destination-3.webp') }}" class="glightbox">
                            <img src="{{ asset('customer/img/travel/destination-3.webp') }}" alt="Roman Colosseum"
                                class="img-fluid" loading="lazy">
                        </a>
                    </div>
                    <div class="gallery-item">
                        <a href="{{ asset('customer/img/travel/destination-4.webp') }}" class="glightbox">
                            <img src="{{ asset('customer/img/travel/destination-4.webp') }}" alt="Santorini Sunset"
                                class="img-fluid" loading="lazy">
                        </a>
                    </div>
                    <div class="gallery-item">
                        <a href="https://bootstrapmade.com/content/demo/Tour/assets/img/travel/destination-5.webp"
                            class="glightbox">
                            <img src="https://bootstrapmade.com/content/demo/Tour/assets/img/travel/destination-5.webp"
                                alt="Hagia Sophia" class="img-fluid" loading="lazy">
                        </a>
                    </div>
                    <div class="gallery-item">
                        <a href="{{ asset('customer/img/travel/destination-6.webp') }}" class="glightbox">
                            <img src="{{ asset('customer/img/travel/destination-6.webp') }}" alt="Mediterranean Cuisine"
                                class="img-fluid" loading="lazy">
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- Tour Overview -->
            <div class="tour-overview" data-aos="fade-up" data-aos-delay="200">
                <div class="row">
                    <div class="col-lg-8">
                        <h2>Tour Overview</h2>
                        <p>Embark on an unforgettable journey through the heart of the Mediterranean, where ancient
                            civilizations left their mark on stunning landscapes. This comprehensive tour takes you from the
                            romantic canals of Venice to the sun-soaked islands of Santorini, culminating in the magical
                            city of Istanbul where East meets West.</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                            laboris nisi ut aliquip ex ea commodo consequat.</p>
                    </div>
                    <div class="col-lg-4">
                        <div class="tour-highlights">
                            <h3>Tour Highlights</h3>
                            <ul>
                                <li><i class="bi bi-check-circle"></i> 4-Star Boutique Hotels</li>
                                <li><i class="bi bi-check-circle"></i> Expert Local Guides</li>
                                <li><i class="bi bi-check-circle"></i> Daily Breakfast Included</li>
                                <li><i class="bi bi-check-circle"></i> Small Group (Max 16)
                                </li>
                                <li><i class="bi bi-check-circle"></i> UNESCO World Heritage Sites</li>
                                <li><i class="bi bi-check-circle"></i> Cultural Experiences</li>
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
                                <li><i class="bi bi-check"></i> Round-trip flights between destinations</li>
                                <li><i class="bi bi-check"></i> 11 nights accommodation (4-star hotels)</li>
                                <li><i class="bi bi-check"></i> Daily breakfast at all hotels</li>
                                <li><i class="bi bi-check"></i> Professional English-speaking guides</li>
                                <li><i class="bi bi-check"></i> All entrance fees to attractions</li>
                                <li><i class="bi bi-check"></i> Private transportation</li>
                                <li><i class="bi bi-check"></i> Welcome and farewell dinners</li>
                                <li><i class="bi bi-check"></i> Gondola ride in Venice</li>
                                <li><i class="bi bi-check"></i> Wine tasting in Santorini</li>
                                <li><i class="bi bi-check"></i> Bosphorus cruise in Istanbul</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="excluded-section">
                            <h3><i class="bi bi-x-circle-fill"></i> What's Not Included</h3>
                            <ul class="inclusion-list excluded">
                                <li><i class="bi bi-x"></i> International flights to/from departure city</li>
                                <li><i class="bi bi-x"></i> Lunch and dinner (except specified)</li>
                                <li><i class="bi bi-x"></i> Personal expenses and shopping</li>
                                <li><i class="bi bi-x"></i> Travel insurance (recommended)</li>
                                <li><i class="bi bi-x"></i> Tips for guides and drivers</li>
                                <li><i class="bi bi-x"></i> Optional activities and excursions</li>
                                <li><i class="bi bi-x"></i> Alcoholic beverages (except wine tasting)</li>
                                <li><i class="bi bi-x"></i> Visa fees if required</li>
                                <li><i class="bi bi-x"></i> Single supplement for solo travelers</li>
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
                            <h3>Starting from</h3>
                            <div class="price-amount">$3,299</div>
                            <p>per person (double occupancy)</p>
                        </div>
                    </div>
                    <div class="pricing-details">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="price-type">
                                    <h4>Double Occupancy</h4>
                                    <div class="price">$3,299</div>
                                    <p>per person</p>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="price-type">
                                    <h4>Single Supplement</h4>
                                    <div class="price">+$899</div>
                                    <p>additional</p>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="price-type">
                                    <h4>Group Discount</h4>
                                    <div class="price">-$200</div>
                                    <p>for 6+ people</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="available-dates">
                        <h3>2024 Departure Dates</h3>
                        <div class="dates-grid">
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
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn-submit">Send Booking Request</button>
        </div>

    </section><!-- /Travel Tour Details Section -->
@endsection
@section('js')
@endsection

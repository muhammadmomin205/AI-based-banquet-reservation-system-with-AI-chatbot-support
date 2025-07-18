@extends('customer.layout.app')
@section('css')
@endsection
@section('main')
    <!-- Page Title -->
    <div class="page-title dark-background" data-aos="fade"
        style="background-image: url({{ asset('customer/img/page_title/page_title1\.jpg') }});">
        <div class="container position-relative">
            <h1>{{ $pageTitle ?? 'BanquetHub' }}</h1>
            <p>Welcome back! Please enter your credentials to access your account. If you don’t have an account yet, feel
                free to sign up and become part of our community. Forgot your password? Don’t worry—you can easily reset it
                below</p>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="{{ route('customer') }}">Home</a></li>
                    <li class="current">{{ $pageTitle ?? 'BanquetHub' }}</li>
                </ol>
            </nav>
        </div>
    </div><!-- End Page Title -->

    <!-- Featured Tours Section -->
    <section id="featured-tours" class="featured-tours section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Featured Tours</h2>
            <div><span>Check Our</span> <span class="description-title">Featured Tours</span></div>
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row gy-4">
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="tour-card">
                        <div class="tour-image">
                            <img src="{{ asset('customer/img/travel/tour-1.webp') }}" alt="Serene Beach Retreat"
                                class="img-fluid" loading="lazy">
                            <div class="tour-badge">Top Rated</div>
                            <div class="tour-price">$2,150</div>
                        </div>
                        <div class="tour-content">
                            <h4>Serene Beach Retreat</h4>
                            <div class="tour-meta">
                                <span class="duration"><i class="bi bi-clock"></i> 8 Days</span>
                                <span class="group-size"><i class="bi bi-people"></i> Max 6</span>
                            </div>
                            <p>Mauris ipsum neque, cursus ac ipsum at, iaculis facilisis ligula. Suspendisse non sapien
                                vel enim cursus semper.</p>
                            <div class="tour-highlights">
                                <span>Maldives</span>
                                <span>Seychelles</span>
                                <span>Bora Bora</span>
                            </div>
                            <div class="tour-action">
                                <a href="booking.html" class="btn-book">Book Now</a>
                                <div class="tour-rating">
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-half"></i>
                                    <span>4.8 (95)</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- End Tour Item -->

                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="tour-card">
                        <div class="tour-image">
                            <img src="{{ asset('customer/img/travel/tour-2.webp') }}" alt="Arctic Expedition"
                                class="img-fluid" loading="lazy">
                            <div class="tour-badge limited">Only 3 Spots!</div>
                            <div class="tour-price">$5,700</div>
                        </div>
                        <div class="tour-content">
                            <h4>Arctic Wilderness Expedition</h4>
                            <div class="tour-meta">
                                <span class="duration"><i class="bi bi-clock"></i> 10 Days</span>
                                <span class="group-size"><i class="bi bi-people"></i> Max 8</span>
                            </div>
                            <p>Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;
                                Donec dictum non massa nec fermentum.</p>
                            <div class="tour-highlights">
                                <span>Greenland</span>
                                <span>Iceland</span>
                                <span>Norway</span>
                            </div>
                            <div class="tour-action">
                                <a href="booking.html" class="btn-book">Book Now</a>
                                <div class="tour-rating">
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star"></i>
                                    <span>4.6 (55)</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- End Tour Item -->

                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
                    <div class="tour-card">
                        <div class="tour-image">
                            <img src="{{ asset('customer/img/travel/tour-4.webp') }}" alt="Desert Safari" class="img-fluid"
                                loading="lazy">
                            <div class="tour-badge new">Newly Added</div>
                            <div class="tour-price">$1,400</div>
                        </div>
                        <div class="tour-content">
                            <h4>Sahara Desert Discovery</h4>
                            <div class="tour-meta">
                                <span class="duration"><i class="bi bi-clock"></i> 5 Days</span>
                                <span class="group-size"><i class="bi bi-people"></i> Max 10</span>
                            </div>
                            <p>Pellentesque euismod tincidunt turpis ac tristique. Phasellus vitae lacus in enim mollis
                                facilisis vel quis ex. In hac habitasse platea dictumst.</p>
                            <div class="tour-highlights">
                                <span>Morocco</span>
                                <span>Egypt</span>
                                <span>Dubai</span>
                            </div>
                            <div class="tour-action">
                                <a href="booking.html" class="btn-book">Book Now</a>
                                <div class="tour-rating">
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <span>4.9 (72)</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- End Tour Item -->

                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="tour-card">
                        <div class="tour-image">
                            <img src="{{ asset('customer/img/travel/tour-5.webp') }}" alt="Coastal Explorer"
                                class="img-fluid" loading="lazy">
                            <div class="tour-badge">Popular Choice</div>
                            <div class="tour-price">$1,980</div>
                        </div>
                        <div class="tour-content">
                            <h4>Mediterranean Coastal Cruise</h4>
                            <div class="tour-meta">
                                <span class="duration"><i class="bi bi-clock"></i> 9 Days</span>
                                <span class="group-size"><i class="bi bi-people"></i> Max 15</span>
                            </div>
                            <p>Nullam lacinia justo eget ex sodales, vel finibus orci aliquet. Donec auctor, elit ut
                                molestie gravida, magna mi molestie nisi.</p>
                            <div class="tour-highlights">
                                <span>Greece</span>
                                <span>Croatia</span>
                                <span>Italy</span>
                            </div>
                            <div class="tour-action">
                                <a href="booking.html" class="btn-book">Book Now</a>
                                <div class="tour-rating">
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-half"></i>
                                    <span>4.7 (110)</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- End Tour Item -->

                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="tour-card">
                        <div class="tour-image">
                            <img src="{{ asset('customer/img/travel/tour-6.webp') }}" alt="Rainforest Trek"
                                class="img-fluid" loading="lazy">
                            <div class="tour-badge cultural">Eco-Friendly</div>
                            <div class="tour-price">$2,650</div>
                        </div>
                        <div class="tour-content">
                            <h4>Amazon Rainforest Trek</h4>
                            <div class="tour-meta">
                                <span class="duration"><i class="bi bi-clock"></i> 12 Days</span>
                                <span class="group-size"><i class="bi bi-people"></i> Max 10</span>
                            </div>
                            <p>Quisque dictum felis eu tortor mollis, quis tincidunt arcu pharetra. A pellentesque sit
                                amet, consectetur adipiscing elit.</p>
                            <div class="tour-highlights">
                                <span>Brazil</span>
                                <span>Ecuador</span>
                                <span>Peru</span>
                            </div>
                            <div class="tour-action">
                                <a href="booking.html" class="btn-book">Book Now</a>
                                <div class="tour-rating">
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star"></i>
                                    <span>4.5 (88)</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- End Tour Item -->

                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
                    <div class="tour-card">
                        <div class="tour-image">
                            <img src="{{ asset('customer/img/travel/tour-8.webp') }}" alt="Patagonian Peaks"
                                class="img-fluid" loading="lazy">
                            <div class="tour-badge adventure">Adventure Seekers</div>
                            <div class="tour-price">$3,950</div>
                        </div>
                        <div class="tour-content">
                            <h4>Patagonian Peaks &amp; Glaciers</h4>
                            <div class="tour-meta">
                                <span class="duration"><i class="bi bi-clock"></i> 14 Days</span>
                                <span class="group-size"><i class="bi bi-people"></i> Max 10</span>
                            </div>
                            <p>Vivamus eget semper neque. Ut porttitor mi at odio egestas, non vestibulum est malesuada.
                                Nunc facilisis in felis eget efficitur.</p>
                            <div class="tour-highlights">
                                <span>Argentina</span>
                                <span>Chile</span>
                                <span>Ushuaia</span>
                            </div>
                            <div class="tour-action">
                                <a href="booking.html" class="btn-book">Book Now</a>
                                <div class="tour-rating">
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <span>4.9 (60)</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- End Tour Item -->

            </div>
        </div>

    </section><!-- /Featured Tours Section -->
@endsection
@section('js')
@endsection

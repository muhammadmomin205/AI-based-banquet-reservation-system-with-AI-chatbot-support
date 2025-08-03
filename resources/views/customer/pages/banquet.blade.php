@extends('customer.layout.app')
@section('css')
    <style>
        .line-clamp-3 {
            overflow: hidden;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
        }
    </style>
@endsection
@section('main')
    @include('customer.partials.page-title')

    <!-- Featured Tours Section -->
    <section id="featured-tours" class="featured-tours section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Latest Banquets</h2>
            <div><span>Check Our</span> <span class="description-title">Latest Banquets</span></div>
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row gy-4">
                @foreach ($banquets as $manager)
                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="tour-card" data-id="{{ $manager->banquet->id }}">
                            <div class="tour-image">
                                <img src="{{ asset('manager/images/banquet_images/' . $manager->banquet->images->profile_image) }}"
                                    alt="Serene Beach Retreat" class="img-fluid" loading="lazy">
                                <div class="tour-badge">Top Rated</div>
                                <div class="tour-price">{{ number_format($manager->banquet->rental_rate) }} PKR</div>
                            </div>
                            <div class="tour-content">
                                <h4>{{ $manager->banquet->name }}</h4>
                                <div class="tour-meta">
                                    <span class="duration">
                                        <i class="bi bi-clock"></i>
                                        {{ \Carbon\Carbon::createFromFormat('H:i:s', $manager->banquet->opening_time)->format('h:i A') . ' To ' . \Carbon\Carbon::createFromFormat('H:i:s', $manager->banquet->closing_time)->format('h:i A') }}
                                    </span>
                                    <span class="group-size"><i
                                            class="bi bi-people"></i>{{ $manager->banquet->guest_capacity . ' guests' }}</span>
                                </div>
                                <p class="line-clamp-3">{{ $manager->banquet->description }}</p>
                                <div class="tour-highlights">
                                    <span>{{ $manager->name }}</span>
                                    <span>
                                        <a href="https://wa.me/{{ $manager->phone }}" target="_blank">
                                            <i class="bi bi-whatsapp"></i> WhatsApp
                                        </a>
                                    </span>

                                    <span>
                                        <a href="mailto:{{ $manager->email }}">
                                            <i class="bi bi-envelope"></i> Email
                                        </a>
                                    </span>

                                </div>
                                <div class="tour-action">
                                    <a href="{{url('/customer/banquets-details/'.$manager->banquet->id )}}" class="btn-book">See Details</a>
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
                @endforeach
            </div>
        </div>

    </section><!-- /Featured Tours Section -->
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            $('.tour-card').on('click', function() {
                let banquetId = $(this).data('id');
                window.location.href = `/customer/banquets-details/${banquetId}`;
            });
        });
    </script>
@endsection

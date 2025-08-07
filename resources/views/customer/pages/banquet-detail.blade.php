@extends('customer.layout.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('customer/css/banquet-details.css') }}">
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
            <button type="submit" class="btn-submit" data-id="{{ $manager->banquet->id }}" id="submitBtn">Proceed to
                Booking</button>

            <!-- Review -->
            <div class="review-section">
                <div class="container">
                    <!-- Review Form -->
                    <div class="review-form-card mb-5">
                        @php
                            $averageRating = $averageRating ?? 0;
                            $totalReviews = $totalReviews ?? 0;
                            $ratingCounts = $ratingCounts ?? [1 => 0, 2 => 0, 3 => 0, 4 => 0, 5 => 0];
                            $ratingPercentages = $ratingPercentages ?? [1 => 0, 2 => 0, 3 => 0, 4 => 0, 5 => 0];
                            $reviews = $reviews ?? collect([]);
                        @endphp
                        <div class="review-form-header">
                            <h3 style="color: white"><i class="fas fa-pencil-alt me-2"></i> Share Your Experience</h3>
                        </div>
                        <div class="p-4 p-md-5">
                            <form id="reviewForm">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <input type="hidden" name="banquet_id" value="{{ $manager->banquet->id }}"
                                            required>

                                        <label for="name" class="form-label">Your Name</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            required>
                                        <div class="invalid-feedback">Please provide your name.</div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="email" class="form-label">Email (optional)</label>
                                        <input type="email" class="form-control" id="email" name="email">
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label">Your Rating</label>
                                    <div class="star-rating review-form-stars mb-2">
                                        <input type="hidden" name="rating" id="rating" value="0" required>
                                        <i class="fas fa-star" data-value="1"></i>
                                        <i class="fas fa-star" data-value="2"></i>
                                        <i class="fas fa-star" data-value="3"></i>
                                        <i class="fas fa-star" data-value="4"></i>
                                        <i class="fas fa-star" data-value="5"></i>
                                    </div>
                                    <div class="invalid-feedback d-block">Please select a rating.</div>
                                </div>

                                <div class="mb-4">
                                    <label for="review" class="form-label">Your Review</label>
                                    <textarea class="form-control" id="review" name="review" rows="4" required></textarea>
                                    <div class="invalid-feedback">Please write your review.</div>
                                </div>

                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary btn-lg" style="background:#008cad">
                                        <i class="fas fa-paper-plane me-2"></i> Submit Review
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Reviews List -->
                    <h2 class="text-center mb-4"><i class="fas fa-comments me-2"></i> Customer Reviews</h2>

                    <div class="row mb-4">
                        <div class="col-md-6 mb-3 mb-md-0">
                            <div class="d-flex align-items-center">
                                <div class="me-3">
                                    <span
                                        class="display-4 fw-bold average-rating">{{ number_format($averageRating, 1) }}</span>
                                    <span class="text-muted">/5</span>
                                </div>
                                <div>
                                    <div class="star-rating mb-1">
                                        @for ($i = 1; $i <= 5; $i++)
                                            <i
                                                class="fas fa-star {{ $i <= floor($averageRating) ? 'active' : ($i == ceil($averageRating) && $averageRating != floor($averageRating) ? 'fas fa-star-half-alt active' : '') }}"></i>
                                        @endfor
                                    </div>
                                    <div class="text-muted total-reviews">Based on {{ $totalReviews }} reviews</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="rating-distribution">
                                @for ($i = 5; $i >= 1; $i--)
                                    <div class="d-flex align-items-center mb-2">
                                        <div class="me-2">{{ $i }} <i class="fas fa-star active"></i></div>
                                        <div class="progress flex-grow-1" style="height: 10px;">
                                            <div class="progress-bar bg-warning rating-progress-bar-{{ $i }}"
                                                role="progressbar" style="width: {{ $ratingPercentages[$i] }}%"
                                                aria-valuenow="{{ $ratingPercentages[$i] }}" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                        <div class="ms-2 text-muted small rating-count-{{ $i }}">
                                            {{ $ratingCounts[$i] ?? 0 }}</div>
                                    </div>
                                @endfor
                            </div>
                        </div>
                    </div>

                    <div id="reviewsContainer">
                        @foreach ($reviews as $review)
                            <div class="review-card mb-4 p-4">
                                <div class="review-meta">
                                    <div class="review-avatar me-3">
                                        {{ substr($review->name, 0, 1) }}
                                    </div>
                                    <div class="flex-grow-1">
                                        <h5 class="mb-0">{{ $review->name }}</h5>
                                        <small class="text-muted">{{ $review->created_at->format('M d, Y') }}</small>
                                    </div>
                                    <div class="rating-badge">
                                        {{ $review->rating }} <i class="fas fa-star"></i>
                                    </div>
                                </div>
                                <div class="star-rating mb-2">
                                    @for ($i = 1; $i <= 5; $i++)
                                        <i class="fas fa-star {{ $i <= $review->rating ? 'active' : '' }}"></i>
                                    @endfor
                                </div>
                                <p class="mb-3">{{ $review->review }}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <small class="text-muted">
                                        @if ($review->created_at->diffInDays() < 1)
                                            Today
                                        @elseif($review->created_at->diffInDays() < 2)
                                            Yesterday
                                        @else
                                            {{ $review->created_at->diffForHumans() }}
                                        @endif
                                    </small>
                                    <div>
                                        <button class="helpful-btn btn-feedback me-2" data-review-id="{{ $review->id }}"
                                            data-action="helpful">
                                            <i class="fas fa-thumbs-up me-1"></i> <span
                                                class="helpful-count">{{ $review->helpful_count }}</span>
                                        </button>
                                        <button class="helpful-btn btn-feedback" data-review-id="{{ $review->id }}"
                                            data-action="unhelpful">
                                            <i class="fas fa-thumbs-down me-1"></i> <span
                                                class="unhelpful-count">{{ $review->unhelpful_count }}</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    @if (
                        $reviews instanceof \Illuminate\Pagination\LengthAwarePaginator ||
                            $reviews instanceof \Illuminate\Pagination\Paginator)
                        @if ($reviews->hasMorePages())
                            <div class="text-center mt-4">
                                <button id="loadMoreBtn" data-banquet-id="{{ $manager->banquet->id }}"
                                    class="btn btn-outline-primary" data-page="{{ $reviews->currentPage() + 1 }}">
                                    <i class="fas fa-plus me-2"></i> Load More Reviews
                                </button>
                            </div>
                        @endif
                    @endif

                </div>
            </div>
        </div>

    </section><!-- /Travel Tour Details Section -->
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            let feedbackClicked = {};

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // Star rating functionality
            $('.star-rating i').on('click', function() {
                const value = $(this).data('value');
                $(this).parent().find('i').removeClass('active');
                $(this).parent().find('i').each(function(index) {
                    if (index < value) {
                        $(this).addClass('active');
                    }
                });
                $('#rating').val(value);
                $(this).parent().next('.invalid-feedback').hide();
            });

            // Form submission
            $('#reviewForm').on('submit', function(e) {
                e.preventDefault();

                let isValid = true;
                const form = $(this);

                // Validate name
                if ($('#name').val().trim() === '') {
                    $('#name').addClass('is-invalid');
                    isValid = false;
                } else {
                    $('#name').removeClass('is-invalid');
                }

                // Validate rating
                if ($('#rating').val() === '0') {
                    $('.star-rating').next('.invalid-feedback').show();
                    isValid = false;
                } else {
                    $('.star-rating').next('.invalid-feedback').hide();
                }

                // Validate review
                if ($('#review').val().trim() === '') {
                    $('#review').addClass('is-invalid');
                    isValid = false;
                } else {
                    $('#review').removeClass('is-invalid');
                }

                if (!isValid) return;

                // Submit via AJAX
                $.ajax({
                    url: '{{ route('reviews.store') }}',
                    method: 'POST',
                    data: form.serialize(),
                    beforeSend: function() {
                        form.find('button[type="submit"]').prop('disabled', true).html(
                            '<i class="fas fa-spinner fa-spin me-2"></i> Submitting...');
                    },
                    success: function(response) {
                        if (response.success) {
                            form.trigger('reset');
                            $('.review-form-stars i').removeClass('active');
                            $('#rating').val('0');
                            alert('Thank you for your review!');

                            const newReview = `
                        <div class="review-card mb-4 p-4">
                            <div class="review-meta">
                                <div class="review-avatar me-3">
                                    ${response.review.name.charAt(0)}
                                </div>
                                <div class="flex-grow-1">
                                    <h5 class="mb-0">${response.review.name}</h5>
                                    <small class="text-muted">Just now</small>
                                </div>
                                <div class="rating-badge">
                                    ${response.review.rating} <i class="fas fa-star"></i>
                                </div>
                            </div>
                            <div class="star-rating mb-2">
                                ${'<i class="fas fa-star active"></i>'.repeat(response.review.rating)}
                                ${'<i class="fas fa-star"></i>'.repeat(5 - response.review.rating)}
                            </div>
                            <p class="mb-3">${response.review.review}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <small class="text-muted">Just now</small>
                                <div>
                                    <button class="helpful-btn btn-feedback me-2" data-review-id="${response.review.id}" data-action="helpful">
                                        <i class="fas fa-thumbs-up me-1"></i> <span class="helpful-count">0</span>
                                    </button>
                                    <button class="helpful-btn btn-feedback" data-review-id="${response.review.id}" data-action="unhelpful">
                                        <i class="fas fa-thumbs-down me-1"></i> <span class="unhelpful-count">0</span>
                                    </button>
                                </div>
                            </div>
                        </div>`;

                            $('#reviewsContainer').prepend(newReview);

                            // Update Average Rating
                            $('.average-rating').text(parseFloat(response.averageRating)
                                .toFixed(1));
                            $('.total-reviews').text('Based on ' + response.totalReviews +
                                ' reviews');

                            // Update Star Display
                            const average = parseFloat(response.averageRating);
                            const floorAvg = Math.floor(average);
                            const ceilAvg = Math.ceil(average);
                            let starsHtml = '';
                            for (let i = 1; i <= 5; i++) {
                                if (i <= floorAvg) {
                                    starsHtml += '<i class="fas fa-star active"></i>';
                                } else if (i === ceilAvg && average !== floorAvg) {
                                    starsHtml += '<i class="fas fa-star-half-alt active"></i>';
                                } else {
                                    starsHtml += '<i class="fas fa-star"></i>';
                                }
                            }
                            $('.star-rating-summary').html(starsHtml);

                            // Update Rating Distribution
                            for (let i = 1; i <= 5; i++) {
                                const percent = response.ratingPercentages[i] || 0;
                                const count = response.ratingCounts[i] || 0;
                                $(`.rating-progress-bar-${i}`).css('width', percent + '%').attr(
                                    'aria-valuenow', percent);
                                $(`.rating-count-${i}`).text(count);
                            }
                        }
                    },
                    error: function(xhr) {
                        let errorMessage = 'An error occurred. Please try again.';
                        if (xhr.responseJSON && xhr.responseJSON.message) {
                            errorMessage = xhr.responseJSON.message;
                        }
                        alert(errorMessage);
                    },
                    complete: function() {
                        form.find('button[type="submit"]').prop('disabled', false).html(
                            '<i class="fas fa-paper-plane me-2"></i> Submit Review');
                    }
                });
            });

            // Load more reviews
            $('#loadMoreBtn').on('click', function() {
                let banquetId = $('#reviews-section').data('banquet-id');
                const button = $(this);
                const nextPage = button.data('page');

                $.ajax({
                    url: 'customer.banquets-details/' + banquetId,
                    method: 'GET',
                    data: {
                        page: nextPage
                    },
                    beforeSend: function() {
                        button.prop('disabled', true).html(
                            '<i class="fas fa-spinner fa-spin me-2"></i> Loading...');
                    },
                    success: function(response) {
                        if (response && response.reviews.data.length > 0) {
                            response.reviews.data.forEach(function(review) {
                                const reviewHtml = `
                            <div class="review-card mb-4 p-4">
                                <div class="review-meta">
                                    <div class="review-avatar me-3">${review.name.charAt(0)}</div>
                                    <div class="flex-grow-1">
                                        <h5 class="mb-0">${review.name}</h5>
                                        <small class="text-muted">${new Date(review.created_at).toLocaleString()}</small>
                                    </div>
                                    <div class="rating-badge">${review.rating} <i class="fas fa-star"></i></div>
                                </div>
                                <div class="star-rating mb-2">
                                    ${'<i class="fas fa-star active"></i>'.repeat(review.rating)}
                                    ${'<i class="fas fa-star"></i>'.repeat(5 - review.rating)}
                                </div>
                                <p class="mb-3">${review.review}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <small class="text-muted">${new Date(review.created_at).toLocaleString()}</small>
                                    <div>
                                        <button class="helpful-btn btn-feedback me-2" data-review-id="${review.id}" data-action="helpful">
                                            <i class="fas fa-thumbs-up me-1"></i> <span class="helpful-count">${review.helpful_count}</span>
                                        </button>
                                        <button class="helpful-btn btn-feedback" data-review-id="${review.id}" data-action="unhelpful">
                                            <i class="fas fa-thumbs-down me-1"></i> <span class="unhelpful-count">${review.unhelpful_count}</span>
                                        </button>
                                    </div>
                                </div>
                            </div>`;
                                $('#reviewsContainer').append(reviewHtml);
                            });

                            button.data('page', nextPage + 1);

                            if (!response.hasMore) {
                                button.remove();
                            }
                        } else {
                            button.remove(); // No more reviews
                        }
                    },
                    error: function() {
                        alert('Error loading more reviews');
                        button.prop('disabled', false).html(
                            '<i class="fas fa-plus me-2"></i> Load More Reviews');
                    }
                });
            });

            $(document).on('click', '.btn-feedback', function(e) {
                let button = $(this);
                let reviewId = button.data('review-id');
                let action = button.data('action');
                let key = `${reviewId}_${action}`;

                if (feedbackClicked[key]) {
                    toastr.warning('You have already voted!');
                    return;
                }

                button.prop('disabled', true);

                $.ajax({
                    url: '/customer/review/vote',
                    method: 'POST',
                    data: {
                        review_id: reviewId,
                        action: action
                    },
                    success: function(response) {
                        if (response.success = 'success') {
                            let countSpan = action === 'helpful' ?
                                button.find('.helpful-count') :
                                button.find('.unhelpful-count');

                            if (countSpan.length) {
                                let current = parseInt(countSpan.text());
                                countSpan.text(current + 1);
                            }

                            feedbackClicked[key] = true;

                            toastr.success(response.message || 'Feedback recorded!');
                        } 

                        button.prop('disabled', false);
                    },
                    error: function(xhr) {
                        toastr.error(xhr.responseJSON.message);
                        button.prop('disabled', false);
                    }
                });
            });
        });
    </script>
@endsection

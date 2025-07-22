@extends('customer.layout.app')
@section('css')
@endsection
@section('main')

    <!-- Page Title -->
    @include('customer.partials.page-title')

    <!-- Travel Booking Section -->
    <section id="travel-booking" class="travel-booking section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row">
          <div class="col-lg-8">
            <div class="booking-form-container">
              <!-- Progress Steps -->
              <div class="booking-progress nav nav-tabs" data-aos="fade-up" data-aos-delay="200">
                <button class="step nav-link active" data-bs-toggle="tab" data-bs-target="#travel-booking-step-1" aria-current="page">
                  <span class="step-number">1</span>
                  <span class="step-title">Tour &amp; Dates</span>
                </button>
                <button class="step nav-link" data-bs-toggle="tab" data-bs-target="#travel-booking-step-2">
                  <span class="step-number">2</span>
                  <span class="step-title">Travelers</span>
                </button>
                <button class="step nav-link" data-bs-toggle="tab" data-bs-target="#travel-booking-step-3">
                  <span class="step-number">3</span>
                  <span class="step-title">Add-ons</span>
                </button>
                <button class="step nav-link" data-bs-toggle="tab" data-bs-target="#travel-booking-step-4">
                  <span class="step-number">4</span>
                  <span class="step-title">Payment</span>
                </button>
              </div><!-- End Progress Steps -->

              <!-- Booking Form -->
              <form action="#" method="post" class="booking-form" data-aos="fade-up" data-aos-delay="300">

                <div class="tab-content" id="bookingTabContent">
                  <!-- Step 1: Tour & Dates -->
                  <div class="form-step tab-pane fade show active" id="travel-booking-step-1" role="tabpanel">
                    <h4>Select Your Tour &amp; Travel Dates</h4>

                    <div class="row gy-4">
                      <div class="col-md-6">
                        <label for="tour-select">Choose Tour Package</label>
                        <select name="tour_package" id="tour-select" class="form-select" required="">
                          <option value="">Select a tour...</option>
                          <option value="amazing-bali-adventure">Amazing Bali Adventure - 7 Days</option>
                          <option value="thailand-explorer">Thailand Explorer - 10 Days</option>
                          <option value="vietnam-highlights">Vietnam Highlights - 8 Days</option>
                          <option value="cambodia-discovery">Cambodia Discovery - 6 Days</option>
                        </select>
                      </div>

                      <div class="col-md-6">
                        <label for="tour-duration">Duration</label>
                        <input type="text" name="tour_duration" id="tour-duration" class="form-control" value="7 Days / 6 Nights" readonly="">
                      </div>

                      <div class="col-md-6">
                        <label for="departure-date">Departure Date</label>
                        <input type="date" name="departure_date" id="departure-date" class="form-control" required="">
                      </div>

                      <div class="col-md-6">
                        <label for="return-date">Return Date</label>
                        <input type="date" name="return_date" id="return-date" class="form-control" required="">
                      </div>

                      <div class="col-md-4">
                        <label for="adults">Adults</label>
                        <select name="adults" id="adults" class="form-select" required="">
                          <option value="1">1 Adult</option>
                          <option value="2">2 Adults</option>
                          <option value="3">3 Adults</option>
                          <option value="4">4 Adults</option>
                        </select>
                      </div>

                      <div class="col-md-4">
                        <label for="children">Children (2-12)</label>
                        <select name="children" id="children" class="form-select">
                          <option value="0">0 Children</option>
                          <option value="1">1 Child</option>
                          <option value="2">2 Children</option>
                          <option value="3">3 Children</option>
                        </select>
                      </div>

                      <div class="col-md-4">
                        <label for="infants">Infants (0-2)</label>
                        <select name="infants" id="infants" class="form-select">
                          <option value="0">0 Infants</option>
                          <option value="1">1 Infant</option>
                          <option value="2">2 Infants</option>
                        </select>
                      </div>
                    </div>
                  </div><!-- End Step 1 -->

                  <!-- Step 2: Traveler Information -->
                  <div class="form-step tab-pane fade" id="travel-booking-step-2" role="tabpanel">
                    <h4>Traveler Information</h4>

                    <div class="traveler-info">
                      <h5>Lead Traveler</h5>
                      <div class="row gy-3">
                        <div class="col-md-6">
                          <label for="first-name">First Name</label>
                          <input type="text" name="first_name" id="first-name" class="form-control" required="">
                        </div>
                        <div class="col-md-6">
                          <label for="last-name">Last Name</label>
                          <input type="text" name="last_name" id="last-name" class="form-control" required="">
                        </div>
                        <div class="col-md-6">
                          <label for="email">Email Address</label>
                          <input type="email" name="email" id="email" class="form-control" required="">
                        </div>
                        <div class="col-md-6">
                          <label for="phone">Phone Number</label>
                          <input type="tel" name="phone" id="phone" class="form-control" required="">
                        </div>
                        <div class="col-md-6">
                          <label for="nationality">Nationality</label>
                          <select name="nationality" id="nationality" class="form-select" required="">
                            <option value="">Select nationality...</option>
                            <option value="US">United States</option>
                            <option value="CA">Canada</option>
                            <option value="UK">United Kingdom</option>
                            <option value="AU">Australia</option>
                          </select>
                        </div>
                      </div>
                    </div>

                    <div class="special-requirements">
                      <h5>Special Requirements</h5>
                      <div class="row gy-3">
                        <div class="col-12">
                          <label for="dietary">Dietary Restrictions</label>
                          <textarea name="dietary" id="dietary" class="form-control" rows="3" placeholder="Please mention any dietary restrictions or food allergies..."></textarea>
                        </div>
                        <div class="col-12">
                          <label for="special-requests">Special Requests</label>
                          <textarea name="special_requests" id="special-requests" class="form-control" rows="3" placeholder="Any special requests or accessibility needs..."></textarea>
                        </div>
                      </div>
                    </div>
                  </div><!-- End Step 2 -->

                  <!-- Step 3: Add-ons & Extras -->
                  <div class="form-step tab-pane fade" id="travel-booking-step-3" role="tabpanel">
                    <h4>Enhance Your Experience</h4>

                    <div class="addon-options">
                      <div class="addon-item">
                        <div class="addon-details">
                          <div class="addon-check">
                            <input type="checkbox" name="travel_insurance" id="travel-insurance" value="yes">
                            <label for="travel-insurance">
                              <h5>Travel Insurance</h5>
                              <p>Comprehensive coverage for your trip including medical emergencies and cancellations.</p>
                            </label>
                          </div>
                          <div class="addon-price">
                            <span class="price">$89</span>
                            <span class="period">per person</span>
                          </div>
                        </div>
                      </div>

                      <div class="addon-item">
                        <div class="addon-details">
                          <div class="addon-check">
                            <input type="checkbox" name="airport_transfer" id="airport-transfer" value="yes">
                            <label for="airport-transfer">
                              <h5>Airport Transfer</h5>
                              <p>Private pickup and drop-off service from/to the airport with comfortable vehicle.</p>
                            </label>
                          </div>
                          <div class="addon-price">
                            <span class="price">$45</span>
                            <span class="period">per trip</span>
                          </div>
                        </div>
                      </div>

                      <div class="addon-item">
                        <div class="addon-details">
                          <div class="addon-check">
                            <input type="checkbox" name="extra_nights" id="extra-nights" value="yes">
                            <label for="extra-nights">
                              <h5>Extra Hotel Nights</h5>
                              <p>Extend your stay with additional nights at premium hotels before or after your tour.</p>
                            </label>
                          </div>
                          <div class="addon-price">
                            <span class="price">$120</span>
                            <span class="period">per night</span>
                          </div>
                        </div>
                      </div>

                      <div class="addon-item">
                        <div class="addon-details">
                          <div class="addon-check">
                            <input type="checkbox" name="local_guide" id="local-guide" value="yes">
                            <label for="local-guide">
                              <h5>Private Local Guide</h5>
                              <p>Personal guide for exclusive insights and customized exploration of hidden gems.</p>
                            </label>
                          </div>
                          <div class="addon-price">
                            <span class="price">$199</span>
                            <span class="period">per day</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div><!-- End Step 3 -->

                  <!-- Step 4: Payment Information -->
                  <div class="form-step tab-pane fade" id="travel-booking-step-4" role="tabpanel">
                    <h4>Payment Information</h4>

                    <div class="payment-methods">
                      <div class="method-selector">
                        <input type="radio" name="payment_method" id="credit-card" value="credit_card" checked="">
                        <label for="credit-card"><i class="bi bi-credit-card"></i> Credit Card</label>
                      </div>
                      <div class="method-selector">
                        <input type="radio" name="payment_method" id="paypal" value="paypal">
                        <label for="paypal"><i class="bi bi-paypal"></i> PayPal</label>
                      </div>
                      <div class="method-selector">
                        <input type="radio" name="payment_method" id="bank-transfer" value="bank_transfer">
                        <label for="bank-transfer"><i class="bi bi-bank"></i> Bank Transfer</label>
                      </div>
                    </div>

                    <div class="payment-details">
                      <div class="row gy-3">
                        <div class="col-12">
                          <label for="card-name">Cardholder Name</label>
                          <input type="text" name="card_name" id="card-name" class="form-control" required="">
                        </div>
                        <div class="col-md-8">
                          <label for="card-number">Card Number</label>
                          <input type="text" name="card_number" id="card-number" class="form-control" placeholder="1234 5678 9012 3456" required="">
                        </div>
                        <div class="col-md-4">
                          <label for="card-cvv">CVV</label>
                          <input type="text" name="card_cvv" id="card-cvv" class="form-control" placeholder="123" required="">
                        </div>
                        <div class="col-md-6">
                          <label for="card-expiry-month">Expiry Month</label>
                          <select name="card_expiry_month" id="card-expiry-month" class="form-select" required="">
                            <option value="">Month</option>
                            <option value="01">01</option>
                            <option value="02">02</option>
                            <option value="03">03</option>
                            <option value="04">04</option>
                            <option value="05">05</option>
                            <option value="06">06</option>
                            <option value="07">07</option>
                            <option value="08">08</option>
                            <option value="09">09</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                          </select>
                        </div>
                        <div class="col-md-6">
                          <label for="card-expiry-year">Expiry Year</label>
                          <select name="card_expiry_year" id="card-expiry-year" class="form-select" required="">
                            <option value="">Year</option>
                            <option value="2024">2024</option>
                            <option value="2025">2025</option>
                            <option value="2026">2026</option>
                            <option value="2027">2027</option>
                            <option value="2028">2028</option>
                            <option value="2029">2029</option>
                          </select>
                        </div>
                      </div>

                      <div class="secure-payment">
                        <i class="bi bi-shield-check"></i>
                        <span>Your payment information is secure and encrypted</span>
                      </div>
                    </div>

                    <div class="terms-agreement">
                      <div class="form-check">
                        <input type="checkbox" name="terms_agreement" id="terms-agreement" class="form-check-input" required="">
                        <label for="terms-agreement" class="form-check-label">
                          I agree to the <a href="#">Terms &amp; Conditions</a> and <a href="#">Privacy Policy</a>
                        </label>
                      </div>
                    </div>

                    <div class="form-navigation">
                      <button type="submit" class="btn btn-book">Complete Booking</button>
                    </div>
                  </div><!-- End Step 4 -->

                </div><!-- End Tab Content -->

              </form><!-- End Booking Form -->
            </div>
          </div>

          <!-- Booking Summary Sidebar -->
          <div class="col-lg-4">
            <div class="booking-summary" data-aos="fade-up" data-aos-delay="400">
              <div class="summary-header">
                <h4>Booking Summary</h4>
              </div>

              <div class="selected-tour">
                <img src="{{ asset('customer/img/travel/tour-15.webp') }}" alt="Selected Tour" class="img-fluid">
                <div class="tour-info">
                  <h5>Amazing Bali Adventure</h5>
                  <p><i class="bi bi-calendar"></i> 7 Days / 6 Nights</p>
                  <p><i class="bi bi-geo-alt"></i> Bali, Indonesia</p>
                </div>
              </div>

              <div class="booking-details">
                <div class="detail-item">
                  <span class="label">Departure:</span>
                  <span class="value">Select dates</span>
                </div>
                <div class="detail-item">
                  <span class="label">Travelers:</span>
                  <span class="value">2 Adults</span>
                </div>
                <div class="detail-item">
                  <span class="label">Duration:</span>
                  <span class="value">7 Days</span>
                </div>
              </div>

              <div class="price-breakdown">
                <div class="price-item">
                  <span class="description">Base Price (2 Adults)</span>
                  <span class="amount">$1,899</span>
                </div>
                <div class="price-item">
                  <span class="description">Travel Insurance</span>
                  <span class="amount">$178</span>
                </div>
                <div class="price-item">
                  <span class="description">Airport Transfer</span>
                  <span class="amount">$90</span>
                </div>
                <div class="price-item tax-item">
                  <span class="description">Taxes &amp; Fees</span>
                  <span class="amount">$156</span>
                </div>
                <div class="price-total">
                  <span class="description">Total Amount</span>
                  <span class="amount">$2,323</span>
                </div>
              </div>

              <div class="help-section">
                <h5>Need Help?</h5>
                <p>Our travel experts are here to assist you</p>
                <div class="contact-info">
                  <p><i class="bi bi-telephone"></i> +1 (555) 123-4567</p>
                  <p><i class="bi bi-envelope"></i> <a href="../../../cdn-cgi/l/email-protection.html" class="__cf_email__" data-cfemail="2e5d5b5e5e415c5a6e4b564f435e424b004d4143">[email&#160;protected]</a></p>
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
@endsection

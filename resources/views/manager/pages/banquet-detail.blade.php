@extends('manager.layout.app')

@section('css')
    <!-- Font Awesome for Social Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
@endsection

@section('main')
    <div class="page-container">
        <div class="page-title-head d-flex align-items-center gap-2">
            <div class="flex-grow-1">
                <h4 class="fs-16 text-uppercase fw-bold mb-0">Add Banquet Details</h4>
            </div>
            <div class="text-end">
                <ol class="breadcrumb m-0 py-0 fs-13">
                    <li class="breadcrumb-item"><a href="{{ route('manager') }}">{{ request()->getHost() }}</a></li>
                    <li class="breadcrumb-item active">{{ $pageTitle ?? 'BanquetHub' }}</li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form>
                            <!-- Banquet Name -->
                            <div class="mb-3">
                                <label class="form-label">Banquet Name</label>
                                <input type="text" readonly name="name"
                                    value="{{ Auth::guard('banquet_manager')->user()->banquet_name }}" class="form-control"
                                    placeholder="Enter the official banquet name">
                            </div>

                            <!-- Address -->
                            <div class="mb-3">
                                <label class="form-label">Banquet Address</label>
                                <input type="text" readonly name="address"
                                    value="{{ Auth::guard('banquet_manager')->user()->banquet_address }}"
                                    class="form-control" placeholder="e.g., Banquet No. 25, Block-B, Latifabad, Hyderabad">
                            </div>

                            <!-- Description -->
                            <div class="mb-3">
                                <label class="form-label">Banquet Description</label>
                                <textarea name="description" class="form-control" rows="5"
                                    placeholder="Describe the banquet's features, services, and ambiance in detail."></textarea>
                            </div>

                            <!-- People Capacity -->
                            <div class="mb-3">
                                <label class="form-label">Guest Capacity</label>
                                <input type="number" name="guest_capacity" class="form-control" placeholder="e.g., 1000">
                            </div>

                            <!-- Social Media Links -->
                            <div class="mb-3">
                                <label class="form-label">Social Media Profiles (Optional)</label>
                                <div class="input-group mb-2">
                                    <span class="input-group-text"><i class="fab fa-facebook-f"></i></span>
                                    <input type="text" class="form-control" name="facebook"
                                        placeholder="https://facebook.com/yourbanquet">
                                </div>
                                <div class="input-group mb-2">
                                    <span class="input-group-text"><i class="fab fa-instagram"></i></span>
                                    <input type="text" class="form-control" name="instagram"
                                        placeholder="https://instagram.com/yourbanquet">
                                </div>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fab fa-youtube"></i></span>
                                    <input type="text" class="form-control" name="youtube"
                                        placeholder="https://youtube.com/channel/yourbanquet">
                                </div>
                            </div>

                            <!-- Opening and Closing Time -->
                            <div class="mb-3">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="opening-time" class="form-label">Opening Time</label>
                                        <input class="form-control" id="opening-time" type="time" name="opening_time"
                                            placeholder="Opening Time">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="closing-time" class="form-label">Closing Time</label>
                                        <input class="form-control" id="closing-time" type="time" name="closing_time"
                                            placeholder="Closing Time">
                                    </div>
                                </div>
                            </div>

                            <!-- Rental Rate -->
                            <div class="mb-3">
                                <label class="form-label">Rental Rate (PKR)</label>
                                <input type="number" name="rental_rate" id="rentalRate" class="form-control"
                                    placeholder="e.g., 80000">
                            </div>

                            <!-- Discount Dropdown -->
                            <div class="mb-3">
                                <label class="form-label">Discount on Rental Rate</label>
                                <select class="form-select form-select-sm" name="discount" id="discountSelect">
                                    <option value="0">No Discount</option>
                                </select>
                            </div>

                            <div class="mb-2">
                                <label class="form-label">Final Price After Discount:</label>
                                <input type="text" class="form-control" name="final_price" id="finalPrice" readonly>
                            </div>


                            <!-- Advance -->
                            <div class="mb-3">
                                <label class="form-label">Advance Payment (PKR)</label>
                                <input type="text" name="advance_amount" class="form-control"
                                    placeholder="e.g., 30000">
                            </div>

                            <!-- Other Features -->
                            <div class="mb-3">
                                <label class="form-label d-block mb-2">Available Features</label>
                                <div class="row">
                                    <div class="col-md-3">
                                        <label class="form-label d-block">Parking Available</label>
                                        <input type="checkbox" id="parking_switch" name="parking_available"
                                            value="1" data-switch="success">
                                        <label for="parking_switch" data-on-label="Yes" data-off-label="No"></label>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label d-block">Personal Caterer Available</label>
                                        <input type="checkbox" id="personal_caterer_switch"
                                            name="personal_caterer_available" value="1" data-switch="success">
                                        <label for="personal_caterer_switch" data-on-label="Yes"
                                            data-off-label="No"></label>
                                    </div>

                                    <div class="col-md-3">
                                        <label class="form-label d-block">Personal Decorator Avaliable</label>
                                        <input type="checkbox" id="personal_decorator_switch"
                                            name="personal_decorator_available" value="1" data-switch="success">
                                        <label for="personal_decorator_switch" data-on-label="Yes"
                                            data-off-label="No"></label>
                                    </div>

                                    <div class="col-md-3">
                                        <label class="form-label d-block">Outside Decorator Allowed</label>
                                        <input type="checkbox" id="outside_decorator_switch"
                                            name="outside_decorator_allowed" value="1" data-switch="success">
                                        <label for="outside_decorator_switch" data-on-label="Yes"
                                            data-off-label="No"></label>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label d-block">Air Conditioner Facility</label>
                                        <input type="checkbox" id="ac_switch" name="ac" value="1"
                                            data-switch="success">
                                        <label for="ac_switch" data-on-label="Yes" data-off-label="No"></label>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label d-block">Screen Available</label>
                                        <input type="checkbox" id="screen_switch" name="screen_available" value="1"
                                            data-switch="success">
                                        <label for="screen_switch" data-on-label="Yes" data-off-label="No"></label>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label d-block">Sound System Available</label>
                                        <input type="checkbox" id="sound_system_switch" name="sound_system_available"
                                            value="1" data-switch="success">
                                        <label for="sound_system_switch" data-on-label="Yes" data-off-label="No"></label>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label d-block">Bridal Room Available</label>
                                        <input type="checkbox" id="bridal_switch" name="bridal_room_available"
                                            value="1" data-switch="success">
                                        <label for="bridal_switch" data-on-label="Yes" data-off-label="No"></label>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label d-block">Fire Safety Equipment</label>
                                        <input type="checkbox" id="fire_safety_switch" name="fire_safety" value="1"
                                            data-switch="success">
                                        <label for="fire_safety_switch" data-on-label="Yes" data-off-label="No"></label>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label d-block">Security Personnel</label>
                                        <input type="checkbox" id="security_switch" name="security_personnel"
                                            value="1" data-switch="success">
                                        <label for="security_switch" data-on-label="Yes" data-off-label="No"></label>
                                    </div>
                                </div>
                            </div>

                            <!-- Submit -->
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary">Save Banquet Details</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        function updateFinalPrice() {
            var rental = parseFloat($('input[name="rental_rate"]').val()) || 0;
            var discount = parseFloat($('select[name="discount"]').val()) || 0;

            var finalPrice = rental - (rental * discount / 100);
            $('#finalPrice').val(finalPrice.toFixed(2));
        }
        $(document).ready(function() {
            $('input[name="rental_rate"], select[name="discount"]').on('input', updateFinalPrice);

            // Initialize on page load
            updateFinalPrice();

            $('#rentalRate').on('input', function() {
                var rentalRate = parseFloat($(this).val());
                var $discountSelect = $('#discountSelect');

                // Clear previous options
                $discountSelect.html('<option value="0">No Discount</option>');

                if (!isNaN(rentalRate) && rentalRate > 0) {
                    for (var percent = 5; percent <= 50; percent += 5) {
                        var discountAmount = Math.round(rentalRate * (percent / 100));
                        var formattedAmount = discountAmount.toLocaleString();
                        var optionText = percent + '% (' + formattedAmount + ' PKR)';
                        $discountSelect.append(
                            $('<option>', {
                                value: percent,
                                text: optionText
                            })
                        );
                    }
                }
            });
            $('#rentalRate, #discountSelect').on('input change', function() {
                var rentalRate = parseFloat($('#rentalRate').val());
                var discount = parseFloat($('#discountSelect').val());
                var $finalPrice = $('#finalPrice');

                if (!isNaN(rentalRate) && rentalRate > 0 && !isNaN(discount) && discount > 0) {
                    var final = rentalRate - (rentalRate * discount / 100);
                    $finalPrice.val(final.toLocaleString() + ' PKR');
                } else {
                    $finalPrice.val(''); // Clear if invalid or empty
                }
            });

            $('form').on('submit', function(e) {
                e.preventDefault();

                var form = $(this);
                var formData = form.serialize();

                $.ajax({
                    url: "{{ route('manager.save-details') }}",
                    type: "POST",
                    data: formData,
                    beforeSend: function() {
                        $('#ajax-spinner').removeClass('d-none');
                    },
                    success: function(response) {
                        if (response.status == 'success') {
                            // Set success messages in modal
                            $('#success-alert-message').html(response.message);
                            $('#ajax-spinner').addClass('d-none');
                            const successModal = new bootstrap.Modal(document.getElementById(
                                'success-alert-modal'));
                            successModal.show();

                            $('form')[0].reset();
                        } else if (response.data) {
                            console.log(response.data);
                        }
                        form.trigger("reset");
                    },
                    error: function(xhr) {
                        if (xhr.status === 422) {
                            $('#ajax-spinner').addClass('d-none');
                            const errors = xhr.responseJSON.errors;
                            let messages = '<ul class="text-start">';
                            $.each(errors, function(key, value) {
                                messages += `<li>${value[0]}</li>`;
                            });
                            messages += '</ul>';

                            // Set error messages in modal
                            $('#danger-alert-message').html(messages);

                            // Show the modal
                            const dangerModal = new bootstrap.Modal(document.getElementById(
                                'danger-alert-modal'));
                            dangerModal.show();
                        } else {
                            $('#ajax-spinner').addClass('d-none');
                            // General error
                            $('#danger-alert-message').html('Check Your network connection');
                            const dangerModal = new bootstrap.Modal(document.getElementById(
                                'danger-alert-modal'));
                            dangerModal.show();
                        }
                    }
                });
            });
        });
    </script>
@endsection

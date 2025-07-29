<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Live Photo Capture</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Toastr CSS File-->
    <link rel="stylesheet" href="{{ asset('customer/toastr/toastr.min.css') }}">
</head>

<body>
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-10 col-md-8 col-lg-6">
                <form>
                    @csrf
                    <h2 class="text-center mb-4">Upload Documents</h2>
                    <input type="hidden" name="manager_id" value="{{ $id }}">

                    <!-- Utility Bill -->
                    <div class="mb-3">
                        <label for="utilityBill" class="form-label">Any Utility Bills With Banquet Address</label>
                        <input type="file" accept=".jpg, .jpeg, .png" name="utility_bill" class="form-control"
                            id="utilityBill">
                    </div>

                    <!-- Business Card -->
                    <div class="mb-3">
                        <label for="businessCard" class="form-label">Business Card</label>
                        <input type="file" accept=".jpg, .jpeg, .png" name="business_card" class="form-control"
                            id="businessCard">
                    </div>

                    <!-- Banquet Image -->
                    <div class="mb-3">
                        <label for="banquetImage" class="form-label">Banquet Image From Outside</label>
                        <input type="file" accept=".jpg, .jpeg, .png" name="banquet_image" class="form-control"
                            id="banquetImage">
                    </div>


                    <!-- CNIC Front -->
                    <div class="mb-4" id="cnicFrontSection">
                        <label class="form-label me-2">Live CNIC Front</label>
                        <button type="button" class="btn btn-outline-secondary open-camera-btn"
                            data-target="cnicFront"><i class="fa-solid fa-id-card me-2"></i> Open Camera</button>

                        <!-- Camera + Take Button -->
                        <div class="camera-wrapper mt-2" style="display:none;">
                            <video class="video-preview w-100 border rounded" autoplay playsinline></video>
                            <button type="button" class="btn btn-sm btn-primary mt-2 take-photo-btn">Take
                                Photo</button>
                        </div>

                        <!-- Captured Preview -->
                        <div class="text-center mt-2">
                            <img class="img-preview img-fluid border rounded shadow-sm"
                                style="display:none; max-width: 100%;">
                            <input type="hidden" name="cnic_front" class="image-data">
                        </div>
                    </div>

                    <!-- CNIC Back -->
                    <div class="mb-4" id="cnicBackSection">
                        <label class="form-label me-2">Live CNIC Back</label>
                        <button type="button" class="btn btn-outline-secondary open-camera-btn"
                            data-target="cnicBack"><i class="fa-solid fa-id-card-clip me-2"></i> Open Camera</button>

                        <div class="camera-wrapper mt-2" style="display:none;">
                            <video class="video-preview w-100 border rounded" autoplay playsinline></video>
                            <button type="button" class="btn btn-sm btn-primary mt-2 take-photo-btn">Take
                                Photo</button>
                        </div>

                        <div class="text-center mt-2">
                            <img class="img-preview img-fluid border rounded shadow-sm"
                                style="display:none; max-width: 100%;">
                            <input type="hidden" name="cnic_back" class="image-data">
                        </div>
                    </div>

                    <!-- Selfie -->
                    <div class="mb-4" id="selfieSection">
                        <label class="form-label me-2">Live Selfie</label>
                        <button type="button" class="btn btn-outline-primary open-camera-btn" data-target="selfie"><i
                                class="fa-solid fa-camera me-2"></i> Open Camera</button>

                        <div class="camera-wrapper mt-2" style="display:none;">
                            <video class="video-preview w-100 border rounded" autoplay playsinline></video>
                            <button type="button" class="btn btn-sm btn-primary mt-2 take-photo-btn">Take
                                Photo</button>
                        </div>

                        <div class="text-center mt-2">
                            <img class="img-preview img-fluid border rounded shadow-sm"
                                style="display:none; max-width: 100%;">
                            <input type="hidden" name="live_selfie" class="image-data">
                        </div>
                    </div>

                    <!-- Shared Canvas (for capturing) -->
                    <canvas id="sharedCanvas" width="320" height="240" style="display:none;"></canvas>


                    <!-- Submit -->
                    <button id="loader_btn" class="btn btn-primary w-100 mt-3" type="submit" disabled>
                        <span class="spinner-border spinner-border-sm" aria-hidden="true"></span>
                        <span role="status">Loading...</span>
                    </button>
                    <button id="submit_btn" type="submit" class="btn btn-primary w-100 mt-3">Submit</button>
                </form>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Toastr JS File-->
    <script src="{{ asset('customer/toastr/toastr.min.js') }}"></script>

    <script>
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
    };
        let sharedStream = null;

        async function getCameraStream() {
            if (!sharedStream) {
                sharedStream = await navigator.mediaDevices.getUserMedia({
                    video: true
                });
            }
            return sharedStream;
        }

        $(document).ready(function() {
            $('#loader_btn').hide();
            // Handle Open Camera Click
            $('.open-camera-btn').on('click', async function() {
                const $section = $(this).closest('div.mb-4');
                const $video = $section.find('video');
                const $cameraWrapper = $section.find('.camera-wrapper');

                // Reset preview and hidden input
                $section.find('.img-preview').hide().attr('src', '');
                $section.find('.image-data').val('');

                const stream = await getCameraStream();
                $video.get(0).srcObject = stream;

                $(this).hide(); // hide "Open Camera"
                $cameraWrapper.show(); // show video and Take Photo button
            });


            // Handle Take Photo Click
            $('.take-photo-btn').on('click', function() {
                const $section = $(this).closest('div.mb-4');
                const $video = $section.find('video').get(0);
                const $canvas = $('#sharedCanvas')[0];
                const context = $canvas.getContext('2d');

                // Draw video to canvas
                context.drawImage($video, 0, 0, $canvas.width, $canvas.height);
                const imageData = $canvas.toDataURL('image/jpeg');

                // Fill data and show preview
                $section.find('.image-data').val(imageData);
                $section.find('.img-preview').attr('src', imageData).show();

                // Hide camera and show "Open Camera" again
                $section.find('.camera-wrapper').hide();
                $section.find('.open-camera-btn').show();
            });

            $('form').on('submit', function(e) {
                $('#loader_btn').show();
                $('#submit_btn').hide();
                e.preventDefault();
                const formData = new FormData(this);

                $.ajax({
                    url: "{{ route('customer.save-documents') }}",
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        toastr.success(response.success);
                        $('#loader_btn').hide();
                        $('#submit_btn').show();
                        window.location.href = '/customer/home';
                    },
                    error: function(xhr) {
                        if (xhr.status === 422) {
                            $('#loader_btn').hide();
                            $('#submit_btn').show();
                            let errors = xhr.responseJSON.errors;
                            let errorMessages = '';

                            $.each(errors, function(key, value) {
                                errorMessages += `• ${value[0]}<br>`;
                            });

                            toastr.error(errorMessages);
                        } else if (xhr.status === 500) {
                            $('#loader_btn').hide();
                            $('#submit_btn').show();
                            let message = xhr.responseJSON?.error ||
                                "An unexpected error occurred. Please try again.";
                            toastr.error(message);
                        } else {
                            $('#loader_btn').hide();
                            $('#submit_btn').show();
                            toastr.error("Something went wrong.");
                        }
                    }
                });
            });
        });
    </script>
</body>

</html>

@extends('manager.layout.app')
@section('css')
    <style>
        .card-img-top {
            width: 100%;
            aspect-ratio: 5 / 3;
            object-fit: cover;
            object-position: center;
            border-radius: 8px;
        }
    </style>
@endsection
@section('main')
    <div class="page-container">
        <div class="row">
            <div class="col-12">
                <h4 class="mb-4 mt-3">Upload images to make your banquet visible to users</h4>
            </div>
        </div>
        <div class="row">
            <form id="imageUploadForm" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    @php
                        $imageLabels = [
                            'Profile Image',
                            'Cover Image',
                            'Image 1',
                            'Image 2',
                            'Image 3',
                            'Image 4',
                            'Image 5',
                            'Image 6',
                        ];
                    @endphp

                    @foreach ($imageLabels as $index => $label)
                        <div class="col-md-3 mb-3">
                            <div class="card d-block p-2 text-center">
                                <img id="preview_{{ $index }}" class="card-img-top img-fluid object-fit-cover mb-2"
                                    src="{{ asset('manager/images/error/banquet_error.png') }}" alt="No image available">

                                <h5 class="card-title">{{ $label }}</h5>

                                <input type="file" name="banquet_images[]" accept=".jpg, .jpeg, .png"
                                    class="d-none image-input" data-index="{{ $index }}">
                                <button type="button" class="btn btn-secondary btn-sm upload-btn"
                                    data-index="{{ $index }}">
                                    Upload Image
                                </button>
                            </div>
                        </div>
                    @endforeach
                </div>

                <button type="submit" class="btn btn-primary mt-3">Submit All Images</button>
            </form>
        </div>
    </div>
    <!-- Danger Alert Modal -->
    <div class="modal fade" id="danger-alert-modal" tabindex="-1" aria-labelledby="dangerAlertLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-top">
            <div class="modal-content modal-filled bg-danger">
                <div class="modal-body p-4">
                    <div class="text-center">
                        <i class="ti ti-circle-x h1"></i>
                        <h4 class="mt-2">Oh snap!</h4>
                        <p class="mt-3" id="danger-alert-message">
                            A critical security breach has been identified on our platform. Your personal
                            information and sensitive data may be at risk.
                        </p>
                        <button type="button" class="btn btn-light my-2" data-bs-dismiss="modal">Continue</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Success Alert Modal -->
    <div class="modal fade" id="success-alert-modal" tabindex="-1" aria-labelledby="successAlertLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-top">
            <div class="modal-content modal-filled bg-success">
                <div class="modal-body p-4">
                    <div class="text-center">
                        <i class="ti ti-check h1"></i>
                        <h4 class="mt-2">Well Done!</h4>
                        <p class="mt-3">
                            Congratulations! You've achieved success! 🎉 Your hard work, dedication, and perseverance
                            have paid off. Keep up the great work and continue to strive for excellence.
                        </p>
                        <button type="button" class="btn btn-light my-2" data-bs-dismiss="modal">Continue</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            // Open file selector
            $('.upload-btn').click(function() {
                const index = $(this).data('index');
                $(`input[data-index="${index}"]`).click();
            });
            // Show preview
            $('.image-input').on('change', function() {
                const index = $(this).data('index');
                const file = this.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        $(`#preview_${index}`).attr('src', e.target.result);
                    }
                    reader.readAsDataURL(file);
                }
            });
            // Submit form
            $('#imageUploadForm').on('submit', function(e) {
                e.preventDefault();

                const formData = new FormData(this);

                $.ajax({
                    url: "{{ route('manager.upload-banquet-images') }}", // Adjust this route name
                    method: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    beforeSend: function() {
                        // optional: show loader
                    },
                    success: function(response) {
                        const successModal = new bootstrap.Modal(document.getElementById(
                            'success-alert-modal'));
                        successModal.show();

                        $('#imageUploadForm')[0].reset();
                        $('.card-img-top').attr('src',
                            '{{ asset('manager/images/error/banquet_error.png') }}');
                    }
                    error: function(xhr) {
                        if (xhr.status === 422) {
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
                            // General error
                            $('#danger-alert-message').html('Something went wrong!');
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

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

        <div class="page-title-head d-flex align-items-center gap-2">
            <div class="flex-grow-1">
                <h4 class="fs-16  fw-bold mb-0">Upload images to make your banquet visible to users</h4>
            </div>

            <div class="text-end">
                <ol class="breadcrumb m-0 py-0 fs-13">
                    <li class="breadcrumb-item"><a href="{{route('manager')}}">{{ request()->getHost() }}</a></li>
                    <li class="breadcrumb-item active">{{ $pageTitle ?? 'BanquetHub' }}</li>
                </ol>
            </div>
        </div>

        <div class="row">
            <form id="imageUploadForm" enctype="multipart/form-data">
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
                    url: "{{ route('manager.upload-banquet-images') }}",
                    method: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
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

                            $('#imageUploadForm')[0].reset();
                            $('.card-img-top').attr('src',
                                '{{ asset('manager/images/error/banquet_error.png') }}');
                        }
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

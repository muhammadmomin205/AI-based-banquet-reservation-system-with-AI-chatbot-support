$('document').ready(function () {
    // ✅ Setup CSRF token for all AJAX
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('#managerLogout').on('click', function (e) {
        e.preventDefault();
        $.ajax({
            url: '/customer/manager-logout',
            type: 'POST',
            beforeSend: function () {
                $('#ajax-spinner').removeClass('d-none');
            },
            success: function (response) {
                if (response.success) {
                    // Set success messages in modal
                    $('#ajax-spinner').addClass('d-none');
                    $('#success-alert-message').html(response.success);
                    const successModal = new bootstrap.Modal(document.getElementById(
                        'success-alert-modal'));
                    successModal.show();
                    window.location.href = "/customer/login"
                }
            },
        });
    });
});
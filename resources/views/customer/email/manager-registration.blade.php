<!DOCTYPE html>
<html>

<head>
    <title>{{ $data['email_title'] ?? 'Notification' }}</title>
</head>

<body style="font-family: Arial, sans-serif; line-height: 1.6;">
    <h2>Dear {{ $data['owner_name'] ?? 'Banquet Owner' }},</h2>

    <p>{{ $data['intro'] }}</p>

    <p><strong>Status:</strong> <span style="color: orange;">{{ $data['status'] ?? 'Pending' }}</span></p>

    <p>{{ $data['instructions'] }}</p>

    <p style="margin: 20px 0;">
         <a href="{{ route('customer.upload-documents', $data['manager_id']) }}"
            style="background-color: #007bff; color: #ffffff; padding: 10px 20px; text-decoration: none; border-radius: 5px;">
            Upload Documents Now
        </a>
    </p>

    <p>{{ $data['outro'] }}</p>

    <p>Best regards,<br>
        <strong>Team BanquetHub Hyderabad</strong>
    </p>

    <p style="font-size: 12px; color: #888;">This is an automated email. Please do not reply.</p>
</body>

</html>

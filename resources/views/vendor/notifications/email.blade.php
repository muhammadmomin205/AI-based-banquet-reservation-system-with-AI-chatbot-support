<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>{{ $greeting ?? ($level === 'error' ? 'Whoops!' : 'Hello!') }}</title>
</head>

<body style="font-family: Arial, sans-serif; line-height: 1.6;">

    {{-- Greeting --}}
    <h2>
        @if (!empty($greeting))
            {{ $greeting }}
        @else
            {{ $level === 'error' ? 'Whoops!' : 'Hello!' }}
        @endif
    </h2>

    {{-- Intro Lines --}}
    @foreach ($introLines as $line)
        <p>{{ $line }}</p>
    @endforeach


    {{-- Action Button --}}
    @isset($actionText)
        <p style="margin: 20px 0;">
            <a href="{{ $actionUrl }}"
                style="background-color: #007bff; color: #ffffff; padding: 10px 20px; text-decoration: none; border-radius: 5px;">
                {{ $actionText }}
            </a>
        </p>
    @endisset

    {{-- Outro Lines --}}
    @foreach ($outroLines as $line)
        <p>{{ $line }}</p>
    @endforeach

    {{-- Salutation --}}
    <p>
        @if (!empty($salutation))
            {{ $salutation }}
        @else
            Best regards,<br>
            <strong>Team BanquetHub Hyderabad</strong>
        @endif
    </p>

    <hr style="margin-top: 30px; border: none; border-top: 1px solid #eee;">

    {{-- Subcopy --}}
    @isset($actionText)
        <p style="font-size: 13px; color: #888;">
            If you're having trouble clicking the "<strong>{{ $actionText }}</strong>" button, copy and paste the URL
            below into your web browser:<br>
            <a href="{{ $actionUrl }}" style="color: #007bff;">{{ $displayableActionUrl }}</a>
        </p>
    @endisset

    <p style="font-size: 12px; color: #aaa;">This is an automated email. Please do not reply.</p>
</body>

</html>

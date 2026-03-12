<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Login OTP</title>
</head>
<body style="font-family: Arial, sans-serif;">

    <h2>Hello {{ $organization->organization_name }}</h2>

    <p>
        Your one-time login code is:
    </p>

    <h1 style="letter-spacing:4px;">
        {{ $otp }}
    </h1>

    <p>
        This code will expire in {{ $expiryMinutes }} minutes.
    </p>

    <p>
        If you did not request this login, please ignore this email.
    </p>

    <br>

    <p>
        Thanks,<br>
        Fundink Team
    </p>

</body>
</html>
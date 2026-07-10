<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Fundink Login OTP</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            color: #333;
            line-height: 1.6;
        }
        .container {
            max-width: 600px;
            margin: auto;
            padding: 20px;
            border: 1px solid #eee;
        }
        .otp {
            font-size: 28px;
            font-weight: bold;
            letter-spacing: 4px;
            margin: 20px 0;
        }
        .note {
            font-size: 14px;
            color: #666;
        }
    </style>
</head>

<body>
    <div class="container">

        <p>Dear {{ $organization->organization_name }},</p>

        <p>
            As requested, here is your new One-Time Password to log in to your Fundink account:
        </p>

        <p>Your OTP:</p>

        <div class="otp">
            {{ $otp }}
        </div>

        <p class="note">
            This OTP is valid for {{ $expiryMinutes }} minutes.
            Please do not share this code with anyone.
        </p>

        <p>
            Warm regards,<br>
            Team Fundink
        </p>

        <p>
            Simplifying funding. Accelerating impact.
        </p>

    </div>
</body>
</html>
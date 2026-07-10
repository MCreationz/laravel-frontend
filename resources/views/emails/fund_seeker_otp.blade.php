<!DOCTYPE html>
<html>
<head>
    <title>Fundink OTP</title>
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
            font-size: 24px;
            font-weight: bold;
            margin: 20px 0;
            letter-spacing: 2px;
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

        <p>Welcome to Fundink!</p>

        <p>
            Thank you for choosing Fundink to begin your funding journey.
            To complete your registration, please verify your email address
            using the One-Time Password below:
        </p>

        <p>Your OTP:</p>

        <div class="otp">
            {{ $otp }}
        </div>

        <p class="note">
            This OTP is valid for {{ $expiryMinutes }} minutes.
            For your security, please do not share this code with anyone.
        </p>

        <p>
            Once verified, you're just a few steps away from exploring
            funding opportunities tailored to your organization.
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
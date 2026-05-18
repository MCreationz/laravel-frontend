<!DOCTYPE html>
<html>
<head>
    <title>Fundink OTP</title>
    <style>
        body { font-family: Arial, sans-serif; color: #333; }
        .container { max-width: 600px; margin: auto; padding: 20px; border: 1px solid #eee; }
        .otp { font-size: 24px; font-weight: bold; margin: 20px 0; }
        .note { font-size: 14px; color: #666; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Hello {{ $organization->organization_name }},</h2>
        <p>Thank you for registering as a Startup on Fundink. Please verify your email using the OTP below:</p>
        <div class="otp">{{ $otp }}</div>
        <p class="note">This OTP is valid for {{ $expiryMinutes }} minutes.</p>
        <p>We look forward to your contributions!</p>
        <p>— The Fundink Team</p>
    </div>
</body>
</html>
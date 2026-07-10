<!DOCTYPE html>
<html>
<head>
    <title>Fundink Registration Complete</title>
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
        .button {
            display: inline-block;
            padding: 12px 20px;
            background: #1a73e8;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
            margin: 20px 0;
        }
    </style>
</head>
<body>
    <div class="container">

        <p>Dear {{ $organization->organization_name }},</p>

        <p>Welcome to Fundink!</p>

        <p>
            Your registration has been successfully completed, and we're thrilled
            to have you join the Fundink community.
        </p>

        <p>
            You can now log in using the password you created and complete your
            organization profile to explore hundreds of funding opportunities.
        </p>

      <p>
    <a href="{{ route('login') }}" class="button" style="color: #ffffff !important;">
        Login to Fundink
    </a>
</p>

        <p>
            From concept notes to detailed proposals, we're here to make your
            funding journey smoother, faster, and more transparent.
            If you need any assistance getting started, feel free to reach out anytime.
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
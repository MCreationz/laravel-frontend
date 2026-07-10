<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Organization Details Received</title>
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
            color: #ffffff !important;
            text-decoration: none;
            border-radius: 4px;
            margin: 20px 0;
        }
    </style>
</head>

<body>
<div class="container">

    <p>
        Dear {{ $application->organization->profile->leagal_name }},
    </p>

    <p>
        Thank you for submitting Part 1 of your organization details on Fundink.
        Your organization profile
        <strong>{{ $application->organization->profile->legal_name }}</strong>
        has been saved successfully.
    </p>

    <p>
        To complete your application, please proceed to the Application Form and
        share more about your project or venture.
    </p>

    <p>
        <a href="{{ $continueUrl }}" class="button" style="color:#ffffff !important;">
            Continue Application
        </a>
    </p>

    <p>
        Warm regards,<br>
        Team Fundink
    </p>

</div>
</body>
</html>
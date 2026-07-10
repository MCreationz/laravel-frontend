<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Your Fundink Application Has Been Received</title>
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

    <p>Dear {{ $application->organization->profile->legal_name }},</p>

    <p>
        Thank you for submitting your application for
        <strong>{{ $application->organization->profile->legal_name }}</strong>
        under the
        <strong>{{ $application->theme->theme_name }}</strong>
        theme
        @if($application->subTheme)
            (Sub Theme: <strong>{{ $application->subTheme->sub_theme_name }}</strong>)
        @endif.
        We've received your project/venture details and our review team will now
        evaluate your submission.
    </p>

    <p>
        You can track the status of your application anytime from your Fundink dashboard.
    </p>

    <p>
        <a href="{{ route('dashboard') }}" class="button" style="color:#ffffff !important;">
            Go to Dashboard
        </a>
    </p>

    <p>
        To complete your application, please also upload the required organization
        documents (Part 2) at your earliest convenience.
    </p>

    <p>
        Thank you for choosing Fundink as your funding partner.
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
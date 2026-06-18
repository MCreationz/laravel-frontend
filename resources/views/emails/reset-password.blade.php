<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Reset Password</title>
</head>
<body>

    <h2>Reset Password</h2>

    <p>Hello,</p>

    <p>
        We received a request to reset your password.
    </p>

    <p>
        <a href="{{ $resetUrl }}">
            Reset Password
        </a>
    </p>

    <p>
        This link will expire in 30 minutes.
    </p>

    <p>
        If you did not request a password reset, please ignore this email.
    </p>

</body>
</html>
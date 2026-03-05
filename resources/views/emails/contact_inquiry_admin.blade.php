<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>New Contact Inquiry</title>
</head>
<body>

    <h2>New Contact Inquiry Received</h2>

    <p><strong>Organization Name:</strong> {{ $contact->organization_name }}</p>
    <p><strong>Contact Person:</strong> {{ $contact->contact_person }}</p>
    <p><strong>Email:</strong> {{ $contact->email }}</p>
    <p><strong>Phone:</strong> {{ $contact->phone }}</p>
    <p><strong>User Type:</strong> {{ $contact->user_type }}</p>
    <p><strong>Heard About Us:</strong> {{ $contact->hear_about_us }}</p>
    <p><strong>Requirement:</strong></p>
    <p>{{ $contact->requirement }}</p>

</body>
</html>
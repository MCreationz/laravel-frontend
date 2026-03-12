<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="dashboard">

    <div class="d-flex">

        @include('partials.sidebar')

        <div class="flex-grow-1">

            @include('partials.header')

            <main class="pt-2 p-3">
                @yield('content')
            </main>

        </div>

    </div>

</body>

</html>

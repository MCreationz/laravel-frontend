<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Super Admin Dashboard')</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body class="bg-light dashboard light-bg">

    @include('superadmin.layouts.header')


    <!-- Sidebar -->
    @include('superadmin.layouts.sidebar')

    <!-- Main Content -->
    <div class="flex-grow-1 d-flex flex-column">

        <!-- Navbar -->
        <nav class="navbar navbar-light bg-white border-bottom px-4">



        </nav>

        <!-- Page Content -->
        <main class="flex-grow-1 p-3">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @yield('content')
        </main>

        <!-- Footer -->
        <footer class="text-center py-3 border-top bg-light">
            &copy; {{ date('Y') }} Super Admin Panel. All rights reserved.
        </footer>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

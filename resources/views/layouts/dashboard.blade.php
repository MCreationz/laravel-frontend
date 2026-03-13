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

        <div class="">

            @include('partials.header')

            <main class="p-3">

                <div class="step-section position-relative mb-3">
                    <div class="bg-image">
                        <img src="{{ asset('img/dasboard-bg.png') }}" class="img-fluid" alt="steps section"
                            width="100%" height="100%">
                    </div>
                    <div
                        class="row step-wrapper position-absolute justify-content-between align-items-center top-0 start-0 w-100 h-100">
                        <div class="col step bold position-relative">
                            <div class="step-inner">
                                <div class="step-circle active d-flex justify-content-center align-items-center">
                                    <img src="{{ asset('img/direction.png') }}" class="object-fit-contain"
                                        alt="steps section" width="15px" height="11px">
                                </div>
                                <p>1. Organization Details</p>
                            </div>
                            <div class="progress-dots position-absolute">
                                <span class="dot one"></span>
                                <span class="dot two"></span>
                                <span class="dot three"></span>
                                <span class="dot four"></span>
                                <span class="dot five"></span>
                                <span class="dot five"></span>
                                <span class="dot six"></span>
                                <span class="dot seven"></span>
                                <span class="dot nine"></span>
                                <span class="dot"></span>
                                <span class="dot"></span>
                                <span class="dot"></span>
                            </div>
                        </div>
                        <div class="col step bold">
                            <div class="step-inner">
                                <div class="step-circle next d-flex justify-content-center align-items-center">
                                    <span></span>
                                </div>
                                <p>2. Office / Portal Address</p>
                            </div>

                            <div class="progress-dots position-absolute">
                                <span class="dot one"></span>
                                <span class="dot two"></span>
                                <span class="dot three"></span>
                                <span class="dot four"></span>
                                <span class="dot five"></span>
                                <span class="dot five"></span>
                                <span class="dot six"></span>
                                <span class="dot seven"></span>
                                <span class="dot nine"></span>
                                <span class="dot"></span>
                                <span class="dot"></span>
                                <span class="dot"></span>
                            </div>
                        </div>

                        <div class="col step">
                            <div class="step-circle d-flex justify-content-center align-items-center">
                                <span></span>
                            </div>
                            <p>3. Not-for Profit/For Profit</p>
                        </div>

                    </div>
                </div>

                @yield('content')
            </main>

        </div>

    </div>

</body>
<script>
    const toggleBtn = document.getElementById("sidebar-toggle");
    const sidebar = document.querySelector("body");

    toggleBtn.addEventListener("click", () => {
        sidebar.classList.toggle("sidebar-active");
    });
</script>

</html>

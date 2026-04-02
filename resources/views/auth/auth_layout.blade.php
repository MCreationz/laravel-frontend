<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Authentication')</title>

    <!-- App CSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <!-- Optional: Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preload" href="/fonts/Coolvetica-Regular.woff2" as="font" type="font/woff2" crossorigin>

    <link rel="preload" href="/fonts/Inter18pt-Regular.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/fonts/Inter18pt-Medium.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/fonts/Inter18pt-SemiBold.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/fonts/Inter18pt-Bold.woff2" as="font" type="font/woff2" crossorigin>
</head>

<body>
    <div id="pageLoader"
        style="
    display:none;
    position:fixed;
    top:0;
    left:0;
    width:100%;
    height:100%;
    background:rgba(255,255,255,0.7);
    z-index:9999;
    justify-content:center;
    align-items:center;
">
        <div class="spinner-border text-primary"></div>
    </div>
    <div class="auth-wrapper position-relative">
        <div class="bg-image position-absolute top-0 end-0 bottm-0 start-0 w-100">
            <img src="{{ asset('img/beautiful-girl-works-office.webp') }}" alt="FundInk graphic image"
                class="rounded-0 img-fluid" width="100%" height="100%" fetchpriority="high">
        </div>
        <div class="auth-inner d-flex justify-content-between gap-4 gap-lg-2 align-items-stretch position-relative ">
            <div class="col-lg-7 left-logo-col d-flex flex-column justify-content-between gap-2">
                <div class="logo">
                    <img src="{{ asset('img/white-logo.png') }}" alt="FundInk site logo" width="197.8251190185547px"
                        fetchpriority="high" height="42px">
                </div>
                <div class="bottom-content pb-lg-4">
                    <h1 class="mb-3 pb-1">Join India’s first AI-powered funding platform.</h1>
                    <div class="row icon-with-text gap-2 gap-lg-4">
                        <div class="col-auto">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                        viewBox="0 0 15 15" fill="none">
                                        <g clip-path="url(#clip0_3723_3729)">
                                            <path
                                                d="M14.5711 2.05069C14.3504 1.82964 13.9924 1.82926 13.7717 2.04975L6.98968 8.81387L4.54274 6.15626C4.33131 5.92675 3.97383 5.91187 3.74393 6.12328C3.51422 6.33471 3.49951 6.69237 3.71094 6.92208L6.55643 10.0123C6.60798 10.0684 6.67033 10.1134 6.73973 10.1447C6.80913 10.176 6.88414 10.193 6.96026 10.1946C6.96439 10.1947 6.96838 10.1947 6.97233 10.1947C7.12193 10.1947 7.26543 10.1354 7.37144 10.0299L14.5699 2.85023C14.7912 2.62977 14.7915 2.27173 14.5711 2.05069Z"
                                                fill="white" />
                                            <path
                                                d="M14.4347 6.93466C14.1224 6.93466 13.8693 7.18772 13.8693 7.5C13.8693 11.0122 11.0122 13.8693 7.5 13.8693C3.98801 13.8693 1.13065 11.0122 1.13065 7.5C1.13065 3.98801 3.98801 1.13065 7.5 1.13065C7.81225 1.13065 8.06534 0.877588 8.06534 0.565342C8.06534 0.253066 7.81225 0 7.5 0C3.36445 0 0 3.36445 0 7.5C0 11.6354 3.36445 15 7.5 15C11.6354 15 15 11.6354 15 7.5C15 7.18775 14.7469 6.93466 14.4347 6.93466Z"
                                                fill="white" />
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_3723_3729">
                                                <rect width="15" height="15" fill="white" />
                                            </clipPath>
                                        </defs>
                                    </svg>
                                </div>
                                <div class="flex-grow-1 ms-2">
                                    Active Funds
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                        viewBox="0 0 15 15" fill="none">
                                        <g clip-path="url(#clip0_3723_3729)">
                                            <path
                                                d="M14.5711 2.05069C14.3504 1.82964 13.9924 1.82926 13.7717 2.04975L6.98968 8.81387L4.54274 6.15626C4.33131 5.92675 3.97383 5.91187 3.74393 6.12328C3.51422 6.33471 3.49951 6.69237 3.71094 6.92208L6.55643 10.0123C6.60798 10.0684 6.67033 10.1134 6.73973 10.1447C6.80913 10.176 6.88414 10.193 6.96026 10.1946C6.96439 10.1947 6.96838 10.1947 6.97233 10.1947C7.12193 10.1947 7.26543 10.1354 7.37144 10.0299L14.5699 2.85023C14.7912 2.62977 14.7915 2.27173 14.5711 2.05069Z"
                                                fill="white" />
                                            <path
                                                d="M14.4347 6.93466C14.1224 6.93466 13.8693 7.18772 13.8693 7.5C13.8693 11.0122 11.0122 13.8693 7.5 13.8693C3.98801 13.8693 1.13065 11.0122 1.13065 7.5C1.13065 3.98801 3.98801 1.13065 7.5 1.13065C7.81225 1.13065 8.06534 0.877588 8.06534 0.565342C8.06534 0.253066 7.81225 0 7.5 0C3.36445 0 0 3.36445 0 7.5C0 11.6354 3.36445 15 7.5 15C11.6354 15 15 11.6354 15 7.5C15 7.18775 14.7469 6.93466 14.4347 6.93466Z"
                                                fill="white" />
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_3723_3729">
                                                <rect width="15" height="15" fill="white" />
                                            </clipPath>
                                        </defs>
                                    </svg>
                                </div>
                                <div class="flex-grow-1 ms-2">
                                    Clear Timelines
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                        viewBox="0 0 15 15" fill="none">
                                        <g clip-path="url(#clip0_3723_3729)">
                                            <path
                                                d="M14.5711 2.05069C14.3504 1.82964 13.9924 1.82926 13.7717 2.04975L6.98968 8.81387L4.54274 6.15626C4.33131 5.92675 3.97383 5.91187 3.74393 6.12328C3.51422 6.33471 3.49951 6.69237 3.71094 6.92208L6.55643 10.0123C6.60798 10.0684 6.67033 10.1134 6.73973 10.1447C6.80913 10.176 6.88414 10.193 6.96026 10.1946C6.96439 10.1947 6.96838 10.1947 6.97233 10.1947C7.12193 10.1947 7.26543 10.1354 7.37144 10.0299L14.5699 2.85023C14.7912 2.62977 14.7915 2.27173 14.5711 2.05069Z"
                                                fill="white" />
                                            <path
                                                d="M14.4347 6.93466C14.1224 6.93466 13.8693 7.18772 13.8693 7.5C13.8693 11.0122 11.0122 13.8693 7.5 13.8693C3.98801 13.8693 1.13065 11.0122 1.13065 7.5C1.13065 3.98801 3.98801 1.13065 7.5 1.13065C7.81225 1.13065 8.06534 0.877588 8.06534 0.565342C8.06534 0.253066 7.81225 0 7.5 0C3.36445 0 0 3.36445 0 7.5C0 11.6354 3.36445 15 7.5 15C11.6354 15 15 11.6354 15 7.5C15 7.18775 14.7469 6.93466 14.4347 6.93466Z"
                                                fill="white" />
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_3723_3729">
                                                <rect width="15" height="15" fill="white" />
                                            </clipPath>
                                        </defs>
                                    </svg>
                                </div>
                                <div class="flex-grow-1 ms-2">
                                    Fully Digital
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col form-col d-flex flex-column justify-content-center">
                <div class="form-col-wrap">
                    {{-- Flash Messages --}}
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

                    {{-- Page Content --}}
                    @yield('content')

                </div>
            </div>

        </div>
    </div>

    <!-- App JS -->
    <script src="{{ asset('js/app.js') }}"></script>

</body>
<script>
    document.querySelectorAll('form').forEach(function(form) {
        form.addEventListener('submit', function() {
            document.getElementById('pageLoader').style.display = 'flex';
        });
    });
</script>

<script>
    document.querySelectorAll(".select-wrapper").forEach(function(wrapper) {

        const selectBox = wrapper.querySelector(".custom-select");
        const optionsList = wrapper.querySelector(".select-list");
        const hiddenInput = wrapper.querySelector(".hidden-select");

        selectBox.addEventListener("click", function(e) {
            e.stopPropagation();

            document.querySelectorAll(".select-list").forEach(list => {
                if (list !== optionsList) list.style.display = "none";
            });

            optionsList.style.display =
                optionsList.style.display === "block" ? "none" : "block";
        });

        optionsList.querySelectorAll("li").forEach(function(option) {

            option.addEventListener("click", function() {

                selectBox.textContent = this.textContent;
                hiddenInput.value = this.getAttribute("data-value");

                optionsList.style.display = "none";
            });

        });

    });

    document.addEventListener("click", function() {
        document.querySelectorAll(".select-list").forEach(list => {
            list.style.display = "none";
        });
    });
</script>

</html>

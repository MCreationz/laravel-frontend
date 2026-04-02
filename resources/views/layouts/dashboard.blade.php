<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preload" href="/fonts/Coolvetica-Regular.woff2" as="font" type="font/woff2" crossorigin>

    <link rel="preload" href="/fonts/Inter18pt-Regular.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/fonts/Inter18pt-Medium.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/fonts/Inter18pt-SemiBold.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/fonts/Inter18pt-Bold.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

</head>

<body class="dashboard">

    <div class="">

        @include('partials.sidebar')

        <div class="">

            @include('partials.header')

            <main class="p-3">
                <div id="pageLoader" style="
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



                @yield('content')
            </main>

        </div>

    </div>

</body>

<style>
    #toast-container>div {
        position: relative;
    }

    /* Fix close (×) button */
    .toast-close-button {
        position: absolute;
        top: 6px;
        right: 10px;
        font-size: 18px;
        color: #fff !important;
        opacity: 0.8;
    }

    /* Better hover */
    .toast-close-button:hover {
        opacity: 1;
    }

    #toast-container>div {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 14px 16px 14px 50px !important;
        /* space for icon */
        position: relative;
    }

    /* Fix icon position */
    #toast-container>div::before {
        position: absolute;
        left: 15px;
        top: 50%;
        transform: translateY(-50%);
    }

    /* Force white text globally inside toast */
    #toast-container>div,
    #toast-container>div * {
        color: #fff !important;
    }

    /* Also ensure base toast class doesn't override */
    .toast {
        color: #fff !important;
    }

    /* Toast container spacing */
    #toast-container>div {
        border-radius: 10px;
        padding: 14px 18px;
        font-size: 14px;
        font-weight: 500;
        opacity: 1 !important;
        /* REMOVE transparency */
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
    }

    /* Success */
    .toast-success {
        background-color: #16a34a !important;
        color: #fff !important;
    }

    /* Error */
    .toast-error {
        background-color: #dc2626 !important;
        color: #fff !important;
    }

    /* Warning */
    .toast-warning {
        background-color: #f59e0b !important;
        color: #fff !important;
    }

    /* Info */
    .toast-info {
        background-color: #2563eb !important;
        color: #fff !important;
    }

    /* Remove default background image (icons) */
    .toast {
        background-image: none !important;
    }

    /* Close button */
    .toast-close-button {
        color: #fff !important;
        opacity: 0.8;
    }

    .toast-close-button:hover {
        opacity: 1;
    }
</style>


@yield('scripts')
<script>
    toastr.options = {
        closeButton: true,
        progressBar: true,
        newestOnTop: true,
        positionClass: "toast-top-right",
        timeOut: "3500",
        showDuration: "300",
        hideDuration: "200",
        showMethod: "fadeIn",
        hideMethod: "fadeOut"
    };
    @if(session('success'))
        toastr.success("{{ session('success') }}");
    @endif

    @if(session('error'))
        toastr.error("{{ session('error') }}");
    @endif

    @if(session('warning'))
        toastr.warning("{{ session('warning') }}");
    @endif

    @if(session('info'))
        toastr.info("{{ session('info') }}");
    @endif

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            toastr.error("{{ $error }}");
        @endforeach
    @endif
</script>

<script>
    const toggleBtn = document.getElementById("sidebar-toggle");
    const sidebar = document.querySelector("body");

    toggleBtn.addEventListener("click", () => {
        sidebar.classList.toggle("sidebar-active");
    });
</script>

<script>
    document.querySelectorAll(".select-wrapper").forEach(function (wrapper) {

        const selectBox = wrapper.querySelector(".custom-select");
        const optionsList = wrapper.querySelector(".select-list");
        const hiddenInput = wrapper.querySelector(".hidden-select");

        selectBox.addEventListener("click", function (e) {
            e.stopPropagation();

            document.querySelectorAll(".select-list").forEach(list => {
                if (list !== optionsList) list.style.display = "none";
            });

            optionsList.style.display =
                optionsList.style.display === "block" ? "none" : "block";
        });

        optionsList.querySelectorAll("li").forEach(function (option) {

            option.addEventListener("click", function () {

                selectBox.textContent = this.textContent;
                hiddenInput.value = this.getAttribute("data-value");

                optionsList.style.display = "none";
            });

        });

    });

    document.addEventListener("click", function () {
        document.querySelectorAll(".select-list").forEach(list => {
            list.style.display = "none";
        });
    });
</script>
</script>
<script>
    document.querySelectorAll('.select-wrapper').forEach(wrapper => {

        const display = wrapper.querySelector('.custom-select');
        const hiddenInput = wrapper.querySelector('input[type="hidden"]');
        const options = wrapper.querySelectorAll('.select-list li');

        options.forEach(option => {

            option.addEventListener('click', function () {

                const value = this.getAttribute('data-value');

                // update visible text
                display.textContent = value;

                // update hidden input (this is what gets submitted)
                hiddenInput.value = value;

            });

        });

    });
</script>


</html>
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
</head>

<body class="dashboard">

    <div class="">

        @include('partials.sidebar')

        <div class="">

            @include('partials.header')

            <main class="p-3">
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



                @yield('content')
            </main>

        </div>

    </div>

</body>

@yield('scripts')


<script>
    const toggleBtn = document.getElementById("sidebar-toggle");
    const sidebar = document.querySelector("body");

    toggleBtn.addEventListener("click", () => {
        sidebar.classList.toggle("sidebar-active");
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
</script>
<script>
    document.querySelectorAll('.select-wrapper').forEach(wrapper => {

        const display = wrapper.querySelector('.custom-select');
        const hiddenInput = wrapper.querySelector('input[type="hidden"]');
        const options = wrapper.querySelectorAll('.select-list li');

        options.forEach(option => {

            option.addEventListener('click', function() {

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

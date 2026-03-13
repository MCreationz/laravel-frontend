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
</head>

<body>
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
    <div class="auth-wrapper">
        <div class="row justify-content-between gap-4 gap-lg-2 align-items-stretch">
            <div class="col left-logo-col position-relative">
                <div class="bg-image">
                    <img src="{{ asset('img/bg-image.png') }}" alt="FundInk graphic image" class="img-fluid"
                        width="100%" height="100%">
                </div>

                <div class="logo position-absolute">
                    <img src="{{ asset('img/FundInk-logo.svg') }}" alt="FundInk site logo" width="197.8251190185547px"
                        height="42px">
                </div>
            </div>
            <div class="col form-col">
                <div class="form-col-wrap">


                    {{-- <h3 class="text-center mb-4">
                    @yield('heading', 'Welcome')
                </h3> --}}

                    {{-- Flash Messages --}}
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    {{-- @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif --}}

                    {{-- Validation Errors --}}
                    {{-- @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif --}}

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
    form.addEventListener('submit', function () {
        document.getElementById('pageLoader').style.display = 'flex';
    });
});
</script>
</html>

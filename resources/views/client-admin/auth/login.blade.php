<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client Admin Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background:#f5f7fb;">

    <div class="container">
        <div class="row justify-content-center align-items-center vh-100">

            <div class="col-md-5">

                <div class="card border-0 shadow-sm rounded-4">
                    <div class="card-body p-5">

                        <div class="text-center mb-4">
                            <h2 class="fw-bold">Client Admin Login</h2>
                            <p class="text-muted mb-0">
                                Login to access your dashboard
                            </p>
                        </div>

                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('client-admin.login.submit') }}">

                            @csrf

                            <div class="mb-3">
                                <label class="form-label">Email Address</label>

                                <input
                                    type="email"
                                    name="email"
                                    class="form-control form-control-lg"
                                    value="{{ old('email') }}"
                                    required
                                >
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Password</label>

                                <input
                                    type="password"
                                    name="password"
                                    class="form-control form-control-lg"
                                    required
                                >
                            </div>

                            <div class="mb-3 form-check">
                                <input
                                    type="checkbox"
                                    class="form-check-input"
                                    name="remember"
                                    id="remember"
                                >

                                <label class="form-check-label" for="remember">
                                    Remember Me
                                </label>
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    Login
                                </button>
                            </div>

                        </form>

                    </div>
                </div>

            </div>

        </div>
    </div>

</body>

</html>
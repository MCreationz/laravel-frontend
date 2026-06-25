@extends('layouts.dashboard')

@section('page_title', 'Settings')

@section('content')

    <div class="container-fluid">

        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white">
                <h5 class="mb-0">Change Password</h5>
            </div>

            <div class="card-body">

                <form method="POST" action="{{ route('settings.password.update') }}">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">
                            Current Password
                        </label>

                        <input type="password" name="current_password" class="form-control" required>

                        @error('current_password')
                            <div class="text-danger small mt-1">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">
                            New Password
                        </label>

                        <input type="password" name="password" class="form-control" required>

                        @error('password')
                            <div class="text-danger small mt-1">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="form-label">
                            Confirm New Password
                        </label>

                        <input type="password" name="password_confirmation" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-primary">
                        Update Password
                    </button>

                </form>

            </div>
        </div>

    </div>

@endsection
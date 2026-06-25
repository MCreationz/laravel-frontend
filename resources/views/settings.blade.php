@extends('layouts.dashboard')

@section('page_title', 'Settings')

@section('content')

    <div class="card p-3 p-md-4 border-0 mb-3">
        <h1 class="top-heading mb-4">Change Password</h1>
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

@endsection

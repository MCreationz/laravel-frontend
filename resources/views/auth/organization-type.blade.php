@extends('auth.auth_layout')

@section('title', 'Select Organization Type')
@section('heading', 'Choose Your Organization Type')

@section('content')

    <div class="form-heading mb-5 pb-lg-4">
        <h1>Select Your Organization Type</h1>
        <p class="font-small">
            Choose the type of organization you represent to continue with the registration process.
        </p>
    </div>

    <form id="organizationTypeForm"
        method="POST"
        action="{{ route('organization.type.store') }}"
        class="register-form row form-fields-wrap d-flex flex-wrap justify-content-between flex-column">
        @csrf

        <div class="fields-wrap">

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

            @error('organization_type')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror

            <ul class="select-list organization-list list-unstyled m-0 p-0">
                <li data-value="fund_seeker" class="organization-item">
                    <div class="organization-title">
                        Non-Profit Organization (NPO)
                    </div>
                    <div class="organization-description font-small">
                        Register as a non-profit organization seeking funding and support.
                    </div>
                </li>

                <li data-value="funder" class="organization-item">
                    <div class="organization-title">
                        Startup
                    </div>
                    <div class="organization-description font-small">
                        Register as a startup looking to connect with investors and funding opportunities.
                    </div>
                </li>
            </ul>

            <input type="hidden" name="organization_type" id="organization_type">
        </div>

        <div class="account-wrap">
            <div class="col-12 login-text text-center mt-4">
                <p class="text-decoration-none">
                    By continuing you agree to our
                    <a href="#">privacy policy</a>
                    and
                    <a href="#">terms of use</a>.
                </p>
                <p>
                    Already have an account?
                    <a href="{{ route('login') }}">Login</a>
                </p>
            </div>
        </div>
    </form>

    <style>
        .organization-list {
            display: flex;
            flex-direction: column;
            gap: 16px;
        }

        .organization-item {
            border: 1px solid #d9d9d9;
            border-radius: 12px;
            padding: 18px 20px;
            cursor: pointer;
            transition: all 0.3s ease;
            background: #fff;
        }

        .organization-item:hover {
            border-color: #0d6efd;
            box-shadow: 0 4px 12px rgba(13, 110, 253, 0.08);
        }

        .organization-item.active {
            border-color: #0d6efd;
            background: #f5f9ff;
            box-shadow: 0 4px 12px rgba(13, 110, 253, 0.12);
        }

        .organization-title {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 6px;
        }

        .organization-description {
            color: #6c757d;
            line-height: 1.5;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const form = document.getElementById('organizationTypeForm');
            const hiddenInput = document.getElementById('organization_type');
            const items = document.querySelectorAll('.organization-item');

            items.forEach(item => {
                item.addEventListener('click', function () {
                    // Optional visual feedback
                    items.forEach(li => li.classList.remove('active'));
                    this.classList.add('active');

                    // Set selected value
                    hiddenInput.value = this.dataset.value;

                    // Submit form automatically
                    form.submit();
                });
            });
        });
    </script>

@endsection
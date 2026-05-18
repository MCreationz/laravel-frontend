@extends('auth.auth_layout')

@section('title', 'Select Organization Type')
@section('heading', 'Choose Your Organization Type')

@section('content')

    <div class="form-heading mb-5">
        <div class="gradient-icon mb-4">
            <img src="{{ asset('img/direction.png') }}" alt="direction icon" width="25.228912353515625"
                height="18.28917694091797" fetchpriority="high">
        </div>
        <h2 class="h1 mb-2">Welcome to Fundink</h2>
        <p class="font-small">Start your funding journey. Select what best describe your organization.</p>
    </div>

    <div class="form-wrap">
        <form id="organizationTypeForm" action="{{ route('organization.type.store') }}" method="POST">
            @csrf
            <input type="hidden" name="organization_type" id="organization_type">

            @error('organization_type')
                <div class="alert alert-danger mb-3">
                    {{ $message }}
                </div>
            @enderror

            <div class="card-box mb-4 position-relative organization-card" data-value="fund_seeker">
                <div class="card-wrap p-3">
                    <div class="d-flex align-items-center gap-3 mb-3">
                        <div class="gradient-icon">
                            <img src="{{ asset('img/non-profit.png') }}" alt="Non Profit">
                        </div>
                        <div class="flex-1">
                            <h3 class="mb-0">Non-Profit Organisation</h3>
                        </div>
                    </div>

                    <p class="mb-2">
                        Access curated funding calls powered by CSR Foundations,
                        Social Impact Funds, Philanthropy & Family Offices.
                    </p>

                    <a href="javascript:void(0)" class="simple-link">
                        Register as NPO
                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="7" viewBox="0 0 15 7" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M10.8525 0.155366C10.958 0.05588 11.1009 0 11.25 0C11.3991 0 11.542 0.05588 11.6475 0.155366L14.46 2.81162C14.5653 2.91123 14.6245 3.04625 14.6245 3.18703C14.6245 3.32781 14.5653 3.46284 14.46 3.56245L11.6475 6.2187C11.596 6.27089 11.5339 6.31276 11.4649 6.34179C11.3959 6.37083 11.3214 6.38644 11.2459 6.3877C11.1704 6.38896 11.0953 6.37584 11.0253 6.34912C10.9553 6.3224 10.8916 6.28263 10.8382 6.23218C10.7848 6.18174 10.7427 6.12165 10.7144 6.0555C10.6861 5.98935 10.6722 5.91849 10.6736 5.84716C10.6749 5.77583 10.6914 5.70548 10.7222 5.64032C10.7529 5.57515 10.7972 5.5165 10.8525 5.46787L12.705 3.71828H0.5625C0.413316 3.71828 0.270242 3.66231 0.164752 3.56268C0.0592632 3.46305 0 3.32793 0 3.18703C0 3.04614 0.0592632 2.91101 0.164752 2.81138C0.270242 2.71175 0.413316 2.65578 0.5625 2.65578H12.705L10.8525 0.906199C10.7472 0.806589 10.688 0.671564 10.688 0.530783C10.688 0.390001 10.7472 0.254975 10.8525 0.155366Z"
                                fill="url(#paint0_linear_1)" />
                            <defs>
                                <linearGradient id="paint0_linear_1" x1="4.05182" y1="4.34478" x2="8.06922" y2="0.350854"
                                    gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#0160D6" />
                                    <stop offset="1" stop-color="#07CCB5" />
                                </linearGradient>
                            </defs>
                        </svg>
                    </a>
                </div>
            </div>

            <div class="card-box mt-2 position-relative organization-card" data-value="funder">
                <div class="card-wrap p-3">
                    <div class="d-flex align-items-center gap-3 mb-3">
                        <div class="gradient-icon">
                            <img src="{{ asset('img/startup.png') }}" alt="Startup">
                        </div>
                        <div class="flex-1">
                            <h3 class="mb-0">Startup</h3>
                        </div>
                    </div>

                    <p class="mb-2">
                        Access active funding calls powered by top Incubators
                        and Venture Capitalists.
                    </p>

                    <a href="javascript:void(0)" class="simple-link">
                        Register as Startup
                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="7" viewBox="0 0 15 7" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M10.8525 0.155366C10.958 0.05588 11.1009 0 11.25 0C11.3991 0 11.542 0.05588 11.6475 0.155366L14.46 2.81162C14.5653 2.91123 14.6245 3.04625 14.6245 3.18703C14.6245 3.32781 14.5653 3.46284 14.46 3.56245L11.6475 6.2187C11.596 6.27089 11.5339 6.31276 11.4649 6.34179C11.3959 6.37083 11.3214 6.38644 11.2459 6.3877C11.1704 6.38896 11.0953 6.37584 11.0253 6.34912C10.9553 6.3224 10.8916 6.28263 10.8382 6.23218C10.7848 6.18174 10.7427 6.12165 10.7144 6.0555C10.6861 5.98935 10.6722 5.91849 10.6736 5.84716C10.6749 5.77583 10.6914 5.70548 10.7222 5.64032C10.7529 5.57515 10.7972 5.5165 10.8525 5.46787L12.705 3.71828H0.5625C0.413316 3.71828 0.270242 3.66231 0.164752 3.56268C0.0592632 3.46305 0 3.32793 0 3.18703C0 3.04614 0.0592632 2.91101 0.164752 2.81138C0.270242 2.71175 0.413316 2.65578 0.5625 2.65578H12.705L10.8525 0.906199C10.7472 0.806589 10.688 0.671564 10.688 0.530783C10.688 0.390001 10.7472 0.254975 10.8525 0.155366Z"
                                fill="url(#paint0_linear_2)" />
                            <defs>
                                <linearGradient id="paint0_linear_2" x1="4.05182" y1="4.34478" x2="8.06922" y2="0.350854"
                                    gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#0160D6" />
                                    <stop offset="1" stop-color="#07CCB5" />
                                </linearGradient>
                            </defs>
                        </svg>
                    </a>
                </div>
            </div>
        </form>

        <div class="account-wrap mt-4">
            <div class="col-12 login-text text-center">
                <p class="already-text">
                    Already have an account? <a href="{{ route('login') }}">Log in</a>
                </p>
            </div>
        </div>
    </div>

    <script>
        document.querySelectorAll('.organization-card').forEach(card => {
            card.addEventListener('click', function () {
                document.getElementById('organization_type').value = this.dataset.value;
                document.getElementById('organizationTypeForm').submit();
            });
        });
    </script>

@endsection
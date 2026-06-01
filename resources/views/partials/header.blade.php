<header class="header px-3 px-lg-4 position-fixed top-0">
    <div class="row justify-content-between align-items-center h-100">
        <div class="col-auto d-flex gap-3 align-items-center">
            <div class="header-toggle">
                <button class="nav-toggle" id="sidebar-toggle" type="button" aria-label="Toggle sidebar">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
            </div>

            @hasSection('header_back_url')
                <a href="@yield('header_back_url')" class="header-back-link text-decoration-none d-flex align-items-center">
                    <i class="bi bi-arrow-left"></i>
                </a>
            @endif

            <p class="mb-0 header-text">@yield('page_title', 'Set up your Profile')</p>
        </div>

        <div class="col logo mobile d-none text-center flex-grow">
            <img src="{{ asset('img/FundInk-logo.svg') }}" alt="Fundink" width="124" height="">
        </div>

        <div class="col-auto">
            <div class="header-links d-flex justify-content-end align-items-center gap-2 gap-lg-3">
                @yield('header_extra')

                <a href="#" class="icon px-2 px-lg-3">
                    <img src="{{ asset('img/notification.svg') }}" alt="Notifications" width="19" height="20">
                </a>

                <div class="d-flex align-items-center ps-1 ps-lg-2">
                    <div class="flex-shrink-0 profile-img">
                        <img src="{{ asset('img/profile.png') }}" alt="Profile" width="36" height="36">
                    </div>
                    <div class="flex-grow-1 ms-2 ms-lg-3 profile-name text-truncate">
                        {{ auth('organization')->user()->organization_name }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

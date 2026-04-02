<header class="header px-3 px-lg-4 position-fixed top-0">
    <div class="row justify-content-between align-items-center">
        <div class="col-auto d-flex gap-3 align-items-center">
            <div class="header-toggle">
                <button class="nav-toggle" id="sidebar-toggle">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
            </div>
            <p class="mb-0 header-text">Set up your Profile</p>
        </div>
        <div class="col logo mobile d-none text-center flex-grow">
            <img src="{{ asset('img/FundInk-logo.svg') }}" alt="FundInk site logo" width="124px" height="">
        </div>
        <div class="col-auto">
            <div class="header-links d-flex justify-content-end align-items-center">
                {{-- <a href="#" class="icon px-2 px-lg-3">
                    <img src="{{ asset('img/email.svg') }}" alt="settings" width="25px" height="20px">
                </a> --}}
                <a href="#" class="icon px-2 px-lg-3">
                    <img src="{{ asset('img/notification.svg') }}" alt="settings" width="18.531612396240234px"
                        height="20px">
                </a>
                <div class="d-flex align-items-center ps-1 ps-lg-3">
                    <div class="flex-shrink-0 profile-img">
                        <img src="{{ asset('img/profile.png') }}" alt="profile" width="36px" height="36px">
                    </div>
                    <div class="flex-grow-1 ms-2 ms-lg-3 profile-name">
                        {{ auth('organization')->user()->organization_name }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

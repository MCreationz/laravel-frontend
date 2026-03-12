<header class="header px-4">
    <div class="row justify-content-between align-items-center">
        <div class="col">
            <p class="mb-0 header-text">Set up your Profile</p>
        </div>
        <div class="col">
            <div class="header-links d-flex justify-content-end align-items-center">
                <a href="#" class="icon px-3">
                    <img src="{{ asset('img/email.svg') }}" alt="settings" width="25px" height="20px">
                </a>
                <a href="#" class="icon px-3">
                    <img src="{{ asset('img/notification.svg') }}" alt="settings" width="18.531612396240234px"
                        height="20px">
                </a>
                <div class="d-flex align-items-center ps-3">
                    <div class="flex-shrink-0">
                        <img src="{{ asset('img/profile.png') }}" alt="profile" width="36px" height="36px">
                    </div>
                    <div class="flex-grow-1 ms-3">
                        {{ auth('organization')->user()->organization_name }}
                    </div>
                </div>
            </div>
        </div>
    </div>





</header>

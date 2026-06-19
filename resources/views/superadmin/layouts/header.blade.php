<header class="header px-3 px-lg-4 position-fixed top-0">
    <div class="row justify-content-between align-items-center h-100">
        <div class="col-auto d-flex gap-3 align-items-center">
            <div class="header-toggle">
                <button class="nav-toggle" id="sidebar-toggle">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
            </div>
            <p class="mb-0 header-text d-none d-md-flex align-items-center gap-2 gap-lg-3">
                @hasSection('header_back')
                    <a href="@yield('header_back')" 
                       class="arrow-icon d-flex align-items-center justify-content-center cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="17"
                            viewBox="0 0 20 17" fill="none">
                            <path d="M8.25 0.75L0.75 8.25L8.25 15.75M0.75 8.25H18.75"
                                stroke="black" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </a>
                @endif

                @yield('header_title', 'Dashboard')

            </p>
        </div>
        <div class="col-auto p-0 logo mobile d-none text-center flex-grow">
            <img src="{{ asset('img/FundInk-logo.svg') }}" alt="FundInk site logo" width="124px" height="">
        </div>
        <div class="col-auto d-flex align-items-center ms-auto">
            <div class="access-content-wrap">
                <div class="access-content">
                    <div class="access-title">Super Admin</div>
                    <div class="access-subtitle">Full Access</div>
                </div>
            </div>
             <div class="header-links d-flex justify-content-end align-items-center">

                {{-- Notifications --}}
                <a href="#" class="icon px-2 px-lg-3">
                    <img src="{{ asset('img/notification.svg') }}" alt="notification" width="18" height="20">
                </a>

                {{-- Profile Dropdown --}}
                <div class="dropdown ps-1 ps-lg-3">

                    <div class="d-flex align-items-center profile-dropdown-toggle" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">

                        <div class="flex-shrink-0 profile-img">
                            <img src="{{ asset('img/profile.png') }}" alt="profile" width="36" height="36">
                        </div>

                        <div class="flex-grow-1 ms-2 ms-lg-3 profile-name">
                            {{ 'Super Admin' }}
                        </div>
                        

                    </div>



                </div>
                <form method="POST" action="{{ route('superadmin.logout') }}" class="m-0">
                            @csrf

                            <button type="submit" class="btn logout-btn">

                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4" />
                                    <polyline points="16 17 21 12 16 7" />
                                    <line x1="21" y1="12" x2="9" y2="12" />
                                </svg>

                            </button>

                        </form>

            </div>

        </div>
    </div>
</header>

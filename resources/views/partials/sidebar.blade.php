<div class="sidebar d-flex flex-column justify-content-between gap-2 position-fixed">
    <div class="logo-wrap">
        <div class="logo ps-3 mb-4 pb-2">
            <img src="{{ asset('img/FundInk-logo.svg') }}" alt="Fundink" class="sidebar-logo" width="164" height="34">
        </div>

        @unless (auth('organization')->user()->isProfileComplete())
            <div class="expert-sec position-relative mt-4">
                <div class="expert-content p-3 p-lg-4">
                    <p class="font-sm gradient-text fw-semibold mb-2">How to raise fund with Fundink</p>
                    <ol class="ps-3 mb-0">
                        <li class="font-sm mb-1">Register your organization</li>
                        <li class="font-sm mb-1">Select Funding Calls</li>
                        <li class="font-sm">Write 1000 words</li>
                    </ol>
                </div>
            </div>
        @else
            <nav class="sidebar-main-nav d-flex flex-column gap-1">
                <a href="{{ route('dashboard') }}"
                    class="d-flex align-items-center text-decoration-none sidebar-links {{ request()->routeIs('dashboard') || request()->routeIs('projects.details') ? 'active' : '' }}">
                    <span class="sidebar-link-icon flex-shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" viewBox="0 0 23 23" fill="none">
                            <path d="M21.0833 8.16484V3.814C21.0833 2.46275 20.47 1.9165 18.9463 1.9165H15.0746C13.5508 1.9165 12.9375 2.46275 12.9375 3.814V8.15525C12.9375 9.51609 13.5508 10.0528 15.0746 10.0528H18.9463C20.47 10.0623 21.0833 9.51609 21.0833 8.16484Z" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M21.0833 18.9463V15.0746C21.0833 13.5508 20.47 12.9375 18.9463 12.9375H15.0746C13.5508 12.9375 12.9375 13.5508 12.9375 15.0746V18.9463C12.9375 20.47 13.5508 21.0833 15.0746 21.0833H18.9463C20.47 21.0833 21.0833 20.47 21.0833 18.9463Z" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M10.0628 8.16484V3.814C10.0628 2.46275 9.44949 1.9165 7.92574 1.9165H4.05408C2.53033 1.9165 1.91699 2.46275 1.91699 3.814V8.15525C1.91699 9.51609 2.53033 10.0528 4.05408 10.0528H7.92574C9.44949 10.0623 10.0628 9.51609 10.0628 8.16484Z" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M10.0628 18.9463V15.0746C10.0628 13.5508 9.44949 12.9375 7.92574 12.9375H4.05408C2.53033 12.9375 1.91699 13.5508 1.91699 15.0746V18.9463C1.91699 20.47 2.53033 21.0833 4.05408 21.0833H7.92574C9.44949 21.0833 10.0628 20.47 10.0628 18.9463Z" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </span>
                    <span class="flex-grow-1 ms-3">Dashboard</span>
                </a>

            <a href="{{ route('discover.funds.index') }}"
   class="d-flex align-items-center text-decoration-none sidebar-links">
    <span class="sidebar-link-icon flex-shrink-0">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
            viewBox="0 0 24 24" fill="none">
            <circle cx="11" cy="11" r="7" stroke="currentColor" stroke-width="1.6"/>
            <path d="M20 20L16.5 16.5" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/>
        </svg>
    </span>

    <span class="flex-grow-1 ms-3">Discover Funds</span>
</a>

                <a href="{{ route('my-applications.index') }}"
                    class="d-flex align-items-center text-decoration-none sidebar-links {{ request()->routeIs('projects.index') ? 'active' : '' }}">
                    <span class="sidebar-link-icon flex-shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M22 10V15C22 20 20 22 15 22H9C4 22 2 20 2 15V9C2 4 4 2 9 2H14" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M22 10H18C15 10 14 9 14 6V2L22 10Z" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M7 13H13" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M7 17H11" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </span>
                    <span class="flex-grow-1 ms-3">My Applications</span>
                </a>

            <a href="{{ route('organization.documents.index') }}"
   class="d-flex align-items-center text-decoration-none sidebar-links">

    <span class="sidebar-link-icon flex-shrink-0">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
            viewBox="0 0 24 24" fill="none">
            <path d="M12 20.25C12 20.25 4.5 14.5 4.5 9.75C4.5 7.67893 6.17893 6 8.25 6C9.564 6 10.721 6.675 11.25 7.725C11.779 6.675 12.936 6 14.25 6C16.3211 6 18 7.67893 18 9.75C18 14.5 12 20.25 12 20.25Z"
                  stroke="currentColor"
                  stroke-width="1.6"
                  stroke-linecap="round"
                  stroke-linejoin="round"/>
        </svg>
    </span>

    <span class="flex-grow-1 ms-3">My Documents</span>
</a>
        @endunless
    </div>

    <div class="sidebar-bottom-nav">
        <a href="#" class="d-flex align-items-center text-decoration-none sidebar-links">
            <span class="sidebar-link-icon flex-shrink-0">
                <i class="bi bi-gear"></i>
            </span>
            <span class="flex-grow-1 ms-3">Settings</span>
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>

        <a href="{{ route('logout') }}" class="d-flex align-items-center text-decoration-none sidebar-links"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <span class="sidebar-link-icon flex-shrink-0">
                <i class="bi bi-box-arrow-right"></i>
            </span>
            <span class="flex-grow-1 ms-3">Logout</span>
        </a>

        <a href="#" class="d-flex align-items-center text-decoration-none sidebar-links">
            <span class="sidebar-link-icon flex-shrink-0">
                <i class="bi bi-question-circle"></i>
            </span>
            <span class="flex-grow-1 ms-3">Need Help?</span>
        </a>
    </div>
</div>

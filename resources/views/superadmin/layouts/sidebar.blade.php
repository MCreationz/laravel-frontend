<div class="sidebar dark-sidebar d-flex flex-column justify-content-between gap-2 position-fixed">
    <div class="logo-wrap">
        <div class="logo ps-3 mb-4 pb-2">
            <img src="{{ asset('img/white-logo.png') }}" alt="FundInk site logo" width="164px" height="34">
        </div>

        <div class="btn-wrap d-flex flex-column">
            <a href="{{ route('superadmin.dashboard') }}"
                class="d-flex align-items-center text-decoration-none sidebar-links  {{ request()->routeIs('superadmin.dashboard') ? 'active' : '' }}">
                <div class="flex-shrink-0">
                    <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" viewBox="0 0 23 23" fill="none">
                        <path
                            d="M21.0833 8.16484V3.814C21.0833 2.46275 20.47 1.9165 18.9463 1.9165H15.0746C13.5508 1.9165 12.9375 2.46275 12.9375 3.814V8.15525C12.9375 9.51609 13.5508 10.0528 15.0746 10.0528H18.9463C20.47 10.0623 21.0833 9.51609 21.0833 8.16484Z"
                            stroke="#8FA1B3" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" />
                        <path
                            d="M21.0833 18.9463V15.0746C21.0833 13.5508 20.47 12.9375 18.9463 12.9375H15.0746C13.5508 12.9375 12.9375 13.5508 12.9375 15.0746V18.9463C12.9375 20.47 13.5508 21.0833 15.0746 21.0833H18.9463C20.47 21.0833 21.0833 20.47 21.0833 18.9463Z"
                            stroke="#8FA1B3" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" />
                        <path
                            d="M10.0628 8.16484V3.814C10.0628 2.46275 9.44949 1.9165 7.92574 1.9165H4.05408C2.53033 1.9165 1.91699 2.46275 1.91699 3.814V8.15525C1.91699 9.51609 2.53033 10.0528 4.05408 10.0528H7.92574C9.44949 10.0623 10.0628 9.51609 10.0628 8.16484Z"
                            stroke="#8FA1B3" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" />
                        <path
                            d="M10.0628 18.9463V15.0746C10.0628 13.5508 9.44949 12.9375 7.92574 12.9375H4.05408C2.53033 12.9375 1.91699 13.5508 1.91699 15.0746V18.9463C1.91699 20.47 2.53033 21.0833 4.05408 21.0833H7.92574C9.44949 21.0833 10.0628 20.47 10.0628 18.9463Z"
                            stroke="#8FA1B3" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </div>
                <div class="flex-grow-1 ms-3 text">Dashboard</div>
            </a>
            <a href="{{ route('superadmin.client-admins.index') }}"
                class="d-flex align-items-center text-decoration-none sidebar-links  {{ request()->routeIs('superadmin.client-admins.index') ? 'active' : '' }}">
                <div class="flex-shrink-0">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path
                            d="M21.0763 8.58003V15.42C21.0763 16.54 20.4763 17.58 19.5063 18.15L13.5662 21.58C12.5962 22.14 11.3963 22.14 10.4163 21.58L4.47625 18.15C3.50625 17.59 2.90625 16.55 2.90625 15.42V8.58003C2.90625 7.46003 3.50625 6.41999 4.47625 5.84999L10.4163 2.42C11.3863 1.86 12.5862 1.86 13.5662 2.42L19.5063 5.84999C20.4763 6.41999 21.0763 7.45003 21.0763 8.58003Z"
                            stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path
                            d="M12.0019 10.9998C13.2887 10.9998 14.3319 9.95662 14.3319 8.6698C14.3319 7.38298 13.2887 6.33984 12.0019 6.33984C10.7151 6.33984 9.67188 7.38298 9.67188 8.6698C9.67188 9.95662 10.7151 10.9998 12.0019 10.9998Z"
                            stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M16 16.6603C16 14.8603 14.21 13.4004 12 13.4004C9.79 13.4004 8 14.8603 8 16.6603"
                            stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </div>
                <div class="flex-grow-1 ms-3 text">Client Admins</div>
            </a>
            <a href="{{ route('superadmin.applicants.index') }}" class="d-flex align-items-center text-decoration-none sidebar-links {{ request()->routeIs('superadmin.applicants.index') ? 'active' : '' }}">
                <div class="flex-shrink-0">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path d="M22 10V15C22 20 20 22 15 22H9C4 22 2 20 2 15V9C2 4 4 2 9 2H14" stroke="white"
                            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M22 10H18C15 10 14 9 14 6V2L22 10Z" stroke="white" stroke-width="1.5"
                            stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M7 13H13" stroke="white" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round" />
                        <path d="M7 17H11" stroke="white" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                </div>
                <div class="flex-grow-1 ms-3 text">Applicants</div>
            </a>
            <a href="{{ route('superadmin.reviewers.index') }}" class="d-flex align-items-center text-decoration-none sidebar-links">
                <div class="flex-shrink-0">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path d="M11 2H9C4 2 2 4 2 9V15C2 20 4 22 9 22H15C20 22 22 20 22 15V13" stroke="white"
                            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path
                            d="M16.0379 3.01928L8.15793 10.8993C7.85793 11.1993 7.55793 11.7893 7.49793 12.2193L7.06793 15.2293C6.90793 16.3193 7.67793 17.0793 8.76793 16.9293L11.7779 16.4993C12.1979 16.4393 12.7879 16.1393 13.0979 15.8393L20.9779 7.95928C22.3379 6.59928 22.9779 5.01928 20.9779 3.01928C18.9779 1.01928 17.3979 1.65928 16.0379 3.01928Z"
                            stroke="white" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                            stroke-linejoin="round" />
                        <path d="M14.9062 4.15039C15.5763 6.54039 17.4463 8.41039 19.8463 9.09039" stroke="white"
                            stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </div>
                <div class="flex-grow-1 ms-3 text">Reviewers</div>
            </a>
            <a href="{{ route('superadmin.funds.index') }}" class="d-flex align-items-center text-decoration-none sidebar-links {{ request()->routeIs('superadmin.funds.index') ? 'active' : '' }}">
                <div class="flex-shrink-0">
                    <svg xmlns="http://www.w3.org/2000/svg" width="23" height="19" viewBox="0 0 23 19" fill="none">
                        <path
                            d="M18.34 5.14996V10.3C18.34 13.38 16.58 14.7 13.94 14.7H5.14999C4.69999 14.7 4.27 14.66 3.87 14.57C3.62 14.53 3.38 14.46 3.16 14.38C1.66 13.82 0.75 12.52 0.75 10.3V5.14996C0.75 2.06996 2.50999 0.75 5.14999 0.75H13.94C16.18 0.75 17.79 1.7 18.22 3.87C18.29 4.27 18.34 4.67996 18.34 5.14996Z"
                            stroke="white" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                            stroke-linejoin="round" />
                        <path
                            d="M21.3372 8.15106V13.3011C21.3372 16.3811 19.5772 17.701 16.9372 17.701H8.14719C7.40719 17.701 6.7372 17.6011 6.1572 17.3811C4.9672 16.9411 4.15719 16.0311 3.86719 14.5711C4.26719 14.6611 4.69719 14.701 5.14719 14.701H13.9372C16.5772 14.701 18.3372 13.3811 18.3372 10.3011V5.15106C18.3372 4.68106 18.2972 4.26109 18.2172 3.87109C20.1172 4.27109 21.3372 5.61106 21.3372 8.15106Z"
                            stroke="white" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                            stroke-linejoin="round" />
                        <path
                            d="M9.53845 10.3699C10.9965 10.3699 12.1785 9.18789 12.1785 7.72986C12.1785 6.27183 10.9965 5.08984 9.53845 5.08984C8.08042 5.08984 6.89844 6.27183 6.89844 7.72986C6.89844 9.18789 8.08042 10.3699 9.53845 10.3699Z"
                            stroke="white" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                            stroke-linejoin="round" />
                        <path d="M3.82031 5.5293V9.92932" stroke="white" stroke-width="1.5" stroke-miterlimit="10"
                            stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M15.2578 5.53125V9.93127" stroke="white" stroke-width="1.5" stroke-miterlimit="10"
                            stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </div>
                <div class="flex-grow-1 ms-3 text">Funds</div>
            </a>
        </div>

    </div>
    <div class="sidebar-boxes mt-5 d-flex flex-column-2 flex-wrap gap-2.5">
    <div class="col single-item">
        <div class="single-box clients">
            <div class="number">{{ \App\Models\ClientAdmin::count() }}</div>
            <div class="text">Clients</div>
        </div>
    </div>

    <div class="col single-item">
        <div class="single-box applicants">
            <div class="number">{{ \App\Models\FundApplication::count() }}</div>
            <div class="text">Applicants</div>
        </div>
    </div>

    <div class="col single-item">
        <div class="single-box reviewers">
            <div class="number">0</div>
            <div class="text">Reviewers</div>
        </div>
    </div>

    <div class="col single-item">
        <div class="single-box funds">
            <div class="number">{{ \App\Models\Fund::count() }}</div>
            <div class="text">Funds</div>
        </div>
    </div>
</div>
</div>

</div>
</div>
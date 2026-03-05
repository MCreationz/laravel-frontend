<aside class="bg-dark text-white p-3 flex-shrink-0" style="width: 280px;">
    <h5 class="text-center mb-4">
        SuperAdmin ({{ auth()->user()->name ?? '' }})
    </h5>

    <ul class="nav nav-pills flex-column gap-1">

        <!-- Dashboard -->
        <li class="nav-item">
            <a href="{{ route('superadmin.dashboard') }}"
                class="nav-link text-white {{ request()->routeIs('superadmin.dashboard') ? 'active bg-secondary' : '' }}">
                <span class="me-2 d-inline-flex justify-content-center" style="width:20px;">
                    <i class="bi bi-speedometer2"></i>
                </span>
                Dashboard
            </a>
        </li>

        <!-- Applications -->
        <li class="nav-item">
            <a href="{{ route('superadmin.applications.index') }}"
                class="nav-link text-white {{ request()->routeIs('superadmin.applications.*') ? 'active bg-secondary' : '' }}">
                <span class="me-2 d-inline-flex justify-content-center" style="width:20px;">
                    <i class="bi bi-file-earmark-text"></i>
                </span>
                Applications
            </a>
        </li>

        <!-- Companies -->
        <li class="nav-item">
            <a href="{{ route('superadmin.companies.index') }}"
                class="nav-link text-white {{ request()->routeIs('superadmin.companies.*') ? 'active bg-secondary' : '' }}">
                <span class="me-2 d-inline-flex justify-content-center" style="width:20px;">
                    <i class="bi bi-buildings"></i>
                </span>
                Companies
            </a>
        </li>

        <!-- Users -->
        <li class="nav-item">
            <a href="{{ route('superadmin.users.index') }}"
                class="nav-link text-white {{ request()->routeIs('superadmin.users.*') ? 'active bg-secondary' : '' }}">
                <span class="me-2 d-inline-flex justify-content-center" style="width:20px;">
                    <i class="bi bi-people"></i>
                </span>
                Users
            </a>
        </li>

        <!-- Divider -->
    <li class="nav-item mt-3">
    <div class="text-uppercase fw-semibold text-light small px-3 opacity-75">
        Configuration
    </div>
</li>


        <!-- Sectors -->
        <li class="nav-item">
            <a href="{{ route('superadmin.sectors.index') }}"
                class="nav-link text-white {{ request()->routeIs('superadmin.sectors.*') ? 'active bg-secondary' : '' }}">
                <span class="me-2 d-inline-flex justify-content-center" style="width:20px;">
                    <i class="bi bi-diagram-3"></i>
                </span>
                Sectors
            </a>
        </li>

        <!-- Funding Categories -->
        <li class="nav-item">
            <a href="{{ route('superadmin.funding-categories.index') }}"
                class="nav-link text-white {{ request()->routeIs('superadmin.funding-categories.*') ? 'active bg-secondary' : '' }}">
                <span class="me-2 d-inline-flex justify-content-center" style="width:20px;">
                    <i class="bi bi-currency-dollar"></i>
                </span>
                Funding Categories
            </a>
        </li>

        <!-- Settings -->
        <li class="nav-item">
            <a href="{{ route('superadmin.settings') }}"
                class="nav-link text-white {{ request()->routeIs('superadmin.settings') ? 'active bg-secondary' : '' }}">
                <span class="me-2 d-inline-flex justify-content-center" style="width:20px;">
                    <i class="bi bi-gear"></i>
                </span>
                Settings
            </a>
        </li>

    </ul>
</aside>

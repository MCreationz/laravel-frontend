<div class="sidebar d-flex flex-column p-3 text-white">
    <ul class="nav nav-pills flex-column mb-auto gap-2">

        <li class="nav-item">
            <a href="{{ route('superadmin.dashboard') }}"
               class="nav-link {{ request()->routeIs('superadmin.dashboard') ? 'active' : 'text-muted' }} d-flex align-items-center gap-3">
                <i class="bi bi-grid-3x3-gap fs-5"></i>
                Dashboard
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('superadmin.client-admins.index') }}"
               class="nav-link {{ request()->routeIs('superadmin.client-admins.*') ? 'active' : 'text-muted' }} d-flex align-items-center gap-3">
                <i class="bi bi-person-bounding-box fs-5"></i>
                Client Admins
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('superadmin.applicants.index') }}"
               class="nav-link {{ request()->routeIs('superadmin.applicants.*') ? 'active' : 'text-muted' }} d-flex align-items-center gap-3">
                <i class="bi bi-file-earmark-text fs-5"></i>
                Applicants
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('superadmin.reviewers.index') }}"
               class="nav-link {{ request()->routeIs('superadmin.reviewers.*') ? 'active' : 'text-muted' }} d-flex align-items-center gap-3">
                <i class="bi bi-pencil-square fs-5"></i>
                Reviewers
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('superadmin.funds.index') }}"
               class="nav-link {{ request()->routeIs('superadmin.funds.*') ? 'active' : 'text-muted' }} d-flex align-items-center gap-3">
                <i class="bi bi-cash-stack fs-5"></i>
                Funds
            </a>
        </li>

    </ul>
</div>
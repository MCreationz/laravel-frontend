<aside class="bg-white text-dark d-flex flex-column p-3 shadow-sm border-end" style="width: 260px; min-height: 100vh;">

    <!-- Header -->
    <div class="text-center mb-4">
        <h6 class="fw-bold mb-1">SuperAdmin</h6>
        <small class="text-muted">{{ auth()->user()->name ?? '' }}</small>
    </div>

    <hr class="border-secondary opacity-25">

    <!-- Nav -->
    <ul class="nav nav-pills flex-column gap-1">

        <!-- Projects Parent -->
        <li class="nav-item">
            <a class="nav-link d-flex justify-content-between align-items-center text-dark px-3 py-2 rounded-3 hover-bg"
               data-bs-toggle="collapse"
               href="#projectsMenu"
               role="button"
               aria-expanded="{{ request()->routeIs('superadmin.projects.*') ? 'true' : 'false' }}"
            >
                <div class="d-flex align-items-center">
                    <i class="bi bi-kanban me-2"></i>
                    <span>Projects</span>
                </div>

                <i class="bi bi-chevron-down small transition 
                   {{ request()->routeIs('superadmin.projects.*') ? 'rotate' : '' }}"></i>
            </a>

            <!-- Submenu -->
            <div class="collapse {{ request()->routeIs('superadmin.projects.*') ? 'show' : '' }}" id="projectsMenu">
                <ul class="nav flex-column ms-4 mt-1 gap-1">

                    <li class="nav-item">
                        <a href="{{ route('superadmin.projects.index') }}"
                           class="nav-link text-dark px-3 py-1 rounded-3 
                           {{ request()->routeIs('superadmin.projects.index') ? 'active bg-primary text-white' : 'hover-bg' }}">
                            All Projects
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('superadmin.projects.create') }}"
                           class="nav-link text-dark px-3 py-1 rounded-3 
                           {{ request()->routeIs('superadmin.projects.create') ? 'active bg-primary text-white' : 'hover-bg' }}">
                            Create Project
                        </a>
                    </li>

                </ul>
            </div>
        </li>

    </ul>

    <!-- Bottom -->
    <div class="mt-auto pt-3">
        <hr class="border-secondary opacity-25">

        <form method="POST" action="{{ route('superadmin.logout') }}">
            @csrf
            <button type="submit"
                class="nav-link text-danger d-flex align-items-center px-3 py-2 rounded-3 w-100 border-0 bg-transparent hover-danger">
                
                <i class="bi bi-box-arrow-right me-2"></i>
                Logout
            </button>
        </form>
    </div>

</aside>

<style>
    .hover-bg:hover {
        background-color: rgba(0, 0, 0, 0.05);
    }

    .hover-danger:hover {
        background-color: rgba(220, 53, 69, 0.1);
    }

    .transition {
        transition: transform 0.2s ease;
    }

    .rotate {
        transform: rotate(180deg);
    }
</style>
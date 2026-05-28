<nav class="navbar navbar-expand-lg bg-white border-bottom px-4 py-3">

    <div class="container-fluid">

        <h5 class="mb-0">
            @yield('title', 'Dashboard')
        </h5>

        <div class="ms-auto">

            <span class="fw-semibold">
                {{ auth('client_admin')->user()->primary_contact_name ?? 'Client Admin' }}
            </span>

        </div>

    </div>

</nav>
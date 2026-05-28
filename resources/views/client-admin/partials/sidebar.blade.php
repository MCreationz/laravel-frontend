<div class="sidebar text-white">

    <div class="p-4 border-bottom">
        <h4 class="mb-0">Client Admin</h4>
    </div>

    <div class="py-3">

        <a href="{{ route('client-admin.dashboard') }}">
            Dashboard
        </a>

        <a href="{{ route('client-admin.profile') }}">
            Profile
        </a>

        <a href="{{ route('client-admin.change-password') }}">
            Change Password
        </a>

        <form method="POST" action="{{ route('client-admin.logout') }}">
            @csrf

            <button
                type="submit"
                class="btn btn-link text-decoration-none text-white w-100 text-start px-3 py-2"
            >
                Logout
            </button>
        </form>

    </div>

</div>
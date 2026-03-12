<div class="bg-dark text-white p-3" style="width:250px; min-height:100vh;">

    <h4 class="mb-4">Fundink</h4>

    <ul class="nav flex-column">

        <li class="nav-item mb-2">
            <a href="{{ route('dashboard') }}" class="nav-link text-white">
                Dashboard
            </a>
        </li>

        <li class="nav-item mb-2">
            <a href="#" class="nav-link text-white">
                Organization Profile
            </a>
        </li>

        <li class="nav-item mb-2">
            <a href="#" class="nav-link text-white">
                Funding Requests
            </a>
        </li>

        <li class="nav-item mb-2">
            <a href="#" class="nav-link text-white">
                Messages
            </a>
        </li>

        <li class="nav-item mt-4">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="btn btn-danger w-100">
                    Logout
                </button>
            </form>
        </li>

    </ul>

</div>
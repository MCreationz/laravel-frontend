<div class="sidebar d-flex flex-column justify-content-between gap-2 position-fixed">
    <div class="logo-wrap">
        <div class="logo ps-3 mb-4 pb-2">
            <img src="{{ asset('img/FundInk-logo.svg') }}" alt="FundInk site logo" width="120px" height="auto">
        </div>
        <div class="expert-sec p-3 p-lg-4">
            <p class="font-small">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam
                rem aperiam, eaque ipsa quae ab illo inventore veritatis </p>
            <div class="btn-wrap">
                <a href="#" class="btn btn-primary w-100">Talk to our experts today</a>
            </div>
        </div>
    </div>
    <div class="sidebar-nav mt-5 pt-3">
        <a href="#" class="d-flex align-items-center mb-4 pb-2 text-decoration-none">
            <div class="flex-shrink-0">
                <img src="{{ asset('img/setting.svg') }}" alt="settings" width="23px" height="23px">
            </div>
            <div class="flex-grow-1 ms-3">Settings</div>
        </a>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>

<a href="{{ route('logout') }}" class="d-flex align-items-center text-decoration-none"
   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
    <div class="flex-shrink-0">
        <img src="{{ asset('img/layout.svg') }}" alt="Logout" width="23px" height="22.98px">
    </div>
    <div class="flex-grow-1 ms-3">Logout</div>
</a>
        <a href="#" class="d-flex align-items-center mt-5 pt-4 text-decoration-none">
            <div class="flex-shrink-0">
                <img src="{{ asset('img/help.svg') }}" alt="Need Help" width="23px" height="23px">
            </div>
            <div class="flex-grow-1 ms-3">Need Help?</div>
        </a>
    </div>

</div>
</div>

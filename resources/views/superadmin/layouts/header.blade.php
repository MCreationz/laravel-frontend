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
               <div class="dropdown">

    <a href="#"
       class="icon px-2  position-relative"
       data-bs-toggle="dropdown"
       aria-expanded="false">

        <img src="{{ asset('img/notification.svg') }}"
             alt="Notifications"
             width="18"
             height="20">

        <span id="notification-count"
              class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"
              style="display:none;">
            0
        </span>

    </a>

    <div class="dropdown-menu dropdown-menu-end p-0 shadow"
         style="width:380px;max-height:500px;overflow-y:auto;">

        <div class="d-flex justify-content-between align-items-center p-2 border-bottom">

            <strong>Notifications</strong>

            <button
                type="button"
                id="mark-all-read"
                class="btn btn-sm btn-link text-decoration-none p-1">
                Mark all read
            </button>

        </div>

        <div id="notification-list">

            <div class="p-3 text-center text-muted">
                Loading...
            </div>

        </div>

    </div>

</div>

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
<script>
document.addEventListener('DOMContentLoaded', function () {

    const list = document.getElementById('notification-list');
    const badge = document.getElementById('notification-count');

    loadNotifications();

    function renderNotification(item) {

        return `
            <div
                class="border-bottom p-3 notification-item"
                data-id="${item.id}"
                style="${item.is_read ? '' : 'background:#dbe9f6'}">

                <div class="fw-semibold">
                    ${item.title}
                </div>

                <div class="small text-muted mt-1">
                    ${item.message}
                </div>

                <div class="small text-muted mt-2">
                    ${new Date(item.created_at).toLocaleString()}
                </div>

            </div>
        `;

    }

    async function loadNotifications() {

        try {

            const response = await fetch(
                "{{ route('superadmin.notifications.index') }}"
            );

            const data = await response.json();

            badge.innerText = data.unread_count;

            badge.style.display =
                data.unread_count > 0
                    ? 'inline-block'
                    : 'none';

            if (!data.notifications.data.length) {

                list.innerHTML = `
                    <div class="p-3 text-center text-muted">
                        No notifications found
                    </div>
                `;

                return;
            }

            list.innerHTML = data.notifications.data
                .map(renderNotification)
                .join('');

        } catch (e) {

            console.error(e);

        }

    }

    window.Echo
        .private('super-admin.{{ auth()->id() }}')
        .listen('.notification.created', function (notification) {

            console.log(notification);

            if (list.innerHTML.includes('No notifications found')) {
                list.innerHTML = '';
            }

            list.insertAdjacentHTML(
                'afterbegin',
                renderNotification(notification)
            );

            let count = parseInt(badge.innerText || '0');

            count++;

            badge.innerText = count;
            badge.style.display = 'inline-block';

            if (typeof toastr !== 'undefined') {
                toastr.success(
                    notification.message,
                    notification.title
                );
            }

        });

    document.addEventListener('click', async function (e) {

        const item = e.target.closest('.notification-item');

        if (!item) return;

        const id = item.dataset.id;

        await fetch(
            `/super-admin/notifications/${id}/read`,
            {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN':
                        document.querySelector(
                            'meta[name="csrf-token"]'
                        ).content
                }
            }
        );

        item.style.background = '';

        let count = parseInt(badge.innerText || '0');

        if (count > 0) {
            count--;
        }

        badge.innerText = count;

        if (count === 0) {
            badge.style.display = 'none';
        }

    });

    document.getElementById('mark-all-read')
        ?.addEventListener('click', async function () {

            await fetch(
                "{{ route('superadmin.notifications.read-all') }}",
                {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN':
                            document.querySelector(
                                'meta[name="csrf-token"]'
                            ).content
                    }
                }
            );

            document.querySelectorAll('.notification-item')
                .forEach(item => {
                    item.style.background = '';
                });

            badge.innerText = 0;
            badge.style.display = 'none';

        });

});
</script>
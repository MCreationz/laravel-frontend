<header class="header px-3 px-lg-4 position-fixed top-0">
    <div class="row justify-content-between align-items-center h-100">
        <div class="col-auto d-flex gap-3 align-items-center">
            <div class="header-toggle">
                <button class="nav-toggle" id="sidebar-toggle" type="button" aria-label="Toggle sidebar">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
            </div>

            @hasSection('header_back_url')
                <a href="@yield('header_back_url')" class="header-back-link text-decoration-none d-flex align-items-center">
                    <i class="bi bi-arrow-left"></i>
                </a>
            @endif

            <p class="mb-0 header-text">@yield('page_title', 'Set up your Profile')</p>
        </div>

        <div class="col logo mobile d-none text-center flex-grow">
            <img src="{{ asset('img/FundInk-logo.svg') }}" alt="Fundink" width="124" height="">
        </div>

        <div class="col-auto">
            <div class="header-links d-flex justify-content-end align-items-center gap-2 gap-lg-3">

                @yield('header_extra')

                <!-- Notification dropdown here -->
                <div class="dropdown">

                    <a href="#" class="icon  position-relative" data-bs-toggle="dropdown"
                        aria-expanded="false">

                        <img src="{{ asset('img/notification.svg') }}" alt="Notifications" width="18"
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

                            <button type="button" id="mark-all-read"
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

                <div class="dropdown">

                    <a href="javascript:void(0);" class="text-decoration-none text-reset" data-bs-toggle="dropdown"
                        data-bs-auto-close="outside" aria-expanded="false">

                        @php
                            $name = trim(
                                optional(auth('organization')->user()->profile)->legal_name ??
                                    (auth('organization')->user()->organization_name ?? '-'),
                            );

                            $words = preg_split('/\s+/', $name);

                            if (count($words) >= 2) {
                                $initials = strtoupper(substr($words[0], 0, 1) . substr(end($words), 0, 1));
                            } else {
                                $initials = strtoupper(substr($name, 0, 2));
                            }
                        @endphp

                        <div class="d-flex align-items-center ps-2 ps-lg-3">

                            <div class="flex-shrink-0 rounded-circle d-flex align-items-center justify-content-center"
                                style="width:36px;height:36px;background:#1E2746;color:#fff;font-weight:600;font-size:14px;">
                                <span class="text-white">{{ $initials }}</span>
                            </div>

                            <div class="flex-grow-1 ms-2 ms-lg-3 profile-name text-truncate">
                                {{ $name }}
                            </div>

                        </div>

                    </a>

                    <div class="dropdown-menu dropdown-menu-end border-0 rounded-4 shadow p-3 mt-3"
                        style="width:330px;font-size:13px;">

                        <div class="d-flex align-items-start drop-item">
                            <div style="" class="col-5 fw-semibold">
                                Brand Name:
                            </div>
                            <div class="flex-grow-1 text-break">
                                {{ optional(auth('organization')->user()->profile)->brand_name ??
                                    (auth('organization')->user()->organization_name ?? '-') }}
                            </div>
                        </div>

                        <div class="d-flex align-items-start drop-item">
                            <div style="" class="col-5 fw-semibold">
                                Organization:
                            </div>
                            <div class="flex-grow-1 text-break">
                                {{ auth('organization')->user()->organization_name ?? '-' }}
                            </div>
                        </div>

                        <div class="d-flex align-items-start drop-item">
                            <div style="" class="col-5 fw-semibold">
                                Type:
                            </div>
                            {{-- {{ dd(auth('organization')->user()->operationalDetail) }} --}}
                            <div class="flex-grow-1 text-break">
                                {{ \Illuminate\Support\Str::title(optional(auth('organization')->user()->operationalDetail)->registration_type ?? '-') }}
                            </div>
                        </div>

                        <div class="d-flex align-items-start drop-item">
                           <div style="" class="col-5 fw-semibold">
                                Email:
                            </div>
                            <div class="flex-grow-1 text-break">
                                <a href="mailto:{{ auth('organization')->user()->work_email }}">
                                    {{ auth('organization')->user()->work_email ?? '-' }}
                                </a>
                            </div>
                        </div>

                        <div class="d-flex align-items-start drop-item">
                            <div style="" class="col-5 fw-semibold">
                                Contact:
                            </div>
                            <div class="flex-grow-1 text-break">
                                {{ optional(auth('organization')->user()->profile)->contact_name ?? '-' }}
                            </div>
                        </div>

                        <div class="d-flex align-items-start drop-item">
                            <div style="" class="col-5 fw-semibold">
                                Mobile:
                            </div>
                            <div class="flex-grow-1 text-break">
                                {{ optional(auth('organization')->user()->profile)->mobile_no ?? '-' }}
                            </div>
                        </div>

                        <div class="d-flex align-items-start drop-item">
                            <div style="" class="col-5 fw-semibold">
                                State:
                            </div>
                            <div class="flex-grow-1 text-break">
                                {{ optional(auth('organization')->user()->address)->office_state ?? '-' }}
                            </div>
                        </div>

                        <div class="d-flex align-items-start drop-item">
                            <div style="" class="col-5 fw-semibold">
                                Website:
                            </div>
                            <div class="flex-grow-1 text-break">
                                @if (optional(auth('organization')->user()->profile)->website_url)
                                    <a href="{{ optional(auth('organization')->user()->profile)->website_url }}"
                                        target="_blank">
                                        {{ optional(auth('organization')->user()->profile)->website_url }}
                                    </a>
                                @else
                                    -
                                @endif
                            </div>
                        </div>

                        <div class="d-flex align-items-start mb-3">
                            <div style="" class="col-5 fw-semibold">
                                LinkedIn:
                            </div>
                            <div class="flex-grow-1 text-break">
                                @if (optional(auth('organization')->user()->profile)->linkedin_url)
                                    <a href="{{ optional(auth('organization')->user()->profile)->linkedin_url }}"
                                        target="_blank">
                                        View Profile
                                    </a>
                                @else
                                    -
                                @endif
                            </div>
                        </div>

                        <div class="d-flex gap-2 my-3 justify-content-center">
                            <a href="{{ route('profile.show') }}" class="btn simple-btn blue">Edit Profile</a>
                            <a href="{{ route('settings.show') }}" class="btn simple-btn blue">Change Password</a>
                        </div>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-primary w-100 py-2">
                                Logout
                            </button>
                        </form>

                    </div>
                </div>
            </div>
</header>



<script>
    document.addEventListener('DOMContentLoaded', function() {

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

                const response = await fetch("{{ route('notifications.index') }}");
                const data = await response.json();

                badge.innerText = data.unread_count;
                badge.style.display = data.unread_count > 0 ? 'inline-block' : 'none';

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

        // -----------------------------
        // REAL-TIME NOTIFICATIONS
        // -----------------------------

        window.Echo
            .private('organization.{{ auth('organization')->id() }}')
            .listen('.notification.created', function(notification) {

                console.log('Realtime notification', notification);

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

                // if (typeof toastr !== 'undefined') {
                //     toastr.success(notification.message, notification.title);
                // }

            });

        // -----------------------------
        // MARK AS READ
        // -----------------------------

        document.addEventListener('click', async function(e) {

            const item = e.target.closest('.notification-item');

            if (!item) return;

            const id = item.dataset.id;

            await fetch(`/notifications/${id}/read`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                        .content
                }
            });

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

        // -----------------------------
        // MARK ALL AS READ
        // -----------------------------

        document.getElementById('mark-all-read')
            ?.addEventListener('click', async function() {

                await fetch("{{ route('notifications.read-all') }}", {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                            .content
                    }
                });

                document.querySelectorAll('.notification-item').forEach(item => {
                    item.style.background = '';
                });

                badge.innerText = 0;
                badge.style.display = 'none';

            });

    });
</script>

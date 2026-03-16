@extends('layouts.dashboard')

@section('content')
    <div class="project-status-sec">
        <div class="row row-gap-3 justify-content-center">
            <div class="col-md-6 col-lg-4 px-md-2 ongoing">
                <div class="card dashboard-card">
                    <div class="card-inner d-flex justify-content-between align-items-start">
                        <!-- Left Content -->
                        <div class="pt-3 pt-md-5">
                            <div class="number-wrap d-flex align-items-end gap-2">
                                <h2 class="mb-0">14</h2>
                                <span class="badge ms-1">+11.01% <img src="img/grow.png" alt="grow"
                                        width="11.83607292175293px" height="7.575087070465088px"></span>
                            </div>
                            <p class="mb-0 mt-2 title">Ongoing Projects</p>
                            <p class="text">2 more than last month</p>
                        </div>
                        <!-- Circular Progress -->
                        <div class="progress-circle" data-progress="15">
                            <span class="progress-text">0%</span>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-6  col-lg-4 px-md-2 completed">
                <div class="card dashboard-card">
                    <div class="card-inner d-flex justify-content-between align-items-start">
                        <div class="pt-3 pt-md-5">
                            <div class="number-wrap d-flex align-items-end gap-2">
                                <h2 class="mb-0">08</h2>
                                <span class="badge ms-1">+11.01% <img src="img/grow.png" alt="grow"
                                        width="11.83607292175293px" height="7.575087070465088px"></span>
                            </div>
                            <p class="mb-0 mt-2 title">Completed Projects</p>
                            <p class="text">2 more than last month</p>
                        </div>
                        <div class="progress-circle" data-progress="70">
                            <span class="progress-text">0%</span>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 px-md-2 rejected">
                <div class="card dashboard-card">
                    <div class="card-inner d-flex justify-content-between align-items-start">
                        <div class="pt-3 pt-md-5">
                            <div class="number-wrap d-flex align-items-end gap-2">
                                <h2 class="mb-0">02</h2>
                                <span class="badge ms-1">-11.01% <img src="img/reject.png" alt="grow"
                                        width="11.83607292175293px" height="7.575087070465088px"></span>
                            </div>
                            <p class="mb-0 mt-2 title">Rejected Projects</p>
                            <p class="text">2 more than last month</p>
                        </div>
                        <div class="progress-circle" data-progress="30">
                            <span class="progress-text">0%</span>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- projects  --}}

    <div class="recent-activities-sec mt-3">
        <div class="row row-gap-3">
            <div class="col-12 col-lg-8 pe-lg-1">
                <div class="card project-sec px-3 pb-3 border-0 rounded-3">
                    <div class="row py-3 justify-content-between align-items-center row-gap-2">
                        <div class="col-12 col-md-auto">
                            <p class="small-title text-center text-md-start">All Projects</p>
                        </div>
                        <div class="col-12 col-sm-9 col-xl-7 d-flex align-items-center justify-content-md-end flex-wrap">
                            <!-- Search Bar -->
                            <div class="col-12 col-sm-8 col-md-auto search-box  pe-lg-1 pe-xl-2 ">
                                <span class="search-icon w-100">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13"
                                        viewBox="0 0 13 13" fill="none">
                                        <path
                                            d="M5.70944 0.00239889C4.19598 0.00493613 2.74524 0.607279 1.67506 1.67746C0.604881 2.74764 0.00253724 4.19838 0 5.71184C0.0012649 7.22657 0.602894 8.67904 1.67307 9.75102C2.74325 10.823 4.19471 11.4271 5.70944 11.4309C7.05284 11.4309 8.29068 10.9583 9.26944 10.1762L11.6468 12.5536C11.7672 12.6656 11.9264 12.7265 12.0908 12.7236C12.2552 12.7207 12.4121 12.6543 12.5286 12.5381C12.645 12.422 12.7119 12.2653 12.7152 12.1008C12.7186 11.9364 12.658 11.7771 12.5464 11.6564L10.169 9.27664C10.981 8.26684 11.4236 7.00998 11.4237 5.71424C11.4237 2.56685 8.85683 0.00239889 5.70944 0.00239889ZM5.70944 1.27383C8.17074 1.27383 10.1522 3.25294 10.1522 5.71184C10.1522 8.17074 8.17074 10.1618 5.70944 10.1618C3.24814 10.1618 1.26903 8.17793 1.26903 5.71664C1.26903 3.25534 3.24814 1.27383 5.70944 1.27383Z"
                                            fill="#BABABA" />
                                    </svg>
                                </span>
                                <input type="text" class="form-control" placeholder="Search">
                            </div>
                            {{-- categories --}}


                            <div class="col-12 col-sm-4 col-md-4 select-wrapper position-relative">
                                <div class="custom-select form-control">
                                    Category
                                </div>
                                <input type="hidden" name="office_city" value="Category">

                                <ul class="select-list">
                                    <li data-value="Delhi">Design</li>
                                    <li data-value="Mumbai">Development</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row mt-3 row-gap-3">
                        <div class="col-12 col-sm-6">
                            <div class="single-project">
                                <div class="img-wrap mb-3">
                                    <img src="img/project-img.jpg" alt="project image" width="100%" height="100%"
                                        class="img-fluid rounded-2">
                                </div>
                                <div class="project-details">
                                    <div class="publish-date mb-3">24 March 2026</div>
                                    <p class="title mb-0">Project Name</p>
                                    <div class="id">Application ID</div>
                                    <p>Lorem ipsum dolor sit amet consectetur.</p>
                                    <div class="btn-wrap">
                                        <a href="#" class="btn btn-primary w-100">Appy now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="single-project">
                                <div class="img-wrap mb-3">
                                    <img src="img/project-img.jpg" alt="project image" width="100%" height="100%"
                                        class="img-fluid rounded-2">
                                </div>
                                <div class="project-details">
                                    <div class="publish-date mb-3">24 March 2026</div>
                                    <p class="title mb-0">Project Name</p>
                                    <div class="id">Application ID</div>
                                    <p>Lorem ipsum dolor sit amet consectetur.</p>
                                    <div class="btn-wrap">
                                        <a href="#" class="btn btn-primary w-100">Appy now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="single-project">
                                <div class="img-wrap mb-3">
                                    <img src="img/project-img.jpg" alt="project image" width="100%" height="100%"
                                        class="img-fluid rounded-2">
                                </div>
                                <div class="project-details">
                                    <div class="publish-date mb-3">24 March 2026</div>
                                    <p class="title mb-0">Project Name</p>
                                    <div class="id">Application ID</div>
                                    <p>Lorem ipsum dolor sit amet consectetur.</p>
                                    <div class="btn-wrap">
                                        <a href="#" class="btn btn-primary w-100">Appy now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="single-project">
                                <div class="img-wrap mb-3">
                                    <img src="img/project-img.jpg" alt="project image" width="100%" height="100%"
                                        class="img-fluid rounded-2">
                                </div>
                                <div class="project-details">
                                    <div class="publish-date mb-3">24 March 2026</div>
                                    <p class="title mb-0">Project Name</p>
                                    <div class="id">Application ID</div>
                                    <p>Lorem ipsum dolor sit amet consectetur.</p>
                                    <div class="btn-wrap">
                                        <a href="#" class="btn btn-primary w-100">Appy now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-4">
                <div class="card px-3 pb-3 border-0 rounded-3">
                    <div class="recent-activities">
                        <div class="title-wrapper pt-3 pb-2">
                            <p class="small-title">Recent Activity</p>
                        </div>
                       
                        <hr>
                        <div class="activities-wrapper">
                            <div class="single-activity d-flex align-items-center py-3">
                                <div class="flex-shrink-0">
                                    <img src="img/project-img.jpg" alt="activity" width="74px" height="61px" class="rounded-1">
                                </div>
                                <div class="flex-grow-1 ms-2 ps-1">
                                    <p class="small-title fw-semibold mb-0">Funding Literacy Mission</p>
                                    <p class="approve-text"><span>Rs. 50 Lacs</span> Approveo rom ABC cop</p>
                                </div>
                            </div>
                            <div class="single-activity d-flex align-items-center py-3">
                                <div class="flex-shrink-0">
                                    <img src="img/project-img.jpg" alt="activity" width="74px" height="61px" class="rounded-1">
                                </div>
                                <div class="flex-grow-1 ms-2 ps-1">
                                    <p class="small-title fw-semibold mb-0">Funding Literacy Mission</p>
                                    <p class="approve-text"><span>Rs. 50 Lacs</span> Approveo rom ABC cop</p>
                                </div>
                            </div>
                            <div class="single-activity d-flex align-items-center py-3">
                                <div class="flex-shrink-0">
                                    <img src="img/project-img.jpg" alt="activity" width="74px" height="61px" class="rounded-1">
                                </div>
                                <div class="flex-grow-1 ms-2 ps-1">
                                    <p class="small-title fw-semibold mb-0">Funding Literacy Mission</p>
                                    <p class="approve-text"><span>Rs. 50 Lacs</span> Approveo rom ABC cop</p>
                                </div>
                            </div>
                            <div class="single-activity d-flex align-items-center py-3">
                                <div class="flex-shrink-0">
                                    <img src="img/project-img.jpg" alt="activity" width="74px" height="61px" class="rounded-1">
                                </div>
                                <div class="flex-grow-1 ms-2 ps-1">
                                    <p class="small-title fw-semibold mb-0">Funding Literacy Mission</p>
                                    <p class="approve-text"><span>Rs. 50 Lacs</span> Approveo rom ABC cop</p>
                                </div>
                            </div>
                            <div class="single-activity d-flex align-items-center py-3">
                                <div class="flex-shrink-0">
                                    <img src="img/project-img.jpg" alt="activity" width="74px" height="61px" class="rounded-1">
                                </div>
                                <div class="flex-grow-1 ms-2 ps-1">
                                    <p class="small-title fw-semibold mb-0">Funding Literacy Mission</p>
                                    <p class="approve-text"><span>Rs. 50 Lacs</span> Approveo rom ABC cop</p>
                                </div>
                            </div>
                            <div class="single-activity d-flex align-items-center py-3">
                                <div class="flex-shrink-0">
                                    <img src="img/project-img.jpg" alt="activity" width="74px" height="61px" class="rounded-1">
                                </div>
                                <div class="flex-grow-1 ms-2 ps-1">
                                    <p class="small-title fw-semibold mb-0">Funding Literacy Mission</p>
                                    <p class="approve-text"><span>Rs. 50 Lacs</span> Approveo rom ABC cop</p>
                                </div>
                            </div><div class="single-activity d-flex align-items-center py-3">
                                <div class="flex-shrink-0">
                                    <img src="img/project-img.jpg" alt="activity" width="74px" height="61px" class="rounded-1">
                                </div>
                                <div class="flex-grow-1 ms-2 ps-1">
                                    <p class="small-title fw-semibold mb-0">Funding Literacy Mission</p>
                                    <p class="approve-text"><span>Rs. 50 Lacs</span> Approveo rom ABC cop</p>
                                </div>
                            </div><div class="single-activity d-flex align-items-center py-3">
                                <div class="flex-shrink-0">
                                    <img src="img/project-img.jpg" alt="activity" width="74px" height="61px" class="rounded-1">
                                </div>
                                <div class="flex-grow-1 ms-2 ps-1">
                                    <p class="small-title fw-semibold mb-0">Funding Literacy Mission</p>
                                    <p class="approve-text"><span>Rs. 50 Lacs</span> Approveo rom ABC cop</p>
                                </div>
                            </div>
                            <div class="single-activity d-flex align-items-center py-3">
                                <div class="flex-shrink-0">
                                    <img src="img/project-img.jpg" alt="activity" width="74px" height="61px" class="rounded-1">
                                </div>
                                <div class="flex-grow-1 ms-2 ps-1">
                                    <p class="small-title fw-semibold mb-0">Funding Literacy Mission</p>
                                    <p class="approve-text"><span>Rs. 50 Lacs</span> Approveo rom ABC cop</p>
                                </div>
                            </div>
                            <div class="single-activity d-flex align-items-center py-3">
                                <div class="flex-shrink-0">
                                    <img src="img/project-img.jpg" alt="activity" width="74px" height="61px" class="rounded-1">
                                </div>
                                <div class="flex-grow-1 ms-2 ps-1">
                                    <p class="small-title fw-semibold mb-0">Funding Literacy Mission</p>
                                    <p class="approve-text"><span>Rs. 50 Lacs</span> Approveo rom ABC cop</p>
                                </div>
                            </div><div class="single-activity d-flex align-items-center py-3">
                                <div class="flex-shrink-0">
                                    <img src="img/project-img.jpg" alt="activity" width="74px" height="61px" class="rounded-1">
                                </div>
                                <div class="flex-grow-1 ms-2 ps-1">
                                    <p class="small-title fw-semibold mb-0">Funding Literacy Mission</p>
                                    <p class="approve-text"><span>Rs. 50 Lacs</span> Approveo rom ABC cop</p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    {{--  --}}

    <div class="d-flex justify-content-between align-items-center mb-4">

        {{-- <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-danger">
                Logout
            </button>
        </form>
    </div>

    <div class="card">
        <div class="card-body">

            <h5>
                Welcome {{ auth('organization')->user()->organization_name }}
            </h5>

            <p class="mb-0">
                This is your organization dashboard.
            </p>

        </div> --}}

        <script>
            document.querySelectorAll(".progress-circle").forEach(function(circle) {

                let progress = parseInt(circle.getAttribute("data-progress"));
                let text = circle.querySelector(".progress-text");
                let start = 0;

                let interval = setInterval(function() {

                    if (start > progress) {
                        clearInterval(interval);
                        return;
                    }

                    let degree = start * 3.6;

                    circle.style.background =
                        `conic-gradient(from 0deg,var(--progress-color) 0deg ${degree}deg,var(--bg-color) ${degree}deg 360deg)`;

                    text.innerHTML = start + "%";

                    start++;

                }, 20);

            });
        </script>
    @endsection

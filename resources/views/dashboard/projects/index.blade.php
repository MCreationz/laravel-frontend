@extends('layouts.dashboard')

@section('content')
    <div class="recent-activities-sec">
        <div class="row row-gap-3">
            <div class="col-12">
                <div class="row mb-3 justify-content-between align-items-center row-gap-2">
                    <div class="col-12 col-md-auto">
                        <div class="tabs d-flex align-items-center">
                            <button class="tab active" data-category="all">All</button>
                            <button class="tab" data-category="Ongoing">Ongoing</button>
                            <button class="tab" data-category="Review">Under Review</button>
                            <button class="tab" data-category="Rejected">Rejected</button>
                        </div>
                    </div>
                    <div class="col-12 col-sm-9 col-xl-7 d-flex align-items-center justify-content-md-end flex-wrap">
                        <!-- Search Bar -->
                        <div class="col-12 search-box  pe-lg-1 pe-xl-2  search-box  pe-lg-1 pe-xl-2 ">
                            <span class="search-icon w-100">
                                <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 13 13"
                                    fill="none">
                                    <path
                                        d="M5.70944 0.00239889C4.19598 0.00493613 2.74524 0.607279 1.67506 1.67746C0.604881 2.74764 0.00253724 4.19838 0 5.71184C0.0012649 7.22657 0.602894 8.67904 1.67307 9.75102C2.74325 10.823 4.19471 11.4271 5.70944 11.4309C7.05284 11.4309 8.29068 10.9583 9.26944 10.1762L11.6468 12.5536C11.7672 12.6656 11.9264 12.7265 12.0908 12.7236C12.2552 12.7207 12.4121 12.6543 12.5286 12.5381C12.645 12.422 12.7119 12.2653 12.7152 12.1008C12.7186 11.9364 12.658 11.7771 12.5464 11.6564L10.169 9.27664C10.981 8.26684 11.4236 7.00998 11.4237 5.71424C11.4237 2.56685 8.85683 0.00239889 5.70944 0.00239889ZM5.70944 1.27383C8.17074 1.27383 10.1522 3.25294 10.1522 5.71184C10.1522 8.17074 8.17074 10.1618 5.70944 10.1618C3.24814 10.1618 1.26903 8.17793 1.26903 5.71664C1.26903 3.25534 3.24814 1.27383 5.70944 1.27383Z"
                                        fill="#BABABA" />
                                </svg>
                            </span>
                            <input type="text" class="form-control" placeholder="Search">
                        </div>
                    </div>
                </div>
                <div class="card project-sec px-3 pb-3 border-0 rounded-3">

                    {{-- project listing --}}
                    <div class="row mt-3 row-gap-3">
                        <div class="col-12 col-md-6 col-lg-4 px-2 all Ongoing">
                            <div class="single-project">
                                <div class="img-wrap mb-3">
                                    <img src="img/project-img.jpg" alt="project image" width="100%" height="100%"
                                        class="img-fluid rounded-2">
                                </div>
                                <div class="project-details">
                                    <div class="date-wrap mb-3 d-flex justify-content-between align-items-center gap-2">
                                        <div class="publish-date">24 March 2026</div>
                                        <div class="status ongoing">Ongoing</div>
                                    </div>

                                    <p class="title mb-0">Project Name</p>
                                    <div class="id">Application ID</div>
                                    <p>Lorem ipsum dolor sit amet consectetur.</p>
                                    <div class="btn-wrap">
                                        <a href="projects/details" class="btn btn-primary w-100">View Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4 px-2 all Review">
                            <div class="single-project">
                                <div class="img-wrap mb-3">
                                    <img src="img/project-img.jpg" alt="project image" width="100%" height="100%"
                                        class="img-fluid rounded-2">
                                </div>
                                <div class="project-details">
                                    <div class="date-wrap mb-3 d-flex justify-content-between align-items-center gap-2">
                                        <div class="publish-date">24 March 2026</div>
                                        <div class="status review">Under Review</div>
                                    </div>

                                    <p class="title mb-0">Project Name</p>
                                    <div class="id">Application ID</div>
                                    <p>Lorem ipsum dolor sit amet consectetur.</p>
                                    <div class="btn-wrap">
                                        <a href="projects/details" class="btn btn-primary w-100">View Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4 px-2 all Rejected">
                            <div class="single-project">
                                <div class="img-wrap mb-3">
                                    <img src="img/project-img.jpg" alt="project image" width="100%" height="100%"
                                        class="img-fluid rounded-2">
                                </div>
                                <div class="project-details">
                                    <div class="date-wrap mb-3 d-flex justify-content-between align-items-center gap-2">
                                        <div class="publish-date">24 March 2026</div>
                                        <div class="status reject">Rejected</div>
                                    </div>

                                    <p class="title mb-0">Project Name</p>
                                    <div class="id">Application ID</div>
                                    <p>Lorem ipsum dolor sit amet consectetur.</p>
                                    <div class="btn-wrap">
                                        <a href="projects/details" class="btn btn-primary w-100">View Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4 px-2 all Ongoing">
                            <div class="single-project">
                                <div class="img-wrap mb-3">
                                    <img src="img/project-img.jpg" alt="project image" width="100%" height="100%"
                                        class="img-fluid rounded-2">
                                </div>
                                <div class="project-details">
                                    <div class="date-wrap mb-3 d-flex justify-content-between align-items-center gap-2">
                                        <div class="publish-date">24 March 2026</div>
                                        <div class="status ongoing">Ongoing</div>
                                    </div>

                                    <p class="title mb-0">Project Name</p>
                                    <div class="id">Application ID</div>
                                    <p>Lorem ipsum dolor sit amet consectetur.</p>
                                    <div class="btn-wrap">
                                        <a href="projects/details" class="btn btn-primary w-100">View Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4 px-2 all Review">
                            <div class="single-project">
                                <div class="img-wrap mb-3">
                                    <img src="img/project-img.jpg" alt="project image" width="100%" height="100%"
                                        class="img-fluid rounded-2">
                                </div>
                                <div class="project-details">
                                    <div class="date-wrap mb-3 d-flex justify-content-between align-items-center gap-2">
                                        <div class="publish-date">24 March 2026</div>
                                        <div class="status review">Under Review</div>
                                    </div>

                                    <p class="title mb-0">Project Name</p>
                                    <div class="id">Application ID</div>
                                    <p>Lorem ipsum dolor sit amet consectetur.</p>
                                    <div class="btn-wrap">
                                        <a href="projects/details" class="btn btn-primary w-100">View Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4 px-2 all Rejected">
                            <div class="single-project">
                                <div class="img-wrap mb-3">
                                    <img src="img/project-img.jpg" alt="project image" width="100%" height="100%"
                                        class="img-fluid rounded-2">
                                </div>
                                <div class="project-details">
                                    <div class="date-wrap mb-3 d-flex justify-content-between align-items-center gap-2">
                                        <div class="publish-date">24 March 2026</div>
                                        <div class="status reject">Rejected</div>
                                    </div>

                                    <p class="title mb-0">Project Name</p>
                                    <div class="id">Application ID</div>
                                    <p>Lorem ipsum dolor sit amet consectetur.</p>
                                    <div class="btn-wrap">
                                        <a href="projects/details" class="btn btn-primary w-100">View Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4 px-2 all Ongoing">
                            <div class="single-project">
                                <div class="img-wrap mb-3">
                                    <img src="img/project-img.jpg" alt="project image" width="100%" height="100%"
                                        class="img-fluid rounded-2">
                                </div>
                                <div class="project-details">
                                    <div class="date-wrap mb-3 d-flex justify-content-between align-items-center gap-2">
                                        <div class="publish-date">24 March 2026</div>
                                        <div class="status ongoing">Ongoing</div>
                                    </div>

                                    <p class="title mb-0">Project Name</p>
                                    <div class="id">Application ID</div>
                                    <p>Lorem ipsum dolor sit amet consectetur.</p>
                                    <div class="btn-wrap">
                                        <a href="projects/details" class="btn btn-primary w-100">View Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4 px-2 all Review">
                            <div class="single-project">
                                <div class="img-wrap mb-3">
                                    <img src="img/project-img.jpg" alt="project image" width="100%" height="100%"
                                        class="img-fluid rounded-2">
                                </div>
                                <div class="project-details">
                                    <div class="date-wrap mb-3 d-flex justify-content-between align-items-center gap-2">
                                        <div class="publish-date">24 March 2026</div>
                                        <div class="status review">Under Review</div>
                                    </div>

                                    <p class="title mb-0">Project Name</p>
                                    <div class="id">Application ID</div>
                                    <p>Lorem ipsum dolor sit amet consectetur.</p>
                                    <div class="btn-wrap">
                                        <a href="projects/details" class="btn btn-primary w-100">View Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4 px-2 all Rejected">
                            <div class="single-project">
                                <div class="img-wrap mb-3">
                                    <img src="img/project-img.jpg" alt="project image" width="100%" height="100%"
                                        class="img-fluid rounded-2">
                                </div>
                                <div class="project-details">
                                    <div class="date-wrap mb-3 d-flex justify-content-between align-items-center gap-2">
                                        <div class="publish-date">24 March 2026</div>
                                        <div class="status reject">Rejected</div>
                                    </div>

                                    <p class="title mb-0">Project Name</p>
                                    <div class="id">Application ID</div>
                                    <p>Lorem ipsum dolor sit amet consectetur.</p>
                                    <div class="btn-wrap">
                                        <a href="projects/details" class="btn btn-primary w-100">View Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4 px-2 all Ongoing">
                            <div class="single-project">
                                <div class="img-wrap mb-3">
                                    <img src="img/project-img.jpg" alt="project image" width="100%" height="100%"
                                        class="img-fluid rounded-2">
                                </div>
                                <div class="project-details">
                                    <div class="date-wrap mb-3 d-flex justify-content-between align-items-center gap-2">
                                        <div class="publish-date">24 March 2026</div>
                                        <div class="status ongoing">Ongoing</div>
                                    </div>

                                    <p class="title mb-0">Project Name</p>
                                    <div class="id">Application ID</div>
                                    <p>Lorem ipsum dolor sit amet consectetur.</p>
                                    <div class="btn-wrap">
                                        <a href="projects/details" class="btn btn-primary w-100">View Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4 px-2 all Review">
                            <div class="single-project">
                                <div class="img-wrap mb-3">
                                    <img src="img/project-img.jpg" alt="project image" width="100%" height="100%"
                                        class="img-fluid rounded-2">
                                </div>
                                <div class="project-details">
                                    <div class="date-wrap mb-3 d-flex justify-content-between align-items-center gap-2">
                                        <div class="publish-date">24 March 2026</div>
                                        <div class="status review">Under Review</div>
                                    </div>

                                    <p class="title mb-0">Project Name</p>
                                    <div class="id">Application ID</div>
                                    <p>Lorem ipsum dolor sit amet consectetur.</p>
                                    <div class="btn-wrap">
                                        <a href="projects/details" class="btn btn-primary w-100">View Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4 px-2 all Rejected">
                            <div class="single-project">
                                <div class="img-wrap mb-3">
                                    <img src="img/project-img.jpg" alt="project image" width="100%" height="100%"
                                        class="img-fluid rounded-2">
                                </div>
                                <div class="project-details">
                                    <div class="date-wrap mb-3 d-flex justify-content-between align-items-center gap-2">
                                        <div class="publish-date">24 March 2026</div>
                                        <div class="status reject">Rejected</div>
                                    </div>

                                    <p class="title mb-0">Project Name</p>
                                    <div class="id">Application ID</div>
                                    <p>Lorem ipsum dolor sit amet consectetur.</p>
                                    <div class="btn-wrap">
                                        <a href="projects/details" class="btn btn-primary w-100">View Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4 px-2 all Ongoing">
                            <div class="single-project">
                                <div class="img-wrap mb-3">
                                    <img src="img/project-img.jpg" alt="project image" width="100%" height="100%"
                                        class="img-fluid rounded-2">
                                </div>
                                <div class="project-details">
                                    <div class="date-wrap mb-3 d-flex justify-content-between align-items-center gap-2">
                                        <div class="publish-date">24 March 2026</div>
                                        <div class="status ongoing">Ongoing</div>
                                    </div>

                                    <p class="title mb-0">Project Name</p>
                                    <div class="id">Application ID</div>
                                    <p>Lorem ipsum dolor sit amet consectetur.</p>
                                    <div class="btn-wrap">
                                        <a href="projects/details" class="btn btn-primary w-100">View Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4 px-2 all Review">
                            <div class="single-project">
                                <div class="img-wrap mb-3">
                                    <img src="img/project-img.jpg" alt="project image" width="100%" height="100%"
                                        class="img-fluid rounded-2">
                                </div>
                                <div class="project-details">
                                    <div class="date-wrap mb-3 d-flex justify-content-between align-items-center gap-2">
                                        <div class="publish-date">24 March 2026</div>
                                        <div class="status review">Under Review</div>
                                    </div>

                                    <p class="title mb-0">Project Name</p>
                                    <div class="id">Application ID</div>
                                    <p>Lorem ipsum dolor sit amet consectetur.</p>
                                    <div class="btn-wrap">
                                        <a href="projects/details" class="btn btn-primary w-100">View Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4 px-2 all Rejected">
                            <div class="single-project">
                                <div class="img-wrap mb-3">
                                    <img src="img/project-img.jpg" alt="project image" width="100%" height="100%"
                                        class="img-fluid rounded-2">
                                </div>
                                <div class="project-details">
                                    <div class="date-wrap mb-3 d-flex justify-content-between align-items-center gap-2">
                                        <div class="publish-date">24 March 2026</div>
                                        <div class="status reject">Rejected</div>
                                    </div>

                                    <p class="title mb-0">Project Name</p>
                                    <div class="id">Application ID</div>
                                    <p>Lorem ipsum dolor sit amet consectetur.</p>
                                    <div class="btn-wrap">
                                        <a href="projects/details" class="btn btn-primary w-100">View Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- <div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>
            My Projects
        </h1>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-danger">
                Logout
            </button>
        </form>
    </div>

    <div class="card">
        <div class="card-body">

            <h5>
                Projects for {{ auth('organization')->user()->organization_name }}
            </h5>

            <p class="mb-3">
                Here you will be able to manage your organization projects.
            </p>

            <div class="alert alert-info mb-0">
                No projects available yet.
            </div>

        </div>
    </div>

</div> --}}

    <script>
        document.addEventListener("DOMContentLoaded", function() {

            const tabs = document.querySelectorAll(".tab");
            const projects = document.querySelectorAll(".project-sec .col-12");

            tabs.forEach(tab => {
                tab.addEventListener("click", function() {

                    // remove active class
                    tabs.forEach(t => t.classList.remove("active"));
                    this.classList.add("active");

                    const category = this.getAttribute("data-category");

                    projects.forEach(project => {

                        if (category === "all") {
                            project.style.display = "block";
                        } else if (project.classList.contains(category)) {
                            project.style.display = "block";
                        } else {
                            project.style.display = "none";
                        }

                    });

                });
            });

        });
    </script>
@endsection

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preload" href="/fonts/Coolvetica-Regular.woff2" as="font" type="font/woff2" crossorigin>

    <link rel="preload" href="/fonts/Inter18pt-Regular.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/fonts/Inter18pt-Medium.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/fonts/Inter18pt-SemiBold.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/fonts/Inter18pt-Bold.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<link rel="icon" type="image/png" href="https://fundink.in/favicon.png?v=2">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://js.pusher.com/8.4.0/pusher.min.js"></script>
{{-- <script src="{{ asset('js/reverb.js') }}"></script></head> --}}
@vite('resources/js/app.js')

{{-- <script>
    fetch('/broadcast-test')
    .then(response => response.json())
    .then(data => {
        console.log(data);
    })
    .catch(error => {
        console.error(error);
    });
</script> --}}

<body class="dashboard">

    <div class="">

        @include('partials.sidebar')

        <div class="">

            @include('partials.header')

            <main class="p-3">
                <div id="pageLoader" style="
    display:none;
    position:fixed;
    top:0;
    left:0;
    width:100%;
    height:100%;
    background:rgba(255,255,255,0.7);
    z-index:9999;
    justify-content:center;
    align-items:center;
">
                    <div class="spinner-border text-primary"></div>
                </div>



                @yield('content')
            </main>

        </div>

    </div>

</body>

<style>
    #toast-container>div {
        position: relative;
    }

    /* Fix close (×) button */
    .toast-close-button {
        position: absolute;
        top: 6px;
        right: 10px;
        font-size: 18px;
        color: #fff !important;
        opacity: 0.8;
    }

    /* Better hover */
    .toast-close-button:hover {
        opacity: 1;
    }

    #toast-container>div {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 14px 16px 14px 50px !important;
        /* space for icon */
        position: relative;
    }

    /* Fix icon position */
    #toast-container>div::before {
        position: absolute;
        left: 15px;
        top: 50%;
        transform: translateY(-50%);
    }

    /* Force white text globally inside toast */
    #toast-container>div,
    #toast-container>div * {
        color: #fff !important;
    }

    /* Also ensure base toast class doesn't override */
    .toast {
        color: #fff !important;
    }

    /* Toast container spacing */
    #toast-container>div {
        border-radius: 10px;
        padding: 14px 18px;
        font-size: 14px;
        font-weight: 500;
        opacity: 1 !important;
        /* REMOVE transparency */
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
    }

    /* Success */
    .toast-success {
        background-color: #16a34a !important;
        color: #fff !important;
    }

    /* Error */
    .toast-error {
        background-color: #dc2626 !important;
        color: #fff !important;
    }

    /* Warning */
    .toast-warning {
        background-color: #f59e0b !important;
        color: #fff !important;
    }

    /* Info */
    .toast-info {
        background-color: #2563eb !important;
        color: #fff !important;
    }

    /* Remove default background image (icons) */
    .toast {
        background-image: none !important;
    }

    /* Close button */
    .toast-close-button {
        color: #fff !important;
        opacity: 0.8;
    }

    .toast-close-button:hover {
        opacity: 1;
    }
</style>


@yield('scripts')
<script>
    toastr.options = {
        closeButton: true,
        progressBar: true,
        newestOnTop: true,
        positionClass: "toast-top-right",
        timeOut: "3500",
        showDuration: "300",
        hideDuration: "200",
        showMethod: "fadeIn",
        hideMethod: "fadeOut"
    };
    @if(session('success'))
        toastr.success("{{ session('success') }}");
    @endif

    @if(session('error'))
        toastr.error("{{ session('error') }}");
    @endif

    @if(session('warning'))
        toastr.warning("{{ session('warning') }}");
    @endif

    @if(session('info'))
        toastr.info("{{ session('info') }}");
    @endif

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            toastr.error("{{ $error }}");
        @endforeach
    @endif
</script>

<script>
    const toggleBtn = document.getElementById("sidebar-toggle");
    const sidebar = document.querySelector("body");

    toggleBtn.addEventListener("click", () => {
        sidebar.classList.toggle("sidebar-active");
    });
</script>

<script>
    document.querySelectorAll(".select-wrapper").forEach(function (wrapper) {

        const selectBox = wrapper.querySelector(".custom-select");
        const optionsList = wrapper.querySelector(".select-list");
        const hiddenInput = wrapper.querySelector(".hidden-select");

        selectBox.addEventListener("click", function (e) {
            e.stopPropagation();

            document.querySelectorAll(".select-list").forEach(list => {
                if (list !== optionsList) list.style.display = "none";
            });

            optionsList.style.display =
                optionsList.style.display === "block" ? "none" : "block";
        });

        optionsList.querySelectorAll("li").forEach(function (option) {

            option.addEventListener("click", function () {

                selectBox.textContent = this.textContent;
                hiddenInput.value = this.getAttribute("data-value");

                optionsList.style.display = "none";
            });

        });

    });

    document.addEventListener("click", function () {
        document.querySelectorAll(".select-list").forEach(list => {
            list.style.display = "none";
        });
    });
</script>





{{--
<script>
    document.querySelectorAll('.select-wrapper').forEach(wrapper => {

        const display = wrapper.querySelector('.custom-select');
        const hiddenInput = wrapper.querySelector('input[type="hidden"]');
        const options = wrapper.querySelectorAll('.select-list li');

        options.forEach(option => {

            option.addEventListener('click', function () {

                const value = this.getAttribute('data-value');

                // update visible text
                display.textContent = value;

                // update hidden input (this is what gets submitted)
                hiddenInput.value = value;

            });

        });

    });
</script> --}}


<script>
document.addEventListener('DOMContentLoaded', function () {

    document.querySelectorAll('form').forEach(form => {

        // Mark invalid fields on native validation trigger
        form.addEventListener('invalid', function (e) {
            e.target.classList.add('validation-error');
        }, true);

        form.addEventListener('submit', function (e) {

            const firstInvalid = form.querySelector(':invalid');

            if (!firstInvalid) return;

            e.preventDefault();

            let target = firstInvalid;

            // FILE INPUT (resume upload fix)
            if (firstInvalid.type === 'file' && firstInvalid.id) {
                const uploadLabel = form.querySelector(`label[for="${firstInvalid.id}"]`);
                if (uploadLabel) {
                    target = uploadLabel;
                }
            }

            // Select2 fallback (if used elsewhere)
            const select2Container =
                firstInvalid.nextElementSibling?.classList?.contains('select2')
                    ? firstInvalid.nextElementSibling
                    : null;

            if (select2Container) {
                target = select2Container;
            }

            // Hidden/custom field fallback
            if (target.offsetParent === null) {
                const wrapper = firstInvalid.closest(
                    '.form-group, .mb-3, .col-12, .field-wrapper, .row'
                );

                if (wrapper) {
                    target = wrapper;
                }
            }

            // Apply error class
            target.classList.add('validation-error');

            // Scroll to first error
            target.scrollIntoView({
                behavior: 'smooth',
                block: 'center'
            });

            // Focus real input if possible
            if (
                firstInvalid.offsetParent !== null &&
                typeof firstInvalid.focus === 'function'
            ) {
                setTimeout(() => {
                    firstInvalid.focus({ preventScroll: true });
                }, 300);
            }
        });

        // Remove error instantly when user fixes input
        form.addEventListener('input', function (e) {
            e.target.classList.remove('validation-error');
        });

        form.addEventListener('change', function (e) {
            e.target.classList.remove('validation-error');
        });

    });

});
</script>

<script>
document.addEventListener('DOMContentLoaded', function () {

    const form = document.getElementById('AddPartnerForm');
    const input = document.getElementById('resume_cv');
    const label = document.querySelector('label[for="resume_cv"]');
    const errorText = document.getElementById('resume_cv_error');
    const hasExistingResumeInput = document.getElementById('has_existing_resume');

    function setError(state) {
        label.classList.toggle('error', state);
        errorText.classList.toggle('d-none', !state);
    }

    form.addEventListener('submit', function (e) {

        const hasExistingResume = hasExistingResumeInput.value === "1";

        if ((!input.files || input.files.length === 0) && !hasExistingResume) {
            e.preventDefault();
            setError(true);
            return false;
        }

        setError(false);

    });

    input.addEventListener('change', function () {
        if (this.files.length > 0) {
            setError(false);
        }
    });

});
</script>
<script>
        document.addEventListener('DOMContentLoaded', function () {

            document.querySelectorAll('input[type="text"][inputmode="numeric"]').forEach(input => {

                // Format existing value
                if (input.value) {
                    input.value = Number(input.value.replace(/,/g, '')).toLocaleString('en-IN');
                }

                input.addEventListener('input', function () {

                    // Keep only digits
                    let value = this.value.replace(/[^\d]/g, '');

                    if (!value) {
                        this.value = '';
                        return;
                    }

                    this.value = Number(value).toLocaleString('en-IN');
                });

                // Remove commas before form submit
                input.form?.addEventListener('submit', () => {
                    input.value = input.value.replace(/,/g, '');
                });

            });

        });
    </script>

<style>
.validation-error {
    border: 2px solid #dc3545 !important;
    border-radius: 8px;
}
.upload-label.validation-error {
    border: 2px solid #dc3545;
    border-radius: 8px;
    background: rgba(220, 53, 69, 0.05);
}
</style>
<style>
.validation-error {
    border: 2px solid #dc3545 !important;
    box-shadow: 0 0 0 0.2rem rgba(220,53,69,.25) !important;
}
</style>

<style>
    .file-uploaded {
    border: 2px solid #198754;
    background: #f0fff4;
}

.file-name {
    display: block;
    margin-top: 8px;
    color: #198754;
    font-weight: 600;
}
</style>

<script>
    document.addEventListener('change', function (e) {

    if (e.target.type !== 'file') return;

    const input = e.target;
    const file = input.files[0];

    if (!file) return;

    const label = document.querySelector(`label[for="${input.id}"]`);

    if (!label) return;

    let fileNameEl = label.querySelector('.file-name');

    if (!fileNameEl) {
        fileNameEl = document.createElement('small');
        fileNameEl.classList.add('file-name');
        label.appendChild(fileNameEl);
    }

    fileNameEl.innerHTML =
        `✓ ${file.name} (${(file.size / 1024).toFixed(1)} KB)`;

    label.classList.add('file-uploaded');
});
</script>
<script>
document.addEventListener('keydown', function (e) {
    if (e.target.matches('input[type="number"]')) {
        if (['e', 'E', '+', '-'].includes(e.key)) {
            e.preventDefault();
        }
    }   
});

document.addEventListener('paste', function (e) {
    if (e.target.matches('input[type="number"]')) {
        const pasted = (e.clipboardData || window.clipboardData).getData('text');
        if (/[eE+\-]/.test(pasted)) {
            e.preventDefault();
        }
    }
});
</script>
</html>
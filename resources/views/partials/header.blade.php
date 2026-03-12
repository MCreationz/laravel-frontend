<div class="border-bottom p-3 d-flex justify-content-between align-items-center">

    <h5 class="mb-0">
        Dashboard
    </h5>

    <div>
        {{ auth('organization')->user()->organization_name }}
    </div>

</div>
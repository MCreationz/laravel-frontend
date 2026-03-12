@extends('layouts.dashboard')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>
            Dashboard
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
                Welcome {{ auth('organization')->user()->organization_name }}
            </h5>

            <p class="mb-0">
                This is your organization dashboard.
            </p>

        </div>
    </div>

</div>

@endsection
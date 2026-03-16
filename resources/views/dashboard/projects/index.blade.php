@extends('layouts.dashboard')

@section('content')

<div class="container-fluid">

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

</div>

@endsection
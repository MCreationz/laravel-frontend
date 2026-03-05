@extends('superadmin.layouts.app')

@section('title', 'Assign Admin')
@section('page-title', 'Assign Admin for ' . $company->name)

@section('content')
<div class="container-fluid">

    <div class="card shadow-sm">
        <div class="card-body">

            <h5>Current Admin:</h5>
            @if($currentAdmin)
                <p><strong>{{ $currentAdmin->name }}</strong> ({{ $currentAdmin->email }})</p>
            @else
                <p><span class="badge bg-secondary">No Admin Assigned</span></p>
            @endif

            <hr>

            <h5>Assign New Admin:</h5>
            <form method="POST" action="{{ route('superadmin.companies.update_admin', $company->id) }}">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Select User</label>
                    <select name="admin_user_id" class="form-select" required>
                        <option value="">-- Select User --</option>
                        @foreach($company->users as $user)
                            <option value="{{ $user->id }}"
                                {{ $currentAdmin && $currentAdmin->id == $user->id ? 'selected' : '' }}>
                                {{ $user->name }} ({{ $user->email }})
                            </option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Assign Admin</button>
                <a href="{{ route('superadmin.companies.index') }}" class="btn btn-secondary">Back</a>
            </form>

        </div>
    </div>

</div>
@endsection

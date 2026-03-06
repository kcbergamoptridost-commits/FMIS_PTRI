@extends('layouts.app')

@section('content')

<div class="container">

    <h3 class="mb-4">My Profile</h3>

    <div class="card">
        <div class="card-body">

            <form method="POST" action="{{ route('profile.update') }}">
                @csrf
                @method('PATCH')

                <!-- Full Name -->
                <div class="mb-3">
                    <label class="form-label">Full Name</label>
                    <input type="text"
                           name="name"
                           value="{{ Auth::user()->name }}"
                           class="form-control"
                           required>
                </div>

                <!-- Department -->
                <div class="mb-3">
                    <label class="form-label">Department</label>
                    <input type="text"
                           name="department"
                           value="{{ Auth::user()->department }}"
                           class="form-control">
                </div>

                <!-- New Password -->
                <div class="mb-3">
                    <label class="form-label">New Password</label>
                    <input type="password"
                           name="password"
                           class="form-control">
                </div>

                <!-- Confirm Password -->
                <div class="mb-3">
                    <label class="form-label">Confirm Password</label>
                    <input type="password"
                           name="password_confirmation"
                           class="form-control">
                </div>

              <div class="d-flex gap-2 mt-3">
    <button type="submit" class="btn btn-primary">
        Update
    </button>

    <a href="{{ route('dashboard') }}" class="btn btn-secondary">
        Cancel
    </a>
</div>

            </form>

        </div>
    </div>

</div>

@endsection
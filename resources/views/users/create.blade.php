@extends('layouts.app')

@section('content')

<div class="container-fluid">


<h3 class="mb-4 fw-bold">Create Staff Account</h3>

<div class="card shadow-sm border-0">
    <div class="card-body">

        <form action="{{ route('users.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">Employee ID</label>
                <input type="text" name="employee_id" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Full Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>

        <div class="mb-3">
        <label class="form-label">Department</label>

        <select name="department" class="form-select" required>
            <option value="">Select Department</option>
            <option value="PICTS">Planning and ICT Staff (PICTS)</option>
            <option value="TIPS">Technology Transfer, Information and Promotion Staff (TIPS)</option>
            <option value="RRD">Research and Development Staff (RRD)</option>
            <option value="TSD">Technical Services Division (TSD)</option>
            <option value="FAD">Finance and Administrative Staff (FAD)</option>
        </select>
    </div>

            <div class="mb-3">
        <label class="form-label">Select Role</label>

        <select name="department" class="form-select" required>
            <option value="staff">Staff</option>
            <option value="admin">Admin</option>
        </select>
    </div>


            <div class="mb-3">
                <label class="form-label">Email Address</label>
                <input type="email" name="email" class="form-control" required>
            </div>

            <div class="mb-3">
    <label class="form-label">Temporary Password</label>

    <div class="input-group">

        <input type="password"
               name="password"
               id="password"
               class="form-control"
               required>

        <span class="input-group-text" onclick="togglePassword()" style="cursor:pointer;">
            <i class="bi bi-eye" id="toggleIcon"></i>
        </span>

    </div>
</div>sssss

            <button type="submit" class="btn btn-primary">
                Register Account
            </button>

            <a href="{{ route('users.index') }}" class="btn btn-secondary">
                Cancel
            </a>

        </form>

    </div>
</div>


</div>

<script>
function togglePassword() {

    const password = document.getElementById("password");
    const icon = document.getElementById("toggleIcon");

    if (password.type === "password") {
        password.type = "text";
        icon.classList.remove("bi-eye");
        icon.classList.add("bi-eye-slash");
    } else {
        password.type = "password";
        icon.classList.remove("bi-eye-slash");
        icon.classList.add("bi-eye");
    }

}
</script>

@endsection
<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>FMIS Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <style>
        body {
            height: 100vh;
            background: linear-gradient(to right, #0d6efd, #5dade2);
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .register-card {
            width: 100%;
            max-width: 450px;
            border-radius: 12px;
        }

        .register-header img {
            width: 60px;
            height: 60px;
        }

        .register-header h5 {
            margin-top: 10px;
            font-weight: 600;
        }

        .register-header small {
            color: gray;
        }
    </style>
</head>
<body>

<div class="card shadow register-card">
    <div class="card-body p-4">

        <!-- Logo + Title -->
        <div class="text-center register-header mb-4">
            <img src="{{ asset('image/logo.png') }}" alt="Logo">
            <h5>DOST-PTRI</h5>
            <small>Financial Management Information System</small>
        </div>

        <!-- Register Form -->
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="mb-3">
    <label class="form-label">Employee ID</label>
    <input type="text" name="employee_id" class="form-control" required>
</div>

<div class="mb-3">
    <label class="form-label">Department</label>
    <select name="department" class="form-select" required>
        <option value="">-- Select Department --</option>
        <option value="Director">Director Office</option>
        <option value="picts">Planning and ICT Staff (PICTS) </option>
        <option value="tips">Technology Transfer Information and Promotion Staff (TIPS)</option>
        <option value="rrd">Research and Development Division</option>
        <option value="tsd">Technical Services Division</option>
        <option value="fad">Finance and Administrative</option>
    </select>
</div>

<div class="mb-3">
    <label class="form-label">Role</label>
    <select name="role" class="form-select" required>
        <option value="">-- Select Role --</option>
        <option value="Director">Director</option>
        <option value="Admin">Admin</option>
        <option value="Accountant">Accountant</option>
        <option value="Staff">Staff</option>
    </select>
</div>
            <div class="mb-3">
                <label class="form-label">Full Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>

            <div class="mb-3">
    <label class="form-label">Password</label>
    <div class="input-group">
        <input type="password" name="password" id="password" class="form-control" required>
        <span class="input-group-text" onclick="togglePassword('password','icon1')" style="cursor:pointer;">
            <i id="icon1" class="bi bi-eye"></i>
        </span>
    </div>
</div>

<div class="mb-3">
    <label class="form-label">Confirm Password</label>
    <div class="input-group">
        <input type="password" name="password_confirmation" id="confirm_password" class="form-control" required>
        <span class="input-group-text" onclick="togglePassword('confirm_password','icon2')" style="cursor:pointer;">
            <i id="icon2" class="bi bi-eye"></i>
        </span>
    </div>
</div>
</div>

            <div class="d-grid">
                <button type="submit" class="btn btn-primary">
                    Register
                </button>
            </div>

            <div class="text-center mt-3">
                <span>Already have an account?</span>
                <a href="{{ route('login') }}" class="text-decoration-none fw-semibold">
                    Login
                </a>
            </div>

        </form>

    </div>
</div>

</body>

<script>
function togglePassword(fieldId, iconId) {
    const field = document.getElementById(fieldId);
    const icon = document.getElementById(iconId);

    if (field.type === "password") {
        field.type = "text";
        icon.classList.remove("bi-eye");
        icon.classList.add("bi-eye-slash");
    } else {
        field.type = "password";
        icon.classList.remove("bi-eye-slash");
        icon.classList.add("bi-eye");
    }
}
</script>

</html> -->
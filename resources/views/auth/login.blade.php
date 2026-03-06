<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>FMIS Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            height: 100vh;
            background: linear-gradient(to right, #0d6efd, #5dade2);
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-card {
            width: 100%;
            max-width: 420px;
            border-radius: 12px;
        }

        .login-header img {
            width: 60px;
            height: 60px;
        }

        .login-header h5 {
            margin-top: 10px;
            font-weight: 600;
        }

        .login-header small {
            color: gray;
        }
    </style>
</head>
<body>

<div class="card shadow login-card">
    <div class="card-body p-4">

        <!-- Logo + Title -->
        <div class="text-center login-header mb-4">
            <img src="{{ asset('image/logo.png') }}" alt="Logo">
            <h5>DOST-PTRI</h5>
            <small>Financial Management Information System</small>
        </div>

        <!-- Login Form -->
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-3">
                <label class="form-label">Employee ID</label>
                <input type="text" name="employee_id" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
<div class="mb-3 form-check">
    <input type="checkbox" 
           class="form-check-input" 
           name="remember" 
           id="remember">
    <label class="form-check-label" for="remember">
        Remember Me
    </label>
</div>
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">
                    Login
                </button>
            </div>
<div class="text-center mt-3">
    <span>Don't have an account?</span>
    <a href="{{ route('register') }}" class="text-decoration-none fw-semibold">
        Create Account
    </a>
</div>
        </form>

    </div>
</div>

</body>
</html>
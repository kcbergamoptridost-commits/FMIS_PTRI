<!DOCTYPE html>
<html>
<head>
    <title>FMIS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body style="background:#f4f6f9;">

<div class="d-flex">

    <!-- SIDEBAR -->
    <div style="width:240px; background:#1f2a48; min-height:100vh; color:white;">

        <!-- Sidebar Header -->
        <div class="d-flex align-items-center justify-content-center"
             style="height:70px; border-bottom:1px solid #3b4a7a;">

            <img src="{{ asset('image/logo.png') }}" width="35" class="me-2">

            <div class="fw-bold">FMIS</div>
        </div>

        <!-- Sidebar Menu -->
        <!-- Sidebar Menu -->
<div class="px-3 pt-3">

    <!-- Dashboard -->
    <a href="{{ route('dashboard') }}"
       class="sidebar-link d-flex align-items-center mb-2">
        <i class="bi bi-speedometer2 me-2"></i> Dashboard
    </a>

    <!-- Budget -->
    <a class="sidebar-link d-flex align-items-center mb-2"
       data-bs-toggle="collapse"
       href="#budgetMenu">
        <i class="bi bi-cash-stack me-2"></i> Budget
        <i class="bi bi-chevron-down ms-auto"></i>
    </a>

    <!-- Budget Submenu -->
    <div class="collapse ps-4" id="budgetMenu">

        <a href="{{ route('budgets.create') }}"
           class="sidebar-link d-flex align-items-center mb-2">
            • Regular Programs
        </a>

        <a href="#"
           class="sidebar-link d-flex align-items-center mb-2">
            • Projects
        </a>
            <a href="{{ route('budgets.index') }}"
              class="sidebar-link d-flex align-items-center mb-2">
            • Budget Summary
        </a>
    </div>

    <!-- Proposal Module -->
    <a href="{{ route('proposals.index') }}"
       class="sidebar-link d-flex align-items-center mb-2">
        <i class="bi bi-file-earmark-text me-2"></i> Proposal Module
    </a>

    <!-- User Management -->
     
   <a href="{{ route('users.index') }}"
   class="sidebar-link d-flex align-items-center mb-2">
    <i class="bi bi-people me-2"></i> User Management
</a>

    <!-- Reports -->
    <a href="#"
       class="sidebar-link d-flex align-items-center mb-2">
        <i class="bi bi-bar-chart-line me-2"></i> Reports
    </a>

</div>



    </div>
    <!-- END SIDEBAR -->



    <!-- MAIN CONTENT -->
    <div class="flex-fill">

        <!-- TOPBAR -->
        <div class="d-flex justify-content-between align-items-center bg-white shadow-sm px-4"
             style="height:70px;">

            <div class="d-flex align-items-center">

                <img src="{{ asset('image/logo.png') }}" width="35" class="me-2">

                <div>
                    <div class="fw-bold">DOST-Philippine Textile Research Institute</div>
                    <small class="text-muted">Financial Management Information System</small>
                </div>

            </div>

            <div class="dropdown">
                <button class="btn btn-light dropdown-toggle"
                        type="button"
                        data-bs-toggle="dropdown">

                    <i class="bi bi-person me-2"></i>
                    {{ Auth::user()->name }}

                </button>

                <ul class="dropdown-menu dropdown-menu-end">

                    <li>
                        <a class="dropdown-item" href="{{ route('profile.edit') }}">
                            <i class="bi bi-person me-2"></i>
                            Profile
                        </a>
                    </li>

                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="dropdown-item">
                                <i class="bi bi-box-arrow-right me-2"></i>
                                Logout
                            </button>
                        </form>
                    </li>

                </ul>
            </div>

        </div>
        <!-- END TOPBAR -->


        <!-- PAGE CONTENT -->
        <div class="container-fluid p-4">
            @yield('content')
        </div>

    </div>
    <!-- END MAIN CONTENT -->

</div>


<style>

.sidebar-link{
    color:#e4e8ff;
    text-decoration:none;
    padding:10px 12px;
    border-radius:6px;
    display:flex;
    align-items:center;
    transition:0.2s;
}

.sidebar-link:hover{
    background:#4154f1;
    color:white;
}

.sidebar-link i{
    font-size:18px;
}

</style>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
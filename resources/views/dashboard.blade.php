@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <h3 class="mb-4 fw-bold">Dashboard</h3>

    <div class="row">

        <!-- Total Budget Card -->
        <div class="col-md-4">

            <div class="card shadow-sm border-0">
                <div class="card-body">

                    <h6 class="text-muted">Total Allotment</h6>

                    <h3 class="fw-bold text-primary">
                        ₱ {{ number_format($totalBudget,2) }}
                    </h3>

                </div>
            </div>

        </div>

        <div class="row">

    <div class="col-md-6">
        <div class="card shadow border-0">
            <div class="card-body">
                <h6 class="text-muted">Total Appropriation (FY 2026)</h6>
                <h3 class="fw-bold text-primary">
                    ₱ {{ number_format($totalAppropriation, 2) }}
                </h3>
            </div>
        </div>
    </div>

</div>

    </div>

</div>

@endsection
@extends('layouts.app')

@section('content')

<div class="container">

<h3 class="mb-4">Set Total Budget</h3>

<div class="card shadow-sm border-0" style="max-width:600px;">
    <div class="card-body p-4">

        <form method="POST" action="{{ route('storeBudget') }}">
        @csrf

        <div class="mb-3">
            <label class="form-label fw-semibold">Fiscal Year</label>
           <input type="text" name="fiscal_year" class="form-control" placeholder="Enter fiscal year (e.g. 2026)" pattern="[0-9]{4}" maxlength="4" required>
        </div>

        <div class="mb-4">
            <label class="form-label fw-semibold">Total Budget</label>
            <div class="input-group">
                <span class="input-group-text">₱</span>
                <input type="number" step="0.01" name="total_budget" class="form-control" placeholder="Enter total budget amount" required>
            </div>
        </div>

        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-primary">
                Save Budget
            </button>

            <a href="{{ route('budgets.index') }}" class="btn btn-secondary">
                Cancel
            </a>
        </div>

        </form>

    </div>
</div>

</div>

@endsection

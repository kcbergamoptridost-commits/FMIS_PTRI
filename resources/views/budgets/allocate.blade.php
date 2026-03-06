@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="mb-0">
        Allocate Budget:
        <span class="text-primary">
            {{ $budget->fiscal_year }} - {{ $budget->expense_class }}
        </span>
    </h3>

    <a href="{{ route('budgets.index') }}" class="btn btn-secondary">
        ← Back to Budget List
    </a>
</div>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

<div class="row">

    <!-- Allocation Form -->
    <div class="col-md-5">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                Allocate to Department
            </div>
            <div class="card-body">

                <form action="{{ route('budgets.allocations.store', $budget->id) }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Department</label>
                     <select name="department_id" class="form-control" required>
                    <option value="">-- Select Department --</option>

                    @foreach($departments as $department)
                        <option value="{{ $department->id }}">
                            {{ $department->department_name }}
                        </option>
                    @endforeach
                </select>

            </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Amount</label>
                        <input type="number"
                               step="0.01"
                               name="allocated_amount"
                               class="form-control"
                               required>
                    </div>

                    <button type="submit" class="btn btn-success w-100">
                        Allocate Budget
                    </button>
                </form>

            </div>
        </div>
    </div>

    <!-- Allocation Summary -->
    <div class="col-md-7">
        <div class="card shadow">
            <div class="card-header bg-dark text-white">
                Allocation Summary
            </div>
            <div class="card-body">

                @php
                    $totalAllocated = $allocations->sum('allocated_amount');
                    $remaining = $budget->total_amount - $totalAllocated;
                @endphp

                <p>
                    <strong>Total Budget:</strong>
                    ₱ {{ number_format($budget->total_amount, 2) }}
                </p>

                <p>
                    <strong>Total Allocated:</strong>
                    ₱ {{ number_format($totalAllocated, 2) }}
                </p>

                <p>
                    <strong>Remaining Balance:</strong>
                    ₱ {{ number_format($remaining, 2) }}
                </p>

                <hr>

                <table class="table table-bordered table-sm">
                    <thead class="table-secondary">
                        <tr>
                            <th>Department</th>
                            <th>Allocated</th>
                            <th>Balance</th>
                        </tr>
                    </thead>
                  <tbody>
                @foreach($allocations as $allocation)
                <tr>
                    <td>{{ $allocation->department->department_name }}</td>
                    <td>₱ {{ number_format($allocation->allocated_amount,2) }}</td>
                    <td>₱ {{ number_format($allocation->balance,2) }}</td>
                </tr>
                @endforeach
                </tbody>
                </table>

            </div>
        </div>
    </div>

</div>

@endsection
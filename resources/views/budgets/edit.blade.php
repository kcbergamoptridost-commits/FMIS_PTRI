@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Edit Budget</h3>
      <a href="{{ route('budgets.index') }}" class="btn btn-secondary">
        ← Return to Budget List
    </a>

    <form action="{{ route('budgets.update', $budget->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Fiscal Year</label>
            <input type="number" name="fiscal_year" class="form-control" value="{{ $budget->fiscal_year }}">
        </div>

        <div class="mb-3">
            <label>Expense Class</label>
            <input type="text" name="expense_class" class="form-control" value="{{ $budget->expense_class }}">
        </div>

        <div class="mb-3">
            <label>Program</label>
            <input type="text" name="program" class="form-control" value="{{ $budget->program }}">
        </div>

        <div class="mb-3">
            <label>Total Amount</label>
            <input type="number" step="0.01" name="total_amount" class="form-control" value="{{ $budget->total_amount }}">
        </div>

        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control">{{ $budget->description }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update Budget</button>
    </form>
</div>
@endsection
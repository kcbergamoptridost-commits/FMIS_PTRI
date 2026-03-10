@extends('layouts.app')

@section('content')

<div class="container">

<h3 class="mb-4">Set Total Budget</h3>

<form method="POST" action="{{ route('storeBudget') }}">
@csrf

<div class="mb-3">
<label>Fiscal Year</label>
<input type="number" name="fiscal_year" class="form-control" required>
</div>

<div class="mb-3">
<label>Total Budget</label>
<input type="number" step="0.01" name="total_budget" class="form-control" required>
</div>

<button type="submit" class="btn btn-primary">
Save Budget
</button>

</form>

</div>

@endsection
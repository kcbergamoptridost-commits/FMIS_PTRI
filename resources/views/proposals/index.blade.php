@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h3>Staff Budget Proposals</h3>

    <a href="{{ route('proposals.create') }}" class="btn btn-primary">
        Create Proposal
    </a>
</div>

<div class="card shadow">
    <div class="card-body">
        <p>No proposals submitted yet.</p>
    </div>
</div>

@endsection
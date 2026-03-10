<li>
    <a href="{{ route('dashboard') }}">Dashboard</a>
</li>

{{-- ADMIN ONLY --}}
@if(auth()->user()->role == 'admin')

<li class="menu-title">Budget</li>

<li>
    <a href="{{ route('budgets.index') }}">Regular Programs</a>
</li>

<li>
    <a href="#">Projects</a>
</li>

<li>
    <a href="{{ route('proposals.index') }}">Proposal Module</a>
</li>

<li>
    <a href="{{ route('users.index') }}">User Management</a>
</li>

<li>
    <a href="#">Reports</a>
</li>

@endif


{{-- STAFF ONLY --}}
@if(auth()->user()->role == 'staff')

<li>
    <a href="{{ route('budget.summary') }}">Budget Summary</a>
</li>

@endif
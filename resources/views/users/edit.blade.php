@extends('layouts.app')

@section('content')

<div class="container-fluid">

<h3 class="mb-4">Edit User</h3>

<div class="card shadow-sm">
<div class="card-body">

<form action="{{ route('users.update',$user->id) }}" method="POST">
@csrf
@method('PUT')

<div class="mb-3">
<label class="form-label">Name</label>
<input type="text" name="name" class="form-control"
value="{{ $user->name }}" required>
</div>

<div class="mb-3">
<label class="form-label">Email</label>
<input type="email" name="email" class="form-control"
value="{{ $user->email }}" required>
</div>

<div class="mb-3">
<label class="form-label">Role</label>
<select name="role" class="form-control">
<option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
<option value="staff" {{ $user->role == 'staff' ? 'selected' : '' }}>Staff</option>
</select>
</div>

<button type="submit" class="btn btn-primary">
Update User
</button>

<a href="{{ route('users.index') }}" class="btn btn-secondary">
Cancel
</a>

</form>

</div>
</div>

</div>

@endsection

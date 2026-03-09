@extends('layouts.app')

@section('content')

<div class="container-fluid">

<h3 class="mb-4">User Management</h3>

<a href="{{ route('users.create') }}" class="btn btn-primary mb-3">
    <i class="bi bi-person-plus me-1"></i> Add User
</a>

<table class="table table-bordered">

<thead>
<tr>
<th>Name</th>
<th>Email</th>
<th>Role</th>
<th>Action</th>
</tr>
</thead>

<tbody>

@foreach($users as $user)

<tr>
<td>{{ $user->name }}</td>
<td>{{ $user->email }}</td>
<td>{{ $user->role }}</td>

<td>

<a href="{{ route('users.edit',$user->id) }}"
        class="btn btn-primary btn-sm me-1">
    <i class="bi bi-pencil"></i> Edit
</a>

<form action="{{ route('users.destroy',$user->id) }}"
      method="POST"
      style="display:inline;">
    @csrf
    @method('DELETE')

    <button class="btn btn-danger btn-sm">
        <i class="bi bi-trash"></i> Delete
    </button>
</form>

</td>

</tr>

@endforeach

</tbody>

</table>

</div>

@endsection
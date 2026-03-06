<h2>Edit Department</h2>

<form action="{{ route('departments.update', $department) }}" method="POST">
    @csrf
    @method('PUT')

    <input type="text" name="department_name" value="{{ $department->department_name }}">
    <input type="text" name="code" value="{{ $department->code }}">

    <button type="submit">Update</button>
</form>
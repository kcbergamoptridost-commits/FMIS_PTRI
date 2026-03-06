<h2>Create Department</h2>

<form action="{{ route('departments.store') }}" method="POST">
    @csrf

    <input type="text" name="department_name" placeholder="Department Name">
    <input type="text" name="code" placeholder="Code">

    <button type="submit">Save</button>
</form>
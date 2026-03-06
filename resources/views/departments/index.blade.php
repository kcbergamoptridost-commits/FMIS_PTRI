<h2>Departments</h2>

<a href="{{ route('departments.create') }}">Add Department</a>

@if(session('success'))
    <p>{{ session('success') }}</p>
@endif

<table boarder="1">
    <tr>
        <th>Name</th>
        <th>Code</th>
        <th>Actions</th>
    </tr>

    @foreach($departments as $department)
    <tr>
        <td>{{ $department->department_name }}</td>
        <td>{{ $department->code }}</td>
        <td>
            <a href="{{ route('departments.edit', $department) }}">Edit</a>

            <form action="{{ route('departments.destroy', $department) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
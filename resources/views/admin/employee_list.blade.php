<h2>Employee List</h2>
<table border="1">
    <tr><th>Name</th><th>Email</th><th>Action</th></tr>
    @foreach($employees as $emp)
        <tr>
            <td>{{ $emp->name }} {{ $emp->lastname }}</td>
            <td>{{ $emp->email }}</td>
            <td><a href="{{ route('admin.edit', $emp->id) }}">Edit</a></td>
        </tr>
    @endforeach
</table>

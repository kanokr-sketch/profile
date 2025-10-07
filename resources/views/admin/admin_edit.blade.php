<h2>Edit Employee</h2>

<form method="POST" action="{{ route('admin.update', $employee->id) }}">
    @csrf

    <label>Name:</label>
    <input type="text" name="name" value="{{ $employee->name }}" readonly><br>

    <label>Lastname:</label>
    <input type="text" name="lastname" value="{{ $employee->lastname }}" readonly><br>

    <label>Email:</label>
    <input type="email" name="email" value="{{ $employee->email }}" readonly><br>

    <label>Phone:</label>
    <input type="text" name="phone" value="{{ $employee->phone }}" readonly><br>

    <label>Position:</label>
    <input type="text" name="position" value="{{ $employee->position }}" readonly><br>

    <label>Department:</label>
    <input type="text" name="department" name="department" value="{{ $employee->department }}"><br>

    <label>Role:</label>
    <input type="text" name="role" value="{{ $employee->role }}" readonly><br>

    <button type="submit">Save</button>
    <a href="{{ route('admin.list') }}">Cancel</a>
</form>

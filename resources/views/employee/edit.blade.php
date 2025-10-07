<h2>Edit Profile</h2>

<form method="POST" action="{{ route('employee.update') }}" enctype="multipart/form-data">
    @csrf

    <label>Name:</label>
    <input type="text" name="name" value="{{ old('name', $employee->name) }}" required><br>

    <label>Lastname:</label>
    <input type="text" name="lastname" value="{{ old('lastname', $employee->lastname) }}" required><br>

    <label>Email:</label>
    <input type="email" name="email" value="{{ old('email', $employee->email) }}" required><br>

    <label>Phone:</label>
    <input type="text" name="phone" value="{{ old('phone', $employee->phone) }}"><br>

    <label>Profile Image:</label>
    <input type="file" name="profile_image"><br>
    @if($employee->profile_image)
        <img src="{{ asset('storage/'.$employee->profile_image) }}" width="100"><br>
    @endif

    <hr>

    <!-- แสดงข้อมูลอื่นแบบ readonly -->
    <label>Position:</label>
    <input type="text" value="{{ $employee->position }}" readonly><br>

    <label>Department:</label>
    <input type="text" value="{{ $employee->department }}" readonly><br>

    <label>Role:</label>
    <input type="text" value="{{ $employee->role }}" readonly><br>

    <button type="submit">Save</button>
    <a href="{{ route('employee.profile') }}">Cancel</a>
</form>

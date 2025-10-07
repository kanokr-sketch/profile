<h2>Edit My Profile</h2>

<form method="POST" action="{{ route('employee.update') }}" enctype="multipart/form-data">
    @csrf

    <label>Name:</label>
    <input type="text" name="name" value="{{ $employee->name }}"><br>

    <label>Lastname:</label>
    <input type="text" name="lastname" value="{{ $employee->lastname }}"><br>

    <label>Email:</label>
    <input type="email" name="email" value="{{ $employee->email }}"><br>

    <label>Phone:</label>
    <input type="text" name="phone" value="{{ $employee->phone }}"><br>

    <label>Gender:</label>
    <select name="gender">
        <option value="">-- Select --</option>
        <option value="male" {{ $employee->gender == 'male' ? 'selected' : '' }}>Male</option>
        <option value="female" {{ $employee->gender == 'female' ? 'selected' : '' }}>Female</option>
        <option value="other" {{ $employee->gender == 'other' ? 'selected' : '' }}>Other</option>
    </select><br>

    <label>Birthdate:</label>
    <input type="date" name="birthdate" value="{{ $employee->birthdate }}"><br>

    <label>Address:</label>
    <input type="text" name="address" value="{{ $employee->address }}"><br>

    <label>Profile Image:</label>
    <input type="file" name="profile_image"><br>
    @if($employee->profile_image)
        <img src="{{ asset('storage/'.$employee->profile_image) }}" width="120"><br>
    @endif

    <!-- แสดงแต่ไม่แก้ไข -->
    <p><strong>Position:</strong> {{ $employee->position ?? '-' }}</p>
    <p><strong>Department:</strong> {{ $employee->department ?? '-' }}</p>
    <p><strong>Role:</strong> {{ $employee->role }}</p>

    <button type="submit">Save</button>
    <a href="{{ route('employee.profile') }}">Cancel</a>
</form>

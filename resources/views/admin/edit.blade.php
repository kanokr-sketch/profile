<h2>Edit Admin Profile</h2>

<form method="POST" action="{{ route('admin.profile.update') }}" enctype="multipart/form-data">
    @csrf

    <label>Name:</label>
    <input type="text" name="name" value="{{ old('name', $admin->name) }}" required><br>

    <label>Lastname:</label>
    <input type="text" name="lastname" value="{{ old('lastname', $admin->lastname) }}" required><br>

    <label>Email:</label>
    <input type="email" name="email" value="{{ old('email', $admin->email) }}" required><br>

    <label>Phone:</label>
    <input type="text" name="phone" value="{{ old('phone', $admin->phone) }}"><br>

    <label>Position:</label>
    <input type="text" name="position" value="{{ old('position', $admin->position) }}"><br>

    <label>Department:</label>
    <input type="text" name="department" value="{{ old('department', $admin->department) }}"><br>

    <label>Profile Image:</label>
    <input type="file" name="profile_image"><br>
    @if($admin->profile_image)
        <img src="{{ asset('storage/'.$admin->profile_image) }}" width="100"><br>
    @endif

    <label>Role (cannot edit):</label>
    <input type="text" value="{{ $admin->role }}" readonly><br>

    <button type="submit">Save</button>
    <a href="{{ route('admin.profile') }}">Cancel</a>
</form>

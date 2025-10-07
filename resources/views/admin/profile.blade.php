<h2>Admin Profile</h2>

@if(session('success'))
    <p style="color:green">{{ session('success') }}</p>
@endif

@if($admin->profile_image)
    <img src="{{ asset('storage/'.$admin->profile_image) }}" width="120"><br>
@endif

<p><strong>Name:</strong> {{ $admin->name }}</p>
<p><strong>Lastname:</strong> {{ $admin->lastname }}</p>
<p><strong>Email:</strong> {{ $admin->email }}</p>
<p><strong>Phone:</strong> {{ $admin->phone ?? '-' }}</p>
<p><strong>Position:</strong> {{ $admin->position ?? '-' }}</p>
<p><strong>Department:</strong> {{ $admin->department ?? '-' }}</p>
<p><strong>Gender:</strong> {{ $admin->gender ?? '-' }}</p>
<p><strong>Birthdate:</strong> {{ $admin->birthdate ? \Carbon\Carbon::parse($admin->birthdate)->format('d/m/Y') : '-' }}</p>
<p><strong>Address:</strong> {{ $admin->address ?? '-' }}</p>
<p><strong>Role:</strong> {{ $admin->role }}</p>

<a href="{{ route('admin.profile.edit') }}">Edit Profile</a>

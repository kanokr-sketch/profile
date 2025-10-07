<h2>My Profile</h2>

@if(session('success'))
    <p style="color:green">{{ session('success') }}</p>
@endif

@if($employee->profile_image)
    <img src="{{ asset('storage/'.$employee->profile_image) }}" width="120"><br>
@endif

<p><strong>Name:</strong> {{ $employee->name }}</p>
<p><strong>Lastname:</strong> {{ $employee->lastname }}</p>
<p><strong>Email:</strong> {{ $employee->email }}</p>
<p><strong>Phone:</strong> {{ $employee->phone ?? '-' }}</p>
<p><strong>Position:</strong> {{ $employee->position ?? '-' }}</p>
<p><strong>Department:</strong> {{ $employee->department ?? '-' }}</p>
<p><strong>Role:</strong> {{ $employee->role }}</p>

<a href="{{ route('employee.edit') }}">Edit Profile</a>

@extends('layouts.app') 

@section('content')
<div class=" mt-5">
    <h2 class="mb-4">Profile</h2>
    {{-- Error message --}}

    <x-alert-errors />

    {{-- Success message --}}
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    

    {{-- Update basic info --}}
    <form method="POST" action="{{ route('profile.update') }}">
        @csrf
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Username</label>
            <input type="text" name="username" class="form-control" value="{{ old('username', $user->username) }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Email (not editable)</label>
            <input type="email" class="form-control" value="{{ $user->email }}" disabled>
        </div>

        <button type="submit" class="btn btn-primary">Update Info</button>
    </form>

    <hr class="my-5">

    {{-- Change password --}}
    <h4>Change Password</h4>
    <form class="mb-5" method="POST" action="{{ route('profile.password') }}">
        @csrf
        <div class="mb-3">
            <label class="form-label">Current Password</label>
            <input type="password" name="current_password" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">New Password</label>
            <input type="password" name="new_password" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Confirm New Password</label>
            <input type="password" name="new_password_confirmation" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-warning">Change Password</button>
    </form>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container" style="margin-top: 150px;">
    <h2 class="mb-4">Edit Profile</h2>

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('profile.update') }}">
        @csrf
        @method('PATCH') <!-- Add this line to simulate PATCH request -->
        
        <!-- Name -->
        <div class="form-group mb-3">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name) }}" required>
            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <!-- Email -->
        <div class="form-group mb-3">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $user->email) }}" required>
            @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <!-- Update Button -->
        <button type="submit" class="btn btn-primary">
            <i class="fas fa-user-edit"></i> Update Profile
        </button>
    </form>
</div>


<div class="container mt-5">
    <h2 class="mb-4">Update Password</h2>
    <form method="post" action="{{ route('password.update') }}" class="mt-6">
        @csrf
        @method('put') <!-- Simulating PUT request -->
    
        <!-- Current Password -->
        <div class="mb-4">
            <label for="current_password" class="form-label">{{ __('Current Password') }}</label>
            <input id="current_password" name="current_password" type="password" class="form-control" autocomplete="current-password">
            @error('current_password')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    
        <!-- New Password -->
        <div class="mb-4">
            <label for="password" class="form-label">{{ __('New Password') }}</label>
            <input id="password" name="password" type="password" class="form-control" autocomplete="new-password">
            @error('password')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    
        <!-- Confirm New Password -->
        <div class="mb-4">
            <label for="password_confirmation" class="form-label">{{ __('Confirm New Password') }}</label>
            <input id="password_confirmation" name="password_confirmation" type="password" class="form-control" autocomplete="new-password">
            @error('password_confirmation')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    
        <!-- Save Button and Status Message -->
        <div class="d-flex align-items-center gap-3 mt-4">
            <button type="submit" class="btn btn-primary"><i class="fas fa-lock"></i> {{ __('Update Password') }}</button>
        </div>
    </form>
    <button onclick="goBack()" class="btn bg-secondary text-white btn-block mt-3"><i class="fas fa-arrow-left"></i> Go Back</button>
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</div>

@endsection

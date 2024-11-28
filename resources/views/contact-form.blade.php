<!-- resources/views/contact-form.blade.php -->

@extends('layouts.app')

@section('content')

<div class="container" style="margin-top: 150px;">
    <div class="container">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('send.email') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="company_name">Company Name</label>
                <input type="text" name="company_name" id="company_name" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="user_name">User Name</label>
                <input type="text" name="user_name" id="user_name" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="user_email">User Email</label>
                <input type="email" name="user_email" id="user_email" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Submit</button>
            <button onclick="goBack()" class="btn bg-secondary text-white btn-block mt-3"><i class="fas fa-arrow-left"></i> Go Back</button>

        </form>
    </div>
</div>
<script>
    function goBack() {
        window.history.back();
    }
</script>
@endsection
{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="text-center mb-4">
        <h1 class="display-4">Join Video Call</h1>
        <p class="lead">Enter the meeting password to join the meeting.</p>
    </div>

    <div class="card">
        <div class="card-body"> 

                @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
            <form method="POST" action="{{ route('video.call.join.post', ['sessionId' => $videoCall->session_id]) }}">
                @csrf

                <div class="form-group">
                    <label for="password">Meeting Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="captcha">CAPTCHA</label>
                    <div>
                        <img src="{{ captcha_src() }}" alt="CAPTCHA Image" id="captcha_image">
                        <button type="button" id="refresh_captcha">Refresh</button>
                    </div>
                    <input type="text" id="captcha" name="captcha" placeholder="Enter CAPTCHA" required>
                </div>

                <button type="submit" class="btn btn-primary btn-block">Join Meeting</button>
            </form>

        </div>
    </div>
</div>
<script>
    document.getElementById('refresh_captcha').addEventListener('click', function() {
        location.reload();  // Reload the entire page when the refresh button is clicked
    });
</script>
@endsection --}}


@extends('layouts.app')

@section('content')
<div class="container d-flex align-items-center justify-content-center" style="min-height: 72vh;">
    <div class="row justify-content-center w-100">
    <div class="text-center mb-4">
        <h1 class="display-4">Join Video Call</h1>
        <p class="lead">Enter the meeting password to join the meeting.</p>
    </div>

    <div class="card shadow border-light rounded-lg">
        <div class="card-body"> 
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            
            <form method="POST" action="{{ route('admin.video.call.join.post', ['sessionId' => $videoCall->session_id]) }}">
                @csrf

                <div class="form-group mb-4">
                    <label for="password" class="form-label">Enter Password</label>
                    <input type="password" name="password" class="form-control" required placeholder="Enter meeting password">
                </div>

                <div class="form-group mb-4">
                    <label for="captcha" class="form-label">CAPTCHA</label>
                    <div class="d-flex align-items-center mb-2">
                        <img src="{{ captcha_src() }}" alt="CAPTCHA Image" id="captcha_image" class="me-2" style="height: 50px;">
                        <button type="button" id="refresh_captcha" class="btn btn-outline-secondary btn-sm ms-2">Refresh</button>
                    </div>
                    <input type="text" id="captcha" name="captcha" class="form-control" placeholder="Enter CAPTCHA" required>
                </div>

                <button type="submit" class="btn btn-primary btn-block mt-3" style="width: 50%;">Join Meeting</button>
                <button onclick="goBack()" class="btn bg-secondary text-white btn-block mt-3"><i class="fas fa-arrow-left"></i> Go Back</button>
            </form>
        </div>
    </div>
</div>
</div>

<script>
    document.getElementById('refresh_captcha').addEventListener('click', function() {
        location.reload();  // Reload the entire page when the refresh button is clicked
    });
</script>

<style>
    /* Custom styles for a more attractive form appearance */
    body {
        background-color: #f8f9fa; /* Light background for better contrast */
    }

    .card {
        border-radius: 15px; /* Rounded corners */
        border: none; /* No border */
    }

    .btn-primary {
        background-color: #007bff; /* Primary button color */
        border: none; /* Remove border */
        transition: background-color 0.3s, transform 0.2s; /* Smooth transition */
    }

    .btn-primary:hover {
        background-color: #0056b3; /* Darker shade on hover */
        transform: translateY(-2px); /* Slightly raise button on hover */
    }

    .form-control {
        border-radius: 10px; /* Rounded input fields */
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Subtle shadow */
    }

    .form-control:focus {
        border-color: #007bff; /* Change border color on focus */
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.5); /* Subtle shadow effect */
    }

    .form-group label {
        font-weight: bold; /* Bold labels */
        color: #343a40; /* Darker text for labels */
    }

    .alert {
        border-radius: 10px; /* Rounded alert */
    }
</style>
<script>
    function goBack() {
        window.history.back();
    }
</script>
@endsection


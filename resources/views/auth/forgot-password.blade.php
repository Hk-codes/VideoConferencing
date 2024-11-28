<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Conferencing</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css">

    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .navbar {
            display: flex;
            align-items: center; 
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            padding: 10px;
            z-index: 1000;
        }

        .navbar-brand {
            font-size: 1.70rem; /* Increase font size */
            font-weight: bold; /* Make it bold */
            color: #007bff; /* Change text color */
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3); /* Add text shadow */
        }

        .title-container {
            width: 100%; /* Allow the title to use full width */
        }
        
        .logo { 
            height: 140px;
            width: 170px;
            position: absolute;
            top: 25px;
            left: 20px;
        }

        .custom-blue-header {
            background-color: #0e4c8b; /* Set the background color */
            color: white; /* Ensure the text color is white */
        }

        .custom-red-header {
            background-color: #ba0000; /* Set the background color */
            color: white; /* Ensure the text color is white */
        }

        @media (max-width: 992px) {
            .title-container {
                text-align: right; /* Align left on smaller screens */
            }
            .logo {
            height: 100px;
            width: 120px;
            position: absolute;
            top: 20px;
            left: 20px;
            }
        }
        @media (max-width: 680px) {
            .title-container {
                text-align: right; /* Align left on smaller screens */
            }
            .logo {
            height: 80px;
            width: 90px;
            position: absolute;
            top: 20px;
            left: 10px;
            }
            .navbar-brand {
            font-size: 1.30rem; 
            font-weight: bold; 
            }
        }
        @media (min-width: 994px) {
            .title-container {
                text-align: center; /* Center on larger screens */
            }
            
        }  
    </style>

    @stack('styles')
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light custom-red-header">
        <div class="container-fluid">
            <div class="logo-container">
                <img src="{{ asset('logo/logo.png') }}" alt="Logo" class="logo">
            </div>
            <div class="title-container">
                <a class="navbar-brand" style="color:white">Online Conferencing</a>
            </div>
        </div>
    </nav>

    <div class="container d-flex align-items-center justify-content-center" style="margin-top: 200px;">
        <div class="row justify-content-center w-100">
            <div class="col-md-6">
                <div class="card shadow-lg border-0 rounded-5" style="border-radius: 10px;"> <!-- Curved card with shadow -->
                    <div class="card-header text-center bg-gradient custom-blue-header text-white rounded-top-5" style="border-radius: 5px;"> <!-- Curved header -->
                        <h4 class="fw-bold mb-0">Reset Password</h4>
                        <p>Enter your email to receive a password reset link</p>
                    </div>
                    <div class="card-body p-4">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
    
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
    
                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf
    
                            <!-- Email Address -->
                            <div class="form-floating mb-3">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="name@example.com">
                                <label for="email">Email address</label>
                                @error('email')
                                    <div class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
    
                            <!-- Reset Password Button -->
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn custom-blue-header text-white btn-lg">
                                    <i class="fas fa-envelope"></i> Send Password Reset Link
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
    
                <!-- Login Link -->
                <div class="text-center mt-3">
                    <p> <a href="{{ route('login') }}" class="fw-bold " style="color: red;">Login here</a></p>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>


{{-- @section('content')
<div class="container d-flex align-items-center justify-content-center" style="min-height: 85vh;">
    <div class="row justify-content-center w-100">
        <div class="col-md-6">
            <div class="card shadow-lg border-0 rounded-5" style="border-radius: 10px;"> <!-- Curved card with shadow -->
                <div class="card-header text-center bg-gradient custom-blue-header text-white rounded-top-5" style="border-radius: 5px;"> <!-- Curved header -->
                    <h4 class="fw-bold mb-0">Reset Password</h4>
                    <p>Enter your email to receive a password reset link</p>
                </div>
                <div class="card-body p-4">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <!-- Email Address -->
                        <div class="form-floating mb-3">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="name@example.com">
                            <label for="email">Email address</label>
                            @error('email')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>

                        <!-- Reset Password Button -->
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn custom-blue-header text-white btn-lg">
                                <i class="fas fa-envelope"></i> Send Password Reset Link
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Login Link -->
            <div class="text-center mt-3">
                <p> <a href="{{ route('login') }}" class="fw-bold " style="color: red;">Login here</a></p>
            </div>
        </div>
    </div>
</div>
<style>
    .custom-blue-header {
        background-color: #0e4c8b; /* Set the background color to gray */
        color: white; /* Ensure the text color is white */
    }
</style>
@endsection --}}

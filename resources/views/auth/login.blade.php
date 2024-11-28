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

        /* @media (max-width: 768px) {
            .title-container {
                text-align: right; 
            }
            .logo {
            height: 70px;
            width: 80px;
            position: absolute;
            top: 25px;
            left: 10px;
            }
        }

        @media (min-width: 769px) {
            .title-container {
                text-align: center; 
            }
        } */

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

    <div class="container mt-4">
        <main>
            <div class="container d-flex align-items-center justify-content-center" style="margin-top: 150px;">
                <div class="row justify-content-center w-100">
                    <div class="col-md-6">
                        <div class="card shadow-lg border-0" style="border-radius: 10px;">
                            <div class="card-header text-center custom-blue-header" style="border-radius: 5px;">
                                <h4 class="fw-bold mb-0">Welcome Back!</h4>
                                <p>Please login to your account</p>
                            </div>
                            <div class="card-body p-4">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul class="mb-0">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
            
                                <form method="POST" action="{{ route('login') }}">
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
            
                                    <!-- Password -->
                                    <div class="form-floating mb-3">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
                                        <label for="password">Password</label>
                                        @error('password')
                                            <div class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
            
                                    <!-- Remember Me -->
                                    <div class="form-check mb-3">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="remember">
                                            Remember Me
                                        </label>
                                    </div>
            
                                    <!-- Submit Button -->
                                    <div class="d-grid">
                                        <button type="submit" class="btn custom-blue-header btn-lg">
                                            <i class="fas fa-sign-in-alt"></i> Login
                                        </button>
                                    </div>
            
                                    <!-- Forgot Password Link -->
                                    @if (Route::has('password.request'))
                                        <div class="text-center mt-3">
                                            <a class="btn btn-link" href="{{ route('password.request') }}" style="color: red;">
                                                Reset Password?
                                            </a>
                                        </div>
                                    @endif
                                </form>
                            </div>
                        </div>
            
                        <!-- Register Link -->
                        <div class="text-center mt-3">
                            {{-- <p>Don't have an account? <a href="{{ route('register') }}" class="fw-bold" style="color: red;">Register New Company User</a></p> --}}
                            <p>Don't have an account? <a href="{{ route('contact-form') }}" class="fw-bold" style="color: red;">Send details for Register Approval</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>
















{{-- <!DOCTYPE html>
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
            font-size: 1.75rem; /* Increase font size */
            color: #007bff; /* Change text color */
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3); /* Add text shadow */
        }

        .title-container {
            
            display: flex;
            justify-content: right; /* Center title horizontally */
        }
        .logo { 
            height: 140px;
            width: 170px;
            position: absolute;
            top: 25px;
            left:20px;
        }
        /* .navbar.logo-container {

            position: relative;
        } */
    </style>

    @stack('styles')
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light custom-red-header">
        <div class="container-fluid">
            <div class="logo-container">
                <img src="\logo\logo.png" alt="Logo" class="logo">
            </div>
            <div class="title-container">
                <a class="navbar-brand" style = "color:white">Online Conferencing</a>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <main>
            <div class="container d-flex align-items-center justify-content-center" style="min-height: 85vh;">
                <div class="row justify-content-center w-100">
                    <div class="col-md-6">
                        <div class="card shadow-lg border-0" style="border-radius: 10px;">
                            <div class="card-header text-center custom-blue-header" style="border-radius: 5px;">
                                <h4 class="fw-bold mb-0">Welcome Back!</h4>
                                <p>Please login to your account</p>
                            </div>
                            <div class="card-body p-4">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul class="mb-0">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
            
                                <form method="POST" action="{{ route('login') }}">
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
            
                                    <!-- Password -->
                                    <div class="form-floating mb-3">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
                                        <label for="password">Password</label>
                                        @error('password')
                                            <div class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
            
                                    <!-- Remember Me -->
                                    <div class="form-check mb-3">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="remember">
                                            Remember Me
                                        </label>
                                    </div>
            
                                    <!-- Submit Button -->
                                    <div class="d-grid">
                                        <button type="submit" class="btn custom-blue-header btn-lg">
                                            <i class="fas fa-sign-in-alt"></i> Login
                                        </button>
                                    </div>
            
                                    <!-- Forgot Password Link -->
                                    @if (Route::has('password.request'))
                                        <div class="text-center mt-3">
                                            <a class="btn btn-link" href="{{ route('password.request') }}" style="color: red;">
                                                Reset Password?
                                            </a>
                                        </div>
                                    @endif
                                </form>
                            </div>
                        </div>
            
                        <!-- Register Link -->
                        <div class="text-center mt-3">
                            <p>Don't have an account? <a href="{{ route('register') }}" class="fw-bold" style="color: red;">Register here</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <style>
                .custom-blue-header {
                    background-color: #0e4c8b; /* Set the background color to gray */
                    color: white; /* Ensure the text color is white */
                }
                .custom-red-header {
            background-color: #ba0000; /* Set the background color to gray */
            color: white; /* Ensure the text color is white */
        }
            </style>
        </main>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html> --}}





{{-- @section('content')
<div class="container d-flex align-items-center justify-content-center" style="min-height: 85vh;">
    <div class="row justify-content-center w-100">
        <div class="col-md-6">
            <div class="card shadow-lg border-0" style="border-radius: 10px;">
                <div class="card-header text-center custom-blue-header" style="border-radius: 5px;">
                    <h4 class="fw-bold mb-0">Welcome Back!</h4>
                    <p>Please login to your account</p>
                </div>
                <div class="card-body p-4">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('login') }}">
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

                        <!-- Password -->
                        <div class="form-floating mb-3">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
                            <label for="password">Password</label>
                            @error('password')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>

                        <!-- Remember Me -->
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember">
                                Remember Me
                            </label>
                        </div>

                        <!-- Submit Button -->
                        <div class="d-grid">
                            <button type="submit" class="btn custom-blue-header btn-lg">
                                <i class="fas fa-sign-in-alt"></i> Login
                            </button>
                        </div>

                        <!-- Forgot Password Link -->
                        @if (Route::has('password.request'))
                            <div class="text-center mt-3">
                                <a class="btn btn-link" href="{{ route('password.request') }}" style="color: red;">
                                    Reset Password?
                                </a>
                            </div>
                        @endif
                    </form>
                </div>
            </div>

            <!-- Register Link -->
            <div class="text-center mt-3">
                <p>Don't have an account? <a href="{{ route('register') }}" class="fw-bold" style="color: red;">Register here</a></p>
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
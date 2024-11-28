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
            left:20px;
        }
        .custom-red-header {
            background-color: #ba0000; /* Set the background color to gray */
            color: white; /* Ensure the text color is white */
        }
        .custom-blue-header {
        background-color: #0e4c8b; /* Set the background color to gray */
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
                <img src="{{ asset('logo/logo.png') }}" alt="Logo" class="logo">
            </div>
            <div class="title-container">
                <a class="navbar-brand" style = "color:white">Online Conferencing</a>
            </div>
        </div>
    </nav>



    <div class="container d-flex align-items-center justify-content-center" style="margin-top: 150px;">
        <div class="row justify-content-center w-100">
            <div class="col-md-6">
                <div class="card shadow-lg border-0 rounded-4" style="border-radius: 10px;"> <!-- Added rounded-4 for curved edges -->
                    <div class="card-header text-center custom-blue-header" style="border-radius: 5px;">
                        <h4 class="fw-bold mb-0">Create New Company User Account</h4>
                        <p>Enter Details below</p>
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

                        @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        @endif 
    
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
    
                            <!-- Name -->
                            <div class="form-floating mb-3">
                                <input id="company_name" type="text" class="form-control @error('company_name') is-invalid @enderror" name="company_name" value="{{ old('company_name') }}" required autocomplete="company_name" autofocus placeholder="Company Name">
                                <label for="company_name">Company Name</label>
                                @error('company_name')
                                    <div class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>

                            <div class="form-floating mb-3">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="John Doe">
                                <label for="name">User Name</label>
                                @error('name')
                                    <div class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
    
                            <!-- Email Address -->
                            <div class="form-floating mb-3">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="name@example.com">
                                <label for="email">User Email address</label>
                                @error('email')
                                    <div class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
    
                            <!-- Password -->
                            <div class="form-floating mb-3">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">
                                <label for="password">Password</label>
                                @error('password')
                                    <div class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
    
                            <!-- Confirm Password -->
                            <div class="form-floating mb-3">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                                <label for="password-confirm">Confirm Password</label>
                            </div>
    
                            <!-- Register Button -->
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn custom-blue-header btn-lg">
                                    <i class="fas fa-user-plus"></i> Register
                                </button>
                                <button onclick="goBack()" class="btn bg-secondary text-white btn-block mt-3"><i class="fas fa-arrow-left"></i> Go Back</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html> --}}



@extends('layouts.app')
 @section('content')
<div class="container d-flex align-items-center justify-content-center" style="margin-top: 150px;">
        <div class="row justify-content-center w-100">
            <div class="col-md-6">
                <div class="card shadow-lg border-0 rounded-4" style="border-radius: 10px;"> <!-- Added rounded-4 for curved edges -->
                    <div class="card-header text-center custom-blue-header" style="border-radius: 5px;">
                        <h4 class="fw-bold mb-0">Create New Company User Account</h4>
                        <p>Enter Details below</p>
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

                        @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        @endif 
    
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
    
                            <!-- Name -->
                            <div class="form-floating mb-3">
                                <input id="company_name" type="text" class="form-control @error('company_name') is-invalid @enderror" name="company_name" value="{{ old('company_name') }}" required autocomplete="company_name" autofocus placeholder="Company Name">
                                <label for="company_name">Company Name</label>
                                @error('company_name')
                                    <div class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>

                            <div class="form-floating mb-3">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="John Doe">
                                <label for="name">User Name</label>
                                @error('name')
                                    <div class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
    
                            <!-- Email Address -->
                            <div class="form-floating mb-3">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="name@example.com">
                                <label for="email">User Email address</label>
                                @error('email')
                                    <div class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
    
                            <!-- Password -->
                            <div class="form-floating mb-3">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">
                                <label for="password">Password</label>
                                @error('password')
                                    <div class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
    
                            <!-- Confirm Password -->
                            <div class="form-floating mb-3">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                                <label for="password-confirm">Confirm Password</label>
                            </div>
    
                            <!-- Register Button -->
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn custom-blue-header btn-lg">
                                    <i class="fas fa-user-plus"></i> Register
                                </button>
                                <button onclick="goBack()" class="btn bg-secondary text-white btn-block mt-3"><i class="fas fa-arrow-left"></i> Go Back</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function goBack() {
            window.history.back();
        }
    </script>


<style>
    .custom-red-header {
        background-color: #ba0000; /* Set the background color to gray */
        color: white; /* Ensure the text color is white */
    }
    .custom-blue-header {
    background-color: #0e4c8b; /* Set the background color to gray */
    color: white; /* Ensure the text color is white */
    }
</style>
@endsection 
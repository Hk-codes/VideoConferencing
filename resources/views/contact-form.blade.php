<!-- resources/views/contact-form.blade.php -->

@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css">

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7fc; /* Light background for the page */
        }

        .container {
            margin-top: 150px;
            max-width: 1000px; /* Center the form and limit the width */
        }

        .form-group label {
            font-weight: bold;
            color: #333; /* Dark color for labels */
        }

        .form-control {
            border-radius: 10px; /* Rounded corners for the inputs */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Add a subtle shadow */
            transition: all 0.3s ease-in-out; /* Smooth transition */
        }

        .form-control:focus {
            border-color: #007bff; /* Focus color */
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5); /* Highlight effect */
        }

        .btn {
            border-radius: 10px; /* Rounded corners for buttons */
            padding: 10px 20px; /* Increase button size */
            font-weight: bold; /* Bold text on buttons */
            transition: background-color 0.3s ease; /* Smooth background color transition */
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3; /* Darker blue on hover */
            border-color: #0056b3;
        }

        .btn.bg-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
        }

        .btn.bg-secondary:hover {
            background-color: #5a6268;
            border-color: #545b62;
        }

        .alert-success {
            background-color: #d4edda;
            border-color: #c3e6cb;
            color: #155724;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 5px;
            font-weight: bold;
        }

        .card-header {
            background-color: #007bff; /* Matching blue color for header */
            color: white;
            text-align: center;
            padding: 20px;
            border-radius: 10px 10px 0 0;
            font-size: 1.5rem;
            font-weight: bold;
            box-shadow: 0 4px 8px rgba(0, 123, 255, 0.2); /* Subtle shadow for depth */
        }

        .card-header:hover {
            background-color: #0056b3; /* Darker blue on hover */
            cursor: pointer;
            transform: translateY(-2px); /* Slight lift effect */
        }

        .card {
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); /* Shadow around the form */
        }

        .go-back-btn {
            display: block;
            margin-top: 15px;
            text-align: center;
            font-size: 1rem;
        }

        /* Media Query for smaller screens */
        @media (max-width: 576px) {
            .container {
                margin-top: 50px; /* Reduce margin on smaller screens */
            }
        }
    </style>
</head>

<body>

    <div class="container">
        <!-- Success message -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Form Card -->
        <div class="card">
            <div class="card-header">
                User Registration
            </div>
            <div class="card-body">
                <form action="{{ route('send.email') }}" method="POST">
                    @csrf

                    <!-- Company Name -->
                    <div class="form-group mb-3">
                        <label for="company_name">Company Name</label>
                        <input type="text" name="company_name" id="company_name" class="form-control" placeholder="Enter your company name" required>
                    </div>

                    <!-- User Name -->
                    <div class="form-group mb-3">
                        <label for="user_name">User Name</label>
                        <input type="text" name="user_name" id="user_name" class="form-control" placeholder="Enter your user name" required>
                    </div>

                    <!-- User Email -->
                    <div class="form-group mb-3">
                        <label for="user_email">User Email</label>
                        <input type="email" name="user_email" id="user_email" class="form-control" placeholder="Enter your email" required>
                    </div>

                    <!-- Password -->
                    <div class="form-group mb-3">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Enter a password" required>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary mt-3 w-100">Submit</button>

                    <!-- Go Back Button -->
                    <button type="button" onclick="goBack()" class="btn bg-secondary text-white btn-block mt-3 w-100">
                        <i class="fas fa-arrow-left"></i> Go Back
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script>
        function goBack() {
            window.history.back();
        }
    </script>

</body>

</html>







{{-- <div class="container" style="margin-top: 150px;">
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
</script> --}}
@endsection
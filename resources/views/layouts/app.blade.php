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
            margin: 0;
            font-family: Arial, sans-serif;
        }
        .navbar {
            display: flex;
            justify-content: space-between; /* Space between title and nav items */
            align-items: center; /* Center items vertically */
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            padding: 10px;
            z-index: 1000;
        }
        .custom-red-header {
            background-color: #ba0000; /* Set the background color */
            color: white; /* Ensure the text color is white */
        }
        .navbar-brand {
            font-size: 1.70rem; /* Increase font size */
            font-weight: bold; /* Make it bold */
            color: #007bff; /* Change text color */
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3); /* Add text shadow */
            transition: color 0.3s; /* Add transition for hover effect */
        }
        .title-container {
            width: 66.5%; /* Allow the title to use full width */
                }
        .logo {
            height: 140px;
            width: 170px;
            position: absolute;
            top: 25px;
            left: 20px;
            z-index: 2;
        }
        .navbar-logo-title {
            display: flex;
            align-items: center; /* Align items in a row */
            justify-content: center; /* Center logo and title */
        }
        .navbar-toggler {
            margin-bottom: 0px;
        }

        @media (max-width: 1611px) {
            .title-container {
                text-align: right; 
            }
            .logo {
            height: 100px;
            width: 120px;
            position: absolute;
            top: 20px;
            left: 15px;
            }
            .navbar-brand {
            font-size: 1.50rem; 
            font-weight: bold; /* Make it bold */
        }
        }
        @media (max-width: 991px) {
            .title-container {
                justify-content: right; 
            }
            .logo {
            height: 80px;
            width: 90px;
            position: absolute;
            top: 20px;
            left: 15px;
            }
            .navbar-brand {
            font-size: 1.20rem;
        }
        }

        @media (max-width: 680px) {
            .title-container {
                text-align: right; /* Align left on smaller screens */
            }
            .logo {
            height: 70px;
            width: 75px;
            position: absolute;
            top: 20px;
            left: 10px;
            }
            .navbar-brand {
            font-size: 1.0rem;
            }
            .nav-link {
            font-size: 0.8em;
            }
        }

        @media (min-width: 1612px) {
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
                <div class="navbar-logo-title">
                    <a class="navbar-brand" style="color:white">Online Conferencing</a>
                    {{-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button> --}}

                    <div class="navbar-toggler" style= "border:none;">
                        @auth
                            <div class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle d-flex align-items-center" style="color:white" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown">
                                    <i class="fas fa-user-circle me-2" style="font-size: 1.0em;"></i>
                                    <span class="fw-bold" style="font-size: 0.8em;">{{ Auth::user()->name }}</span>
                                </a>
                    
                                <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="userDropdown" style="min-width: 200px; list-style: none;">
                                    <li>
                                        <a class="dropdown-item d-flex align-items-center" href="{{ route('profile.edit') }}">
                                            <i class="fas fa-user me-2 text-primary"></i>
                                            Profile
                                        </a>
                                    </li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li>
                                        <a class="dropdown-item d-flex align-items-center text-danger" href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <i class="fas fa-sign-out-alt me-2"></i>
                                            Logout
                                        </a>
                                    </li>
                    
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </ul>
                            </div>
                        @endauth
                    </div>
                    




                </div>
            </div>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    @auth
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle d-flex align-items-center" style="color:white" href="#" id="userDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user-circle me-2" style="font-size: 1.2em;"></i>
                                <span class="fw-bold" style="font-size: 1.1em;">{{ Auth::user()->name }}</span>
                            </a>

                            <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="userDropdown" style="min-width: 200px;">
                                <li>
                                    <a class="dropdown-item d-flex align-items-center" href="{{ route('profile.edit') }}">
                                        <i class="fas fa-user me-2 text-primary"></i>
                                        Profile
                                    </a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <a class="dropdown-item d-flex align-items-center text-danger" href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="fas fa-sign-out-alt me-2"></i>
                                        Logout
                                    </a>
                                </li>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </ul>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>



    <div class="container mt-4">
        <main>
            @yield('content')
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
        margin: 0;
        font-family: Arial, sans-serif;
        }
        .navbar {
            display: flex;
            justify-content: space-between; /* Space between title and nav items */
            align-items: center; /* Center items vertically */
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            padding: 10px;
            z-index: 1000;
        }
        .custom-red-header {
            background-color: #ba0000; /* Set the background color to gray */
            color: white; /* Ensure the text color is white */
        }
        .navbar-brand {
            
            font-size: 1.75rem; /* Increase font size */
            font-weight: bold; /* Make it bold */
            color: #007bff; /* Change text color */
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3); /* Add text shadow */
            transition: color 0.3s; /* Add transition for hover effect */
        }

        .title-container {
            
            flex: 1; /* Allow title to take up remaining space */
            display: flex;
            justify-content: center; /* Center title horizontally */
        }
        .logo { 
            height: 140px;
            width: 170px;
            position: absolute;
            top: 25px;
            left:20px;
            z-index: 2;
        }
        .navbar.logo-container {

            position: relative;
        }
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
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    @auth
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle d-flex align-items-center" style="color:white" href="#" id="userDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user-circle me-2" style="font-size: 1.2em;"></i>
                                <span class="fw-bold" style="font-size: 1.1em; ">{{ Auth::user()->name }}</span>
                            </a>

                            <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="userDropdown" style="min-width: 200px;">
                                <li>
                                    <a class="dropdown-item d-flex align-items-center" href="{{ route('profile.edit') }}">
                                        <i class="fas fa-user me-2 text-primary"></i>
                                        Profile
                                    </a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <a class="dropdown-item d-flex align-items-center text-danger" href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="fas fa-sign-out-alt me-2"></i>
                                        Logout
                                    </a>
                                </li>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </ul>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <main>
            @yield('content')
        </main>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>

</html> --}}

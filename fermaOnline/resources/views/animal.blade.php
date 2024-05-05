<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #F3FFF7;
            margin: 0;
            padding: 0;
        }

        .navbar {
            background-color: #fff;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
            z-index: 1000; /* Ensure navbar is on top of other content */
            position: fixed;
            width: 100%;
            top: 0;
            left: 0;
        }

        .logo-img {
            width: 7rem; /* 112px */
            height: auto; /* Maintain aspect ratio */
            margin-right: 0.625rem; /* 10px */
            margin-top: 0.625rem; /* 10px */
        }

        .spacer {
            height: 56px; /* Adjust height to match the height of the navbar */
            /* Height of navbar might vary based on your design */
        }

        .content {
            padding-top: 56px; /* Ensure content starts below the navbar */
            /* You can adjust this value based on the height of your navbar */
        }

        .profile-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
            width: 300px;
            margin: auto;
        }

        .profile-container h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .profile-container p {
            text-align: center;
            margin-bottom: 10px;
        }

        .profile-container a {
            display: block;
            text-align: center;
            margin-top: 10px;
            text-decoration: none;
            color: #4CAF50;
        }

        .profile-container input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .profile-container input[type="submit"] {
            width: 100%;
            padding: 10px;
            border: none;
            background-color: #4CAF50;
            color: white;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
        }

        .profile-container input[type="submit"]:hover {
            background-color: #45a049;
        }
        .navbar-nav .nav-item {
        margin-top: 0;
        }
    </style>
</head>
<body>
@if(!$data['is_admin'])
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #92db87; padding-top: 0; padding-bottom: 0;">
    <div class="container top-container" style="padding-top: 0;">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand d-flex align-items-center ms-auto" href="#" style="color: white; height: 50%; padding-right: 0.5rem;">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="logo-img" style="height: 4.5em;"> 
            <span class="ms-2" style="margin-top: 0.5em;">FermaOnline</span>
        </a>
        <div class="collapse navbar-collapse" id="navbarNav" style="padding-left: 0.5rem;">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('mainPage', ['guid_id' => $data['guid_id']])}}" style="color: white; line-height: 1; margin-right: 1rem;"><i class="fas fa-home"></i> Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('companyDescription', ['guid_id' => $data['guid_id']])}}" style="color: white; line-height: 1; margin-right: 1rem;"><i class="fas fa-info-circle"></i> About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('animal', ['guid_id' => $data['guid_id']])}}" style="color: white; line-height: 1; margin-right: 1rem;"><i class="fas fa-paw"></i> Animals</a>
                </li>
                <!-- Add more navigation links as needed -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: white; line-height: 1; margin-right: 1rem;">
                        <i class="fas fa-user"></i> Profile
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{ route('profile', ['guid_id' => $data['guid_id']]) }}"><i class="fas fa-address-card"></i> My Data</a></li>
                        <li><a class="dropdown-item" href="{{route('transaction', ['guid_id' => $data['guid_id']])}}"><i class="fas fa-chart-line"></i> My Transactions</a></li>
                        <li><a class="dropdown-item" href="#"><i class="fas fa-wallet"></i> Add Funds</a></li>
                        <li><a class="dropdown-item" href="{{route('logout')}}"><i class="fas fa-sign-out-alt"></i> Log Out</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="spacer"></div>

<div class="content">
    <!-- Your content goes here -->
    <div class="profile-container">
        <!-- Profile content -->
        <h2>Animal Information Goes here</h2>
        <p>All animals</p>
        <!-- Add more profile-related content -->
    </div>
</div>

@else
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #92db87; padding-top: 0; padding-bottom: 0;">
    <div class="container top-container" style="padding-top: 0;">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand d-flex align-items-center ms-auto" href="#" style="color: white; height: 50%; padding-right: 0.5rem;">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="logo-img" style="height: 4.5em;"> 
            <span class="ms-2" style="margin-top: 0.5em;">FermaOnline</span>
        </a>
        <div class="collapse navbar-collapse" id="navbarNav" style="padding-left: 0.5rem;">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: white; line-height: 1; margin-right: 1rem;">
                        <i class="fas fa-clipboard-list"></i> Product Management
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown1">
                        <li><a class="dropdown-item" href="{{route('mainPage', ['guid_id' => $data['guid_id']])}}"><i class="fas fa-business-time"></i> Stock Management</a></li>
                        <li><a class="dropdown-item" href="{{route('addProducts', ['guid_id' => $data['guid_id']])}}"><i class="fas fa-plus"></i> Add Products</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: white; line-height: 1; margin-right: 1rem;">
                        <i class="fas fa-store-alt"></i> Animal Management
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown2">
                        <li><a class="dropdown-item" href="{{route('animal', ['guid_id' => $data['guid_id']])}}"><i class="fas fa-paw"></i>Animal View </a></li>
                        <li><a class="dropdown-item" href="{{route('addAnimal', ['guid_id' => $data['guid_id']])}}"><i class="fas fa-plus"></i> Add Animals</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('transaction', ['guid_id' => $data['guid_id']])}}" style="color: white; line-height: 1; margin-right: 1rem;"><i class="fas fa-chart-line"></i> Transactions History</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"  style="color: white; line-height: 1; margin-right: 1rem;" href="{{route('logout')}}"><i class="fas fa-sign-out-alt"></i> Log Out</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="spacer"></div>

<div class="content">
    <!-- Your content goes here -->
    <div class="profile-container">
        <!-- Profile content -->
        <h2>Animal Information Goes here</h2>
        <p>All animals</p>
        <!-- Add more profile-related content -->
    </div>
</div>

@endif
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

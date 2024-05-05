<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;400;500;700;900&family=Oswald:wght@200..700&family=Ubuntu&display=swap" rel="stylesheet">
    <style>
        /* Custom CSS to set row height to 100vh */
        html {
            overflow-x: hidden;
        }
        .row {
            height: 100vh;
        }    
        .center-content {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100%;
        }
        /* Set image to 20% of the viewport width and height */
        img {
            width: 50vw;
            height: 50vh;
            /* Add max-width and max-height to prevent the image from exceeding 20% of the screen */
            max-width: 100%;
            max-height: 100%;
        }
        /* Set background color */
        body {
            background: linear-gradient(to right, #92db87, #ffffff); /* Change colors as needed */
        }
        /* Styling for brand name */
        .brand {
            font-family: 'Montserrat', sans-serif; /* Apply Montserrat font */
            font-size: 3.375rem; /* 54px */
            margin-top: 1.25rem; /* 20px */
            font-weight: bold;
            color: #fff; /* Match background color */
            text-shadow: 0.125rem 0.125rem 0.25rem rgba(0, 0, 0, 0.5); /* Add shadow for better visibility */
        }
        /* Styling for logo container */
        .logo-container {
            display: flex;
            align-items: center;
            width: 26.875rem; /* 430px */
            margin-right: auto; /* Center horizontally */
            margin-left: auto; /* Center horizontally */
        }
        /* Styling for logo */
        .logo-img {
            width: 7rem; /* 112px */
            height: auto; /* Maintain aspect ratio */
            margin-right: 0.625rem; /* 10px */
            margin-top: 0.625rem; /* 10px */
        }
        /* Styling for slogan */
        .slogan {
            font-family: 'Ubuntu', sans-serif; /* Apply Ubuntu font */
            font-size: 1.5rem; /* 24px */
            color: #fff; /* Match background color */
            text-shadow: 0.0625rem 0.0625rem 0.125rem rgba(0, 0, 0, 0.5); /* Add shadow for better visibility */
        }   
        .login-container {
            background-color: #fff;
            padding: 1.875rem; /* 30px */
            border-radius: 0.5rem; /* 8px */
            box-shadow: 0px 0px 0.625rem 0px rgba(0,0,0,0.1); /* 10px */
            width: 21.875rem; /* 350px */
            margin: auto; /* Center the container horizontally */
        }


        .login-container h2 {
            text-align: center;
            margin-bottom: 1.25rem; /* 20px */
        }

        .login-container input[type="text"],
        .login-container input[type="password"],
        .login-container input[type="submit"] {
            width: 100%; /* Make all inputs fill the container width */
            padding: 0.625rem; /* 10px */
            margin-bottom: 0.625rem; /* 10px */
            border: 0.0625rem solid #ccc; /* 1px */
            border-radius: 0.3125rem; /* 5px */
            box-sizing: border-box;
        }

        .login-container input[type="submit"]{
            background-color: #45a049;
            font-weight: bold;
            color: #fff;
            cursor: pointer;
        }
        .login-container input[type="submit"]:hover {
            background-color: #182c25;
        }

        .login-container p {
            text-align: center;
            margin-top: 0.625rem; /* 10px */
        }
        .alert {
            position: fixed;
            bottom: 20px; /* Adjust as needed */
            right: 20px;
            z-index: 1000; /* Ensure it's above other content */
            padding: 15px;
            border: 1px solid transparent;
            border-radius: 4px;
            animation: slideIn 0.5s forwards, fadeOut 1s 3s forwards; /* Slide in and fade out animations */
        }
        .alert-success {
            background-color: #d4edda;
            border-color: #c3e6cb;
            color: #155724;
            animation: slideIn 0.5s forwards, fadeOut 0.5s 2.5s forwards; /* Slide in and fade out animations */
        }
        .alert-danger {
            background-color: #f2dede;
            border-color: #ebccd1;
            color: #a94442;
        }
        @keyframes slideIn {
            from {
                transform: translateY(100%);
            }
            to {
                transform: translateY(0);
            }
        }

        @keyframes fadeOut {
            from {
                opacity: 1;
            }
            to {
                opacity: 0;
            }
        }
    </style>
</head>
<body>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @elseif(session('required'))
        <div class="alert alert-danger">
            {{ session('required') }}
        </div>
    @elseif(session('wrong_credentials'))
        <div class="alert alert-danger">
            {{ session('wrong_credentials') }}
        </div>
    @endif
    <div class="row">
        <div class="col-md-6 col-sm-12 center-content">
            <div class="logo-container">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="logo-img">
                <div class="brand">FermaOnline</div>
            </div>
            <img src="{{ asset('images/farm.png') }}" alt="Farm" class="farm-img">
            <p class="slogan">Harvested with Care, Delivered with Love</p>
        </div>
        <div class="col-md-6 col-sm-12 center-content">
            <div class="login-container">
            <h2>Login</h2>
            <form action="{{route('login-post')}}" method="post" class="login-form">
                @csrf
                <input type="text" name="username" placeholder="Username" >
                <input type="password" name="password" placeholder="Password" >
                <input type="submit" value="Sign in">
            </form>
            <p>Don't have an account? <a href="{{route('signup')}}" class="signup-link">Create account</a></p>
        </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

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

    </style>
</head>
<body>
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
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="submit" value="Sign in">
        </form>
        <p>Don't have an account? <a href="{{route('signup')}}" class="signup-link">Create account</a></p>
    </div>
    </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f1f1f1;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .signup-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
            width: 300px;
        }

        .signup-container h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .signup-container input[type="text"],
        .signup-container input[type="password"],
        .signup-container input[type="email"] 
        {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .signup-container input[type="date"] {
            font-family: Arial, sans-serif;
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            /* Additional styling for the date input */
            -webkit-appearance: none; /* Remove default appearance */
            -moz-appearance: none;
            appearance: none;
            background-color: #fff;
            background-image: url('data:image/svg+xml;utf8,<svg fill="#000000" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M8 10h2v2H8zm3 0h2v2h-2zm3 0h2v2h-2zm1-8h-1V0h-2v2H8V0H6v2H5a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2h-1V0h-2v2h-2V0h-2v2zM5 20V8h14l.001 12H5z"/></svg>'); /* Add custom calendar icon */
            background-repeat: no-repeat;
            background-position: right center;
            background-size: 24px;
            padding-right: 30px; /* Ensure space for the icon */
        }


        .signup-container input[type="submit"] {
            width: 100%;
            padding: 10px;
            border: none;
            background-color: #4CAF50;
            color: white;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
        }

        .signup-container input[type="submit"]:hover {
            background-color: #45a049;
        }

        .signup-container p {
            text-align: center;
            margin-top: 10px;
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
    @if($errors->has('required'))
        <div class="alert alert-danger">
            {{ $errors->first('required') }}
        </div>
    @elseif ($errors->has('username'))
        <div class="alert alert-danger">
            {{ $errors->first('username') }}
        </div>
    @elseif ($errors->has('email'))
        <div class="alert alert-danger">
            {{ $errors->first('email') }}
        </div>
    @endif

    <div class="signup-container">
        <h2>Sign Up</h2>
        <form action="{{route('signup-post')}}" method="post">
            @csrf
            <input type="text" name="username" placeholder="Username" value="{{old('username')}}">
            <input type="email" name="email" placeholder="Email" value="{{old('email')}}">
            <input type="password" name="password" placeholder="Fjalekalim" value="{{old('password')}}">
            <input type="text" name="name" placeholder="Emri" value="{{old('name')}}">
            <input type="text" name="surname" placeholder="Mbiemri" value="{{old('surname')}}">
            <input type="text" name="phone" placeholder="Numri i telefonit" value="{{old('phone')}}">
            <input type="text" name="address" placeholder="Adresa" value="{{old('address')}}">
            <input type="date" name="dob" placeholder="Datelindja" value="{{old('dob')}}">
            <input type="submit" value="Sign Up">
        </form>
        <p>Ke llogari? <a href="{{route('login')}}">Hyr</a></p>
    </div>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>
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

        .sidebar {
            background-color: #333;
            color: #fff;
            width: 200px;
            height: 100%;
            position: fixed;
            top: 0;
            left: 0;
            padding-top: 20px;
        }

        .sidebar h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .sidebar ul {
            list-style-type: none;
            padding: 0;
        }

        .sidebar li {
            padding: 10px 0;
            text-align: center;
        }

        .sidebar a {
            text-decoration: none;
            color: #fff;
        }

        .sidebar a:hover {
            text-decoration: underline;
        }

        .profile-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
            width: 300px;
            margin-left: 220px; /* Adjust according to sidebar width */
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
    </style>
</head>
<body>
    <div class="sidebar">
        <h2>Menu</h2>
        <ul>
            <li><a href="#">Faqja kryesore</a></li>
            <li><a href="#">Profili</a></li>
            <li><a href="{{route('showChangePassword', ['guid_id' => Session::get('guid_id')])}}">Ndrysho Fjalekalimin</a></li>
            <li><a href="#" onclick="clearCartAndLogout()">Dil</a></li>
        </ul>
    </div>

    <div class="profile-container">
    <form action="{{route('changePassword', ['guid_id' => Session::get('guid_id')])}}" method="post">
            @csrf
            <input type="password" name="oldPassword" placeholder="Fjalekalimi i vjeter" required>
            <input type="password" name="newPassword" placeholder="Fjalekalimi i ri" required>
            <input type="password" name="newPasswordConfirmation" placeholder="Fjalekalimi i ri" required>
            <input type="submit" value="Ndrysho Fjalekalim">
    </form>
    </div>
    <script>
        function clearCartAndLogout() {

        sessionStorage.removeItem('cart'); 
        localStorage.removeItem('cart');  

        window.location.href = '/logout'; 
        }
    </script>
</body>
</html>

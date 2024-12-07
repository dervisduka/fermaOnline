<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company Description - FermaOnline</title>
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
            z-index: 1000;
            position: fixed;
            width: 100%;
            top: 0;
            left: 0;
        }

        .logo-img {
            width: 7rem;
            height: auto;
            margin-right: 0.625rem;
            margin-top: 0.625rem;
        }

        .spacer {
            height: 56px;
        }

        .content {
            padding-top: 56px;
            padding: 20px;
        }

        .description-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
            margin: auto;
            max-width: 800px;
        }

        .description-container h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .description-container p {
            text-align: justify;
            margin-bottom: 10px;
        }

        .description-container .btn-download-certificate {
            display: block;
            width: 100%;
            margin-top: 20px;
            text-align: center;
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
        }

        .description-container .btn-download-certificate:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #92db87; padding-top: 0; padding-bottom: 0;">
    <div class="container top-container" style="padding-top: 0;">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand d-flex align-items-center ms-auto" href="{{route('mainPage', ['guid_id' => $data['guid_id']])}}" style="color: white; height: 50%; padding-right: 0.5rem;">
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

<div class="spacer" style="margin-bottom:2rem;"></div>

<div class="content">
    <div class="description-container">
        <h2>About FermaOnline</h2>
        <p>Welcome to FermaOnline, your go-to eCommerce platform for farm-fresh products delivered straight to your doorstep. We are passionate about providing our customers with high-quality, organic, and sustainably sourced products from local farms. Our mission is to support local farmers and offer our customers the freshest produce and farm products available.</p>
        <p>At FermaOnline, we offer a wide variety of products including fresh vegetables, fruits, dairy products, meats, and artisanal goods. Our commitment to quality means that we carefully select our suppliers to ensure that you receive only the best products. Whether you are looking for fresh milk, free-range eggs, or organic vegetables, we have it all.</p>
        <p>Our easy-to-use online platform allows you to browse and purchase your favorite farm products with just a few clicks. We offer convenient delivery options to fit your schedule, so you can enjoy fresh, delicious food without the hassle. Thank you for choosing FermaOnline as your trusted source for farm-fresh products.</p>
        <p>We believe in transparency and strive to provide all the information you need to make informed choices about the food you buy. If you have any questions or need assistance, our customer service team is always here to help. Thank you for supporting local farmers and for being a part of the FermaOnline community.</p>
        <a href="{{ route('downloadCertificate', ['guid_id' => $data['guid_id']]) }}" class="btn-download-certificate">Download Certificate</a>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

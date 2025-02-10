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
        <a class="navbar-brand d-flex align-items-center ms-auto" href="{{route('mainPage', ['guid_id' => $data['guid_id']])}}" style="color: white; height: 50%; padding-right: 0.5rem;">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="logo-img" style="height: 4.5em;"> 
            <span class="ms-2" style="margin-top: 0.5em;">FermaOnline</span>
        </a>
        <div class="collapse navbar-collapse" id="navbarNav" style="padding-left: 0.5rem;">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('mainPage', ['guid_id' => $data['guid_id']])}}" style="color: white; line-height: 1; margin-right: 1rem;"><i class="fas fa-home"></i> Faqja kryesore</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('companyDescription', ['guid_id' => $data['guid_id']])}}" style="color: white; line-height: 1; margin-right: 1rem;"><i class="fas fa-info-circle"></i> Rreth</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('animal', ['guid_id' => $data['guid_id']])}}" style="color: white; line-height: 1; margin-right: 1rem;"><i class="fas fa-paw"></i> Kafshet</a>
                </li>
                <!-- Add more navigation links as needed -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: white; line-height: 1; margin-right: 1rem;">
                        <i class="fas fa-user"></i> Profili
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{ route('profile', ['guid_id' => $data['guid_id']]) }}"><i class="fas fa-address-card"></i> Te dhenat e mia</a></li>
                        <li><a class="dropdown-item" href="{{route('transaction', ['guid_id' => $data['guid_id']])}}"><i class="fas fa-chart-line"></i> Transaksionet e mia</a></li>
                        <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#walletModal"><i class="fas fa-wallet"></i> Shto Fonde</a></li>
                        <li><a class="dropdown-item" href="#" onclick="clearCartAndLogout()"><i class="fas fa-sign-out-alt"></i> Dil</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="spacer"></div>
<div class="content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                <div class="card-header bg-lightgrey text-green">
                    <h4 class="mb-0">Informacion rreth profilit</h4>
                </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="profile-info row mb-3">
                                    <label for="username" class="col-4"><strong>Username:</strong></label>
                                    <div class="col-8">
                                        <input type="text" id="username" class="form-control" value="{{$data['username']}}" readonly style="pointer-events: none;">
                                    </div>
                                </div>
                                <div class="profile-info row mb-3">
                                    <label for="email" class="col-4"><strong>Email:</strong></label>
                                    <div class="col-8">
                                        <input type="email" id="email" class="form-control" value="{{$data['email']}}" readonly style="pointer-events: none;">
                                    </div>
                                </div>
                                <div class="profile-info row mb-3">
                                    <label for="dob" class="col-4"><strong>Datelindja:</strong></label>
                                    <div class="col-8">
                                        <input type="date" id="dob" class="form-control" value="{{$data['dob']}}" readonly style="pointer-events: none;">
                                    </div>
                                </div>
                                                                <div class="profile-info row mb-3">
                                    <label for="phone" class="col-4"><strong>Numri i telefonit:</strong></label>
                                    <div class="col-8">
                                        <input type="tel" id="phone" class="form-control" value="{{$data['phoneNumber']}}" readonly style="pointer-events: none;">
                                    </div>
                                </div>
                                <div class="profile-info row mb-3">
                                    <label for="address" class="col-4"><strong>Adresa:</strong></label>
                                    <div class="col-8">
                                        <input type="text" id="address" class="form-control" value="{{$data['address']}}" readonly style="pointer-events: none;">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="profile-info row mb-3">
                                    <label for="fullname" class="col-4"><strong>Emri i plote:</strong></label>
                                    <div class="col-8">
                                        <input type="text" id="fullname" class="form-control" value="{{$data['name']}} {{$data['surname']}}" readonly style="pointer-events: none;">
                                    </div>
                                </div>
                                <div class="profile-info row mb-3">
                                    <label for="Wallet" class="col-4"><strong>Wallet</strong></label>
                                    <div class="col-8">
                                        <input type="text" id="Wallet" class="form-control" value="{{$data['balanca']}}" readonly style="pointer-events: none;">
                                    </div>
                                </div>
                            </div>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#changePasswordModal">
                                Ndrysho Fjalekalim
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="changePasswordModal" tabindex="-1" aria-labelledby="changePasswordModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="changePasswordModalLabel">Ndrysho Fjalekalimin</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form id="changePasswordForm" action="{{ route('changePassword', ['guid_id' => $data['guid_id']]) }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="oldPassword" class="form-label">Fjalekalimi i vjeter</label>
                        <input type="password" class="form-control" id="oldPassword" name="oldPassword" required>
                    </div>
                    <div class="mb-3">
                        <label for="newPassword" class="form-label">Fjalekalimi i ri</label>
                        <input type="password" class="form-control" id="newPassword" name="newPassword" required>
                    </div>
                    <div class="mb-3">
                        <label for="newPasswordConfirmation" class="form-label">Konfirmo Fjalekalimin</label>
                        <input type="password" class="form-control" id="newPasswordConfirmation" name="newPasswordConfirmation" required>
                    </div>
                    <button type="submit" class="btn btn-primary" style="float:right;">Ruaj</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="walletModal" tabindex="-1" aria-labelledby="walletModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="walletModalLabel">Wallet</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <form action="{{ route('add.to.wallet', ['guid_id' => $data['guid_id']]) }}" method="POST">
                            @csrf
                            <!-- Card Image Placeholder -->
                            <div class="mb-3 text-center">
                                <img src="{{ asset('images/Visa-Mastercard.png') }}" alt="Karta" class="img-fluid">
                            </div>
                            
                            <!-- Name & Amount -->
                            <div class="row mb-3">
                                <div class="col">
                                    <label for="fullName" class="form-label">Emer Mbiemer</label>
                                    <input type="text" class="form-control" id="fullName" placeholder="Full Name">
                                </div>
                                <div class="col">
                                    <label for="amount" class="form-label">Shuma</label>
                                    <input type="text" class="form-control" id="amount" name="amount" placeholder="Amount">
                                </div>
                            </div>
                            
                            <!-- Card Number -->
                            <div class="mb-3">
                                <label for="cardNumber" class="form-label">10 shifrat</label>
                                <input type="text" class="form-control" id="cardNumber" placeholder="Card Number">
                            </div>

                            <!-- Expiry Date & CVV -->
                            <div class="row mb-3">
                                <div class="col">
                                    <label for="expiryDate" class="form-label">Expiry Date</label>
                                    <input type="text" class="form-control" id="expiryDate" placeholder="MM/YY">
                                </div>
                                <div class="col">
                                    <label for="cvv" class="form-label">3 shifrat pas</label>
                                    <input type="text" class="form-control" id="cvv" placeholder="CVV">
                                </div>
                            </div>
                            
                            <!-- Transfer Button -->
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Transfero</button>
                            </div>
                        </form>

                        </div>
                    </div>
                </div>
            </div>




@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif



@endif
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function clearCartAndLogout() {

        sessionStorage.removeItem('cart'); 
        localStorage.removeItem('cart');  

        window.location.href = '/logout'; 
        }
    </script>
</body>
</html>

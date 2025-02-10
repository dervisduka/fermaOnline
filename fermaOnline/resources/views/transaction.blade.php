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
            padding-top: 56px;
            background-color: #F3FFF7;
        }

        .transaction-card {
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            margin-bottom: 20px;
            padding: 20px;
            transition: transform 0.3s ease-in-out;
        }

        .transaction-card:hover {
            transform: translateY(-5px);
        }

        .transaction-header {
            margin-bottom: 15px;
            border-bottom: 1px solid #f1f1f1;
            padding-bottom: 10px;
        }

        .transaction-header h5 {
            margin-bottom: 5px;
        }

        .transaction-header small {
            font-size: 0.875rem;
            color: #888;
        }

        .transaction-body {
            margin-bottom: 15px;
        }

        .transaction-body p {
            margin-bottom: 8px;
        }

        .transaction-image {
            max-width: 100%;
            max-height: 150px;
            object-fit: contain;
            border-radius: 5px;
        }

        .transaction-footer {
            text-align: right;
        }

        .transaction-footer .btn {
            background-color: #4CAF50;
            color: white;
            border-radius: 5px;
            padding: 8px 12px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .transaction-footer .btn:hover {
            background-color: #45a049;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
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
    <div class="container">
        @foreach ($data['transactions'] as $group)
            <div class="transaction-group mb-4">
                <div class="transaction-header">
                    <h3 class="text-success">Total: <strong>{{ $group['total'] }}$</strong></h3>
                    <small class="text-muted">Krijuar me: {{ $group['created_at'] }}</small>
                </div>

                <div class="transaction-body">
                    <ul class="list-unstyled">
                        @foreach ($group['transactions'] as $transaction)
                            <li class="transaction-card">
                                <div class="transaction-header">
                                    <h5>Transaction Details</h5>
                                </div>
                                
                                <div class="transaction-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p><strong>Shuma:</strong> {{ $transaction->shuma }}$</p>
                                            <p><strong>Sasia:</strong> {{ $transaction->sasia }}</p>
                                            <p><strong>Çmimi per produkt:</strong> {{ ($transaction->shuma/$transaction->sasia) }}$</p>
                                        </div>
                                        <div class="col-md-6 text-center">
                                            <img src="{{ asset($transaction->foto_path) }}" alt="Imazhi i transaksionit" class="transaction-image">
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <hr>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endforeach
    </div>
</div>



@else
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
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: white; line-height: 1; margin-right: 1rem;">
                        <i class="fas fa-clipboard-list"></i> Menaxhimi i Produkteve
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown1">
                        <li><a class="dropdown-item" href="{{route('mainPage', ['guid_id' => $data['guid_id']])}}"><i class="fas fa-business-time"></i> Menaxhimi i Stokut</a></li>
                        <li><a class="dropdown-item" href="{{route('addProducts', ['guid_id' => $data['guid_id']])}}"><i class="fas fa-plus"></i> Shto Produkte</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: white; line-height: 1; margin-right: 1rem;">
                        <i class="fas fa-store-alt"></i> Menaxhimi i Kafsheve
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown2">
                        <li><a class="dropdown-item" href="{{route('animal', ['guid_id' => $data['guid_id']])}}"><i class="fas fa-paw"></i> Faqja e Kafsheve</a></li>
                        <li><a class="dropdown-item" href="{{route('addAnimal', ['guid_id' => $data['guid_id']])}}"><i class="fas fa-plus"></i> Shto Kafshe</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('transaction', ['guid_id' => $data['guid_id']])}}" style="color: white; line-height: 1; margin-right: 1rem;"><i class="fas fa-chart-line"></i> Historiku i Transaksioneve</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"  style="color: white; line-height: 1; margin-right: 1rem;" href="{{route('logout')}}"><i class="fas fa-sign-out-alt"></i> Dil</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="spacer"></div>

<div class="content">
    <div class="container">
        @foreach ($data['transactions'] as $group)
            <div class="transaction-group mb-4">
                <div class="transaction-header">
                    <h3 class="text-success">Total: <strong>{{ $group['total'] }}$</strong></h3>
                    <small class="text-muted">Krijuar me: {{ $group['created_at'] }}</small>
                </div>

                <div class="transaction-body">
                    <ul class="list-unstyled">
                        @foreach ($group['transactions'] as $transaction)
                            <li class="transaction-card">
                                <div class="transaction-header">
                                    <h5>Detajet e transaksionit</h5>
                                </div>
                                
                                <div class="transaction-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p><strong>Shuma:</strong> {{ $transaction->shuma }}$</p>
                                            <p><strong>Sasia:</strong> {{ $transaction->sasia }}</p>
                                            <p><strong>Çmimi per produkt:</strong> {{ ($transaction->shuma/$transaction->sasia) }}$</p>
                                        </div>
                                        <div class="col-md-6 text-center">
                                            <img src="{{ asset($transaction->foto_path) }}" alt="Imazhi i transaksionit" class="transaction-image">
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <hr>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endif
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

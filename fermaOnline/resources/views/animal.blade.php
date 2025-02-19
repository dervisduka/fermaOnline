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
        .btn-custom {
            background: #28a745;
            color: #ffffff;
            border: #28a745;
            transition: background 0.3s ease-in-out, transform 0.2s;
            box-shadow: 2px 2px 6px rgba(0, 0, 0, 0.2);
        }

        .btn-custom:hover {
            background: linear-gradient(135deg, #4bbf6c, #2fa44d);
            transform: scale(1.05);
            box-shadow: 3px 3px 8px rgba(0, 0, 0, 0.3);
        }

        .card {
        width: 22rem;
        border-radius: 12px;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        transition: transform 0.2s ease-in-out;
        background: #ffffff;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .modal-content {
            border-radius: 12px;
        }

        .modal-header {
            background: linear-gradient(135deg, #4bbf6c, #2fa44d);
            color: white;
            border-top-left-radius: 12px;
            border-top-right-radius: 12px;
        }

        .modal-body img {
            border-radius: 10px;
        }

        .modal-footer {
            border-bottom-left-radius: 12px;
            border-bottom-right-radius: 12px;
        }

        .card-title {
            font-weight: bold;
            color: #333;
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
<div class="content" style="width: 95%; margin: 0 auto;">
    <div class="row row-cols-1 row-cols-md-4 g-4" style="margin-top: 0.125em;">
        @foreach($data['kafshe'] as $kafsha)
        <div class="col">
            <div class="card text-center">
                <img src="{{ asset($kafsha->foto_path) }}" class="card-img-top mx-auto d-block" alt="{{ $kafsha->emer_shkencor }}" style="height: 10em; width: 18em; margin-top:1em;">
                <div class="card-body" style="height: 6em;">
                    <h5 class="card-title">{{ $kafsha->rraca }}</h5>
                    <button type="button" class="btn btn-custom" data-bs-toggle="modal" data-bs-target="#animalModal{{ $kafsha->id }}">
                        Meso me teper
                    </button>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="animalModal{{ $kafsha->id }}" tabindex="-1" aria-labelledby="animalModalLabel{{ $kafsha->id }}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title fw-semibold" id="animalModalLabel{{ $kafsha->id }}">Informacion për Kafshën</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">
                        <h5 style="margin-bottom:1em;font-weight: bold; color:#333">Raca: {{ $kafsha->rraca }}</h5>
                        <div class="row">
                            <div class="col text-left">
                                <h6>Emri shkencor: {{ $kafsha->emer_shkencor }}</h6>
                            </div>
                            <div class="col text-right">
                                <h6>Tipi: {{ $kafsha->lloji }}</h6>
                            </div>
                        </div>
                        <img src="{{ asset($kafsha->foto_path) }}" class="img-fluid" alt="{{ $kafsha->emer_shkencor }}" style="width: 28rem; height: 18em;">
                        <p style="text-align:justify;font-size: 0.9em; margin:0.5em">{{ $kafsha->pershkrim_kafshe }}</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Mbyll</button>
                    </div>
                </div>
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
                    <a class="nav-link dropdown-toggle" href="{{route('mainPage', ['guid_id' => $data['guid_id']])}}" id="navbarDropdown1" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: white; line-height: 1; margin-right: 1rem;">
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
                        <li><a class="dropdown-item" href="{{route('animal', ['guid_id' => $data['guid_id']])}}"><i class="fas fa-paw"></i> Faqja e kafsheve</a></li>
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
<div class="content" style="width: 95%; margin: 0 auto;">
    <div class="row row-cols-1 row-cols-md-4 g-4" style="margin-top: 0.125em;">
        @foreach($data['kafshe'] as $kafsha)
        <div class="col">
            <div class="card text-center" style="width: 22rem;">
                <img src="{{ asset($kafsha->foto_path) }}" class="card-img-top mx-auto d-block" alt="{{ $kafsha->emer_shkencor }}" style="height: 10em; width: 18em; margin-top:1em;">
                <div class="card-body" style="height: 6em;">
                    <h5 class="card-title">{{ $kafsha->rraca }}</h5>
                    <button type="button" class="btn btn-custom" data-bs-toggle="modal" data-bs-target="#animalModal{{ $kafsha->id }}">
                        Meso me teper
                    </button>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="animalModal{{ $kafsha->id }}" tabindex="-1" aria-labelledby="animalModalLabel{{ $kafsha->id }}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title fw-semibold" id="animalModalLabel{{ $kafsha->id }}">Informacion për Kafshën</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">
                        <h5 style="margin-bottom:1em;font-weight: bold; color:#333">Raca: {{ $kafsha->rraca }}</h5>
                        <div class="row">
                            <div class="col text-left">
                                <h6>Emri shkencor: {{ $kafsha->emer_shkencor }}</h6>
                            </div>
                            <div class="col text-right">
                                <h6>Tipi: {{ $kafsha->lloji }}</h6>
                            </div>
                        </div>
                        <img src="{{ asset($kafsha->foto_path) }}" class="img-fluid" alt="{{ $kafsha->emer_shkencor }}" style="width: 25rem; height: 15em;">
                        <p style="text-align:justify;font-size: 0.9em; margin:0.5em">{{ $kafsha->pershkrim_kafshe }}</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Mbyll</button>
                    </div>
                </div>
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
                                <label for="cardNumber" class="form-label">12 shifrat</label>
                                <input type="text" class="form-control" id="cardNumber" placeholder="Card Number">
                            </div>

                            <!-- Expiry Date & CVV -->
                            <div class="row mb-3">
                                <div class="col">
                                    <label for="expiryDate" class="form-label">Data e Skadimit</label>
                                    <input type="text" class="form-control" id="expiryDate" placeholder="MM/YY">
                                </div>
                                <div class="col">
                                    <label for="cvv" class="form-label">CVV</label>
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



        document.addEventListener("DOMContentLoaded", function () {
        document.querySelector("form").addEventListener("submit", function (event) {
            event.preventDefault(); // 
            
            let isValid = true;

            const fullName = document.getElementById("fullName").value.trim();
            if (fullName === "") {
                alert("Emri dhe Mbiemri nuk duhet të jetë bosh!");
                isValid = false;
            }

            const amount = document.getElementById("amount").value.trim();
            if (!/^\d+(\.\d{1,2})?$/.test(amount) || parseFloat(amount) <= 0) {
                alert("Shuma duhet të jetë një numër pozitiv!");
                isValid = false;
            }

            const cardNumber = document.getElementById("cardNumber").value.trim();
            if (!/^\d{12}$/.test(cardNumber)) {
                alert("Numri i kartës duhet të përmbajë saktësisht 12 shifra!");
                isValid = false;
            }

            const expiryDate = document.getElementById("expiryDate").value.trim();
            if (!/^(0[1-9]|1[0-2])\/\d{2}$/.test(expiryDate)) {
                alert("Data e skadimit duhet të jetë në formatin MM/YY!");
                isValid = false;
            } else {
                const [month, year] = expiryDate.split("/").map(Number);
                const currentDate = new Date();
                const currentYear = currentDate.getFullYear() % 100;
                const currentMonth = currentDate.getMonth() + 1; 

                if (year < currentYear || (year === currentYear && month < currentMonth)) {
                    alert("Data e skadimit duhet të jetë në të ardhmen!");
                    isValid = false;
                }
            }

            const cvv = document.getElementById("cvv").value.trim();
            if (!/^\d{3,4}$/.test(cvv)) {
                alert("CVC duhet të përmbajë 3 ose 4 shifra!");
                isValid = false;
            }

            if (isValid) {
                this.submit();
            }
        });
    });
    </script>
</body>
</html>

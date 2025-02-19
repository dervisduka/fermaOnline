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
                    <a class="nav-link" href="{{route('mainPage', ['guid_id' => $data['guid_id']])}}" style="color: white; line-height: 1; margin-right: 1rem;"><i class="fas fa-home"></i> Faqja kryesore</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('companyDescription', ['guid_id' => $data['guid_id']])}}" style="color: white; line-height: 1; margin-right: 1rem;"><i class="fas fa-info-circle"></i> Rreth</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('animal', ['guid_id' => $data['guid_id']])}}" style="color: white; line-height: 1; margin-right: 1rem;"><i class="fas fa-paw"></i> Kafshet</a>
                </li>
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

<div class="spacer" style="margin-bottom:2rem;"></div>

<div class="content">
    <div class="description-container">
        <h2>Rreth FermaOnline</h2>
        <p>Miresevini ne FermaOnline, platformen tuaj te preferuar e-Commerce per produkte te fresketa ferme, te dorezuara direkt ne shtepine tuaj. Ne jemi te pasionuar per t'u ofruar klienteve tane produkte cilesore, organike dhe te burime te qendrueshme nga fermat lokale. Misioni ynë është të mbështesim fermerët vendas dhe t'u ofrojmë klientëve tanë produktet më të freskëta dhe produktet bujqësore në dispozicion.</p>
        <p>Në FermaOnline, ne ofrojmë një gamë të gjerë produktesh duke përfshirë perime të freskëta, fruta, produkte qumështi, mish dhe produkte artizanale. Angazhimi ynë ndaj cilësisë do të thotë që ne zgjedhim me kujdes furnizuesit tanë për të siguruar që ju të merrni vetëm produktet më të mira. Pavarësisht nëse jeni duke kërkuar qumësht të freskët, vezë me gamë të lirë ose perime organike, ne i kemi të gjitha.</p>
        <p>Platforma jonë online e lehtë për t'u përdorur ju lejon të shfletoni dhe blini produktet tuaja të preferuara të fermës me vetëm disa klikime. Ne ofrojmë opsione të përshtatshme shpërndarjeje për t'iu përshtatur orarit tuaj, në mënyrë që të mund të shijoni ushqim të freskët dhe të shijshëm. Faleminderit që zgjodhët FermaOnline si burimin tuaj të besuar për produktet e freskëta të fermës.</p>
        <p>Ne besojmë në transparencë dhe përpiqemi të ofrojmë të gjithë informacionin që ju nevojitet për të bërë zgjedhje të informuara për ushqimin që blini. Nëse keni ndonjë pyetje ose keni nevojë për ndihmë, ekipi ynë i shërbimit ndaj klientit është gjithmonë këtu për t'ju ndihmuar. Faleminderit për mbështetjen e fermerëve vendas dhe që jeni pjesë e komunitetit FermaOnline.</p>
        <a href="{{ route('downloadCertificate', ['guid_id' => $data['guid_id']]) }}" class="text-decoration-none btn-download-certificate">Shkarko Certificaten</a>
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

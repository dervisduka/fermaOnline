<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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

        .card-custom {
        height: 17.5rem;
        border-radius: 12px;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        transition: transform 0.2s ease-in-out;
        background: #ffffff;
        }

        .card-custom:hover {
            transform: translateY(-5px);
        }
        .card-title {
            font-weight: 600;
            color: #333;
        }
        .notification {
            position: fixed;
            bottom: 20px;
            right: 1em;
            padding: 10px 20px;
            border-radius: 5px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            font-size: 16px;
            z-index: 1000;
        } 
    </style>
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
                    <a class="nav-link" href="{{route('mainPage', ['guid_id' => $data['guid_id']])}}" style="color: white; line-height: 1; margin-right: 1rem;"><i class="fas fa-home"></i> Faqja Kryesore</a>
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
                        <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#basketModal"><i class="fas fa-shopping-cart"></i> Shporta </a></li>
                        <li><a class="dropdown-item" href="#" onclick="clearCartAndLogout()"><i class="fas fa-sign-out-alt"></i> Dil</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="spacer" style="margin-bottom:2rem;"></div>
<div id="alert-message-success" class="notification alert alert-success" style="display: none;">Produkti u shtua me sukses</div>
<div id="alert-message-danger" class="notification alert alert-danger" style="display: none;">Ky produkt gjendet ne shporte</div>
<div class="content" style="width: 95%; margin: 0 auto;">
    <!-- Your content goes here -->
    <div class="row">
        @foreach($data['produkte'] as $produkt)
            @if($produkt->is_active)
            <div class="col-md-4">
                <div class="card card-custom mb-4 shadow-sm h-100">
                    <img src="{{ asset($produkt->foto_path) }}" class="card-img-top mx-auto d-block product-image" alt="Imazh Produkti" 
                        style="width:11em; height:11em; margin-top:2em; object-fit: cover;">
                    <div class="card-body d-flex flex-column justify-content-between text-center" style="min-height: 200px;">
                        <h5 class="card-title">{{ $produkt->lloji_produktit }}</h5>
                        <div>
                            <span class="d-flex justify-content-center gap-5">
                                <span class="card-text">Çmimi: ${{ $produkt->cmimi }}</span>
                                <span class="card-text">Lloji: {{ $produkt->lloji }}</span>
                            </span>
                            <p class="d-none product-id">{{ $produkt->id }}</p> <!-- Hidden product ID -->
                        </div>

                        <!-- Button container with equal width -->
                        <div class="mt-3 d-flex gap-2">
                            <button type="button" class="btn btn-sm btn-outline-secondary flex-fill" data-bs-toggle="modal" 
                                data-bs-target="#productModal{{ $produkt->id }}">
                                Meso Me Shume
                            </button>
                            <button type="button" class="btn btn-sm btn-outline-secondary flex-fill add-to-cart">
                                Shto
                            </button>
                        </div>
                    </div>
                </div>
            </div>


            @endif

        <div class="modal fade" id="productModal{{ $produkt->id }}" tabindex="-1" aria-labelledby="productModalLabel{{ $produkt->id }}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="animalModalLabel{{ $produkt->id }}">Informacione per Produktin</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">
                    <h5 style="margin-bottom:1em;">Produkti: {{ $produkt->lloji_produktit }}</h5>
                    <div class="row">
                            <div class="col text-left">
                                <h6>Cmimi: {{ $produkt->cmimi }}</h6>
                            </div>
                            <div class="col text-right">
                                <h6>Kafsha Prejardhese: {{ $produkt->lloji }}</h6>
                            </div>
                        </div>
                        <img src="{{ asset($produkt->foto_path) }}" class="img-fluid" alt="{{ $produkt->emer_shkencor }}" style="width: 25rem; height: 15em;">
                        <p style="text-align:justify;font-size: 0.9em; margin:0.5em">{{ $produkt->pershkrim_produkti }}</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Mbyll</button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
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


<div class="spacer" style="margin-bottom:2rem;"></div>

<div class="content" style="width: 95%; margin: 0 auto;">
    @php $counter = 0; @endphp
    @foreach($data['produkte'] as $produkt)
        @if($counter % 3 == 0)
            <div class="row">
        @endif
        <div class="col-md-4 d-flex">
            <div class="card mb-4 shadow-sm flex-fill">
                <img src="{{ asset($produkt->foto_path) }}" class="card-img-top mx-auto d-block" alt="Imazhi i Produktit" style="width:11em; height:13em; margin-top:2em;">
                <div class="card-body d-flex flex-column">
                <h5 class="card-title text-center">{{ $produkt->lloji_produktit . '  ' . $produkt->lloji}}</h5>
                <form action="{{ route('updateProduct', ['guid_id' => $data['guid_id'], 'product_id' => $produkt->id]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="stock" class="form-label">Stoku</label>
                            <input type="number" class="form-control" id="stock" name="stock" value="{{ $produkt->sasia }}">
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Çmimi</label>
                            <input type="number" class="form-control" id="price" name="price" value="{{ $produkt->cmimi }}" step="0.01">
                        </div>
                        <!-- Add a checkbox input for is_active -->
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="is_active" name="is_active" value="1" {{ $produkt->is_active ? 'checked' : '' }}>
                            <label class="form-check-label" for="is_active">Aktiv</label>
                        </div>
                        <button type="submit" class="btn btn-primary float-end mt-auto">Ruaj</button>
                    </form>
                </div>
            </div>
        </div>
        @php $counter++; @endphp
        @if($counter % 3 == 0 || $loop->last)
            </div>
        @endif
    @endforeach
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



    <!-- Basket Modal -->
    <div class="modal fade" id="basketModal" tabindex="-1" aria-labelledby="basketModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="basketModalLabel">Shporta jote</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="basketItems">
                        <!-- Basket items will be dynamically inserted here -->
                        <p class="text-center" id="emptyBasketMessage">Shporta eshte bosh.</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Mbyll</button>
                    <button type="button" class="btn btn-primary" onclick="buyBasket()">Checkout</button>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        let cart = JSON.parse(localStorage.getItem("cart")) || [];

        function clearCartAndLogout() {

        sessionStorage.removeItem('cart'); 
        localStorage.removeItem('cart');  

        window.location.href = '/logout'; 
        }

        function saveCartToLocalStorage() {
            localStorage.setItem("cart", JSON.stringify(cart));
        }

        async function buyBasket() {
            if (cart.length === 0) {
                console.log("Empty cart");
                return;
            }

        let guid_id = @json($data['guid_id']);

        let csrfTokenElement = document.querySelector('meta[name="csrf-token"]');
        if (!csrfTokenElement) {
            console.error("CSRF token meta tag is missing.");
            return;
        }

        let csrfToken = csrfTokenElement.getAttribute("content");
        const total = cart.reduce((sum, item) => sum + (parseFloat(item.price) * item.stock), 0);

        const requestData = {
            cart: cart,
            total: total
        };
    
        try {
            const response = await fetch(`/mainPage/checkout/${guid_id}`, { // Use absolute path
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content") // Laravel CSRF token
                },
                body: JSON.stringify(requestData)
            });

            const result = await response.json();

            if (result.success) {
                alert("Checkout me sukses!");
                cart = [];
                saveCartToLocalStorage();
                $('#basketModal').modal('hide');
                const basketItems = document.getElementById('basketItems');
                let emptyBasketMessage = document.createElement('p');
                emptyBasketMessage.id = 'emptyBasketMessage';
                emptyBasketMessage.classList.add('text-center');
                emptyBasketMessage.textContent = 'Shporta eshte bosh.';
                basketItems.appendChild(emptyBasketMessage);

            } else {
                alert('Checkout deshtoi: ' + result.message);
            }
        } catch (error) {
            console.error('Gabim gjate checkout:', error);
        }
    }


document.addEventListener('DOMContentLoaded', function () {
    function addToCart(event) {
        const cardBody = event.target.closest('.card-body');

        const product = {
            id: cardBody.querySelector('.product-id').textContent,
            description: cardBody.querySelector('.card-title').textContent,
            price: cardBody.querySelector('.card-text').textContent.replace('Çmimi: $', ''),
            image: cardBody.closest('.card').querySelector('.product-image').src,
            stock: 1
        };

        const existingProduct = cart.find(item => item.id === product.id);

        if (!existingProduct) {
            cart.push(product);
            saveCartToLocalStorage();

            let alertDiv = document.getElementById("alert-message-success");
            alertDiv.style.display = "block";

            setTimeout(() => {
                alertDiv.style.display = "none";
            }, 2000);
        } else {
            let alertDiv = document.getElementById("alert-message-danger");
            alertDiv.style.display = "block";

            setTimeout(() => {
                alertDiv.style.display = "none";
            }, 2000);
        }
    }

    function updateBasketModal() {
        const basketItems = document.getElementById('basketItems');
        let emptyBasketMessage = document.getElementById('emptyBasketMessage');

        if (!basketItems) {
            return;
        }

        basketItems.innerHTML = '';

        if (cart.length === 0) {
            if (!emptyBasketMessage) {
                emptyBasketMessage = document.createElement('p');
                emptyBasketMessage.id = 'emptyBasketMessage';
                emptyBasketMessage.classList.add('text-center');
                emptyBasketMessage.textContent = 'Shporta eshte bosh.';
                basketItems.appendChild(emptyBasketMessage);
            } else {
                emptyBasketMessage.style.display = 'block';
            }
        } else {
            if (emptyBasketMessage) emptyBasketMessage.style.display = 'none';

            cart.forEach((item, index) => {
                const itemHTML = `
                    <div class="card mb-3">
                        <div class="row g-0">
                            <div class="col-md-2">
                                <img src="${item.image}" class="w-100 h-100 rounded-start" alt="${item.description}">
                            </div>
                            <div class="col-md-10">
                                <div class="card-body d-flex align-items-center">
                                    <p class="card-text col-md-3" style="margin-top: 1em">Çmimi: $${item.price}</p>
                                    <button type="button" class="btn btn-success btn-sm increase-stock col-md-1" data-index="${index}" style="opacity:0.9;">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                    <p class="col-md-2 stock-value text-nowrap" style="margin-top: 1em; margin-left:1em">Stoku: ${item.stock}</p>
                                    <button type="button" class="btn btn-warning btn-sm decrease-stock col-md-1" data-index="${index}" style="opacity:0.9;">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <p class="col-md-2 text-nowrap total-value" style="margin-top: 1em; margin-left:1em">Totali: $${(item.stock * item.price).toFixed(2)} </p>
                                    <button type="button" class="btn btn-danger btn-sm remove-from-cart col-md-1" data-index="${index}" style="margin-left:5em;opacity:0.9;">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                `;
                basketItems.innerHTML += itemHTML;
            });

            const totalPrice = cart.reduce((sum, item) => sum + (parseFloat(item.price) * item.stock), 0);

                basketItems.innerHTML += `
                <div class="text-end mt-3">
                    <h5><strong>Totali: $${totalPrice.toFixed(2)}</strong></h5>
                </div>
                `;

            document.querySelectorAll('.increase-stock').forEach(button => {
                button.addEventListener('click', function () {
                    const index = parseInt(button.getAttribute('data-index'));
                    cart[index].stock++;
                    saveCartToLocalStorage(); 
                    updateBasketModal();
                });
            });

            document.querySelectorAll('.decrease-stock').forEach(button => {
                button.addEventListener('click', function () {
                    const index = parseInt(button.getAttribute('data-index'));
                    if (cart[index].stock > 1) {
                        cart[index].stock--;
                        saveCartToLocalStorage();
                        updateBasketModal();
                    }
                });
            });

            document.querySelectorAll('.remove-from-cart').forEach(button => {
                button.addEventListener('click', function () {
                    const index = parseInt(button.getAttribute('data-index'));
                    removeFromCart(index);
                });
            });
        }
    }

    function removeFromCart(index) {
        cart.splice(index, 1);
        saveCartToLocalStorage();
        updateBasketModal();
    }

    document.querySelectorAll('.add-to-cart').forEach(button => {
        button.addEventListener('click', addToCart);
    });

    const basketButton = document.querySelector('[data-bs-target="#basketModal"]');
    if (basketButton) {
        basketButton.addEventListener('click', updateBasketModal);
    }

    const basketModal = document.getElementById('basketModal');
    if (basketModal) {
        basketModal.addEventListener('show.bs.modal', updateBasketModal);
    }
});
    </script>

</body>
</html>

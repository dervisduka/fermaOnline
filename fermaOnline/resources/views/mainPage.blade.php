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
                    <a class="nav-link" href="{{route('mainPage', ['guid_id' => $data['guid_id']])}}" style="color: white; line-height: 1; margin-right: 1rem;"><i class="fas fa-home"></i> Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('companyDescription', ['guid_id' => $data['guid_id']])}}" style="color: white; line-height: 1; margin-right: 1rem;"><i class="fas fa-info-circle"></i> About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('animal', ['guid_id' => $data['guid_id']])}}" style="color: white; line-height: 1; margin-right: 1rem;"><i class="fas fa-paw"></i> Animals</a>
                </li>
                <!-- Add more navigation links as needed -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: white; line-height: 1; margin-right: 1rem;">
                        <i class="fas fa-user"></i> Profile
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{ route('profile', ['guid_id' => $data['guid_id']]) }}"><i class="fas fa-address-card"></i> My Data</a></li>
                        <li><a class="dropdown-item" href="{{route('transaction', ['guid_id' => $data['guid_id']])}}"><i class="fas fa-chart-line"></i> My Transactions</a></li>
                        <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#walletModal"><i class="fas fa-wallet"></i> Add Funds</a></li>
                        <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#basketModal"><i class="fas fa-shopping-cart"></i> Basket  </a></li>
                        <li><a class="dropdown-item" href="{{route('logout')}}"><i class="fas fa-sign-out-alt"></i> Log Out</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="spacer" style="margin-bottom:2rem;"></div>

<div class="content">
    <!-- Your content goes here -->
    <div class="row">
        @foreach($data['produkte'] as $produkt)
            @if($produkt->is_active)
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                    <img src="{{ asset($produkt->foto_path) }}" class="card-img-top mx-auto d-block product-image" alt="Product Image" style="width:11em; height:13em; margin-top:2em;">
                    <div class="card-body">
                        <h5 class="card-title text-center">{{ $produkt->pershkrim_produkti }}</h5>
                        <p class="card-text">Price: ${{ $produkt->cmimi }}</p>
                        <p class="d-none product-id">{{ $produkt->id }}</p> <!-- Hidden product ID -->
                        <div class="d-flex justify-content-between align-items-center row">
                            <div class="col-md-10"></div>
                            <div class="btn-group col-md-2">
                                <button type="button" class="btn btn-sm btn-outline-secondary add-to-cart">Add</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
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
                        <i class="fas fa-clipboard-list"></i> Product Management
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown1">
                        <li><a class="dropdown-item" href="{{route('mainPage', ['guid_id' => $data['guid_id']])}}"><i class="fas fa-business-time"></i> Stock Management</a></li>
                        <li><a class="dropdown-item" href="{{route('addProducts', ['guid_id' => $data['guid_id']])}}"><i class="fas fa-plus"></i> Add Products</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: white; line-height: 1; margin-right: 1rem;">
                        <i class="fas fa-store-alt"></i> Animal Management
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown2">
                        <li><a class="dropdown-item" href="{{route('animal', ['guid_id' => $data['guid_id']])}}"><i class="fas fa-paw"></i>Animal View </a></li>
                        <li><a class="dropdown-item" href="{{route('addAnimal', ['guid_id' => $data['guid_id']])}}"><i class="fas fa-plus"></i> Add Animals</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('transaction', ['guid_id' => $data['guid_id']])}}" style="color: white; line-height: 1; margin-right: 1rem;"><i class="fas fa-chart-line"></i> Transactions History</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"  style="color: white; line-height: 1; margin-right: 1rem;" href="{{route('logout')}}"><i class="fas fa-sign-out-alt"></i> Log Out</a>
                </li>
            </ul>
        </div>
    </div>
</nav>


<div class="spacer" style="margin-bottom:2rem;"></div>

<div class="content">
    @php $counter = 0; @endphp
    @foreach($data['produkte'] as $produkt)
        @if($counter % 3 == 0)
            <div class="row">
        @endif
        <div class="col-md-4">
            <div class="card mb-4 shadow-sm">
                <img src="{{ asset($produkt->foto_path) }}" class="card-img-top mx-auto d-block" alt="Product Image" style="width:11em; height:13em; margin-top:2em;">
                <div class="card-body">
                    <h5 class="card-title text-center">{{ $produkt->pershkrim_produkti }}</h5>
                    <form action="{{ route('updateProduct', ['guid_id' => $data['guid_id'], 'product_id' => $produkt->id]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="stock" class="form-label">Stock</label>
                            <input type="number" class="form-control" id="stock" name="stock" value="{{ $produkt->sasia }}">
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Price</label>
                            <input type="number" class="form-control" id="price" name="price" value="{{ $produkt->cmimi }}" step="0.01">
                        </div>
                        <!-- Add a checkbox input for is_active -->
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="is_active" name="is_active" value="1" {{ $produkt->is_active ? 'checked' : '' }}>
                            <label class="form-check-label" for="is_active">Is Active</label>
                        </div>
                        <button type="submit" class="btn btn-primary float-end">Save</button>
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
                                <img src="{{ asset('images/Visa-Mastercard.png') }}" alt="Card Placeholder" class="img-fluid">
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
                    <h5 class="modal-title" id="basketModalLabel">Your Basket</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="basketItems">
                        <!-- Basket items will be dynamically inserted here -->
                        <p class="text-center" id="emptyBasketMessage">Your basket is empty.</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Checkout</button>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            let cart = [];

            function addToCart(event) {
                const cardBody = event.target.closest('.card-body');

                const product = {
                    id: cardBody.querySelector('.product-id').textContent,
                    description: cardBody.querySelector('.card-title').textContent,
                    price: cardBody.querySelector('.card-text').textContent.replace('Price: $', ''),
                    image: cardBody.closest('.card').querySelector('.product-image').src,
                    stock: 1
                };

                const existingProduct = cart.find(item => item.id === product.id);

                if (!existingProduct) {
                    cart.push(product);
                }


                updateBasketModal();
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
                        emptyBasketMessage.textContent = 'Your basket is empty.';
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
                                        <img src="${item.image}" class="img-fluid rounded-start" alt="${item.description}" style="max-width: 100px;">
                                    </div>
                                    <div class="col-md-10">
                                        <div class="card-body row">
                                            <p class="card-text col-md-3" style="margin-top: 1em">Price: $${item.price}</p>
                                            <button type="button" class="btn btn-success btn-sm col-md-2 increase-stock" data-index="${index}">
                                                <i class="fas fa-plus"></i>
                                            </button>
                                            <p class="col-md-2 stock-value" style="margin-top: 1em">Stock: ${item.stock}</p>
                                            <button type="button" class="btn btn-warning btn-sm col-md-2 decrease-stock" data-index="${index}">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                            <div class="col-md-1"></div>
                                            <button type="button" class="btn btn-danger btn-sm remove-from-cart col-md-2" data-index="${index}">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        `;
                        basketItems.innerHTML += itemHTML;
                    });

                    document.querySelectorAll('.increase-stock').forEach(button => {
                        button.addEventListener('click', function () {
                            const index = parseInt(button.getAttribute('data-index'));
                            cart[index].stock++;
                            updateBasketModal();
                        });
                    });

                    document.querySelectorAll('.decrease-stock').forEach(button => {
                        button.addEventListener('click', function () {
                            const index = parseInt(button.getAttribute('data-index'));
                            if (cart[index].stock > 1) {
                                cart[index].stock--;
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

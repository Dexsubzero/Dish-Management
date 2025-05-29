<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>
    <link href="{{ asset('img/faresync.png') }}" rel="icon">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <script src="https://kit.fontawesome.com/20c0360bf5.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/cart.css') }}">
    <link rel="stylesheet" href="{{ asset('css/checkout.css') }}">
</head>

<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom mb-4">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ route('dashboard.home') }}">
                <i class="fas fa-utensils me-2"></i>{{ config('app.name') }}
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard.home') }}"><i class="fas fa-home me-1"></i>
                            Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('directory.menu') }}"><i class="fas fa-store me-1"></i>
                            Menu</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')


    <!-- Footer -->
    <footer class="bg-dark text-white py-4 mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4 mb-md-0">
                    <h5 class="mb-3">{{ config('app.name') }}</h5>
                    <p class="small text-white">Your one-stop shop for all things orange and stylish.</p>
                    <div class="social-icons mt-3">
                        <a href="#" class="text-white me-2"><i class="fa fa-facebook"></i></a>
                        <a href="#" class="text-white me-2"><i class="fa fa-twitter"></i></a>
                        <a href="#" class="text-white me-2"><i class="fa fa-instagram"></i></a>
                        <a href="#" class="text-white"><i class="fa fa-pinterest"></i></a>
                    </div>
                </div>
                <div class="col-md-2 mb-4 mb-md-0">
                    <h6 class="mb-3">Customer Service</h6>
                    <ul class="list-unstyled small">
                        <li class="mb-2"><a href="{{ route('directory.contacts') }}" class="text-white">Contact Us</a>
                        </li>
                        <li class="mb-2"><a href="{{ route('directory.services') }}" class="text-white">Services</a>
                        </li>
                        <li class="mb-2"><a href="{{ route('directory.about') }}" class="text-white">Abouts</a></li>
                        <li class="mb-2"><a href="{{ route('directory.menu') }}" class="text-white">Menus</a></li>
                    </ul>
                </div>
                <div class="col-md-2 mb-4 mb-md-0 ms-auto text-end">
                    <h6 class="mb-3">{{ config('app.name') }}</h6>
                    <p class="text-white" style="font-size: 12px;">Faresync is a digital platform or service that facilitates the real-time
                        synchronization of food-related data—such as menus, pricing, availability, and delivery
                        options—across various components of an eCommerce website.</p>
                </div>
                <div class="col-md-2 mb-4 mb-md-0 ms-auto text-end">
                    <img src="{{ asset('img/logo-no-bg.png') }}" alt="FareSync Logo" class="img-fluid mb-3"
                        style="max-width: 100px;">
                </div>
                <hr class="my-4 bg-secondary">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start">
                        <p class="small text-white mb-0">© 2025 FareSync. All rights reserved.</p>
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        <p class="small text-muted mb-0">
                            <a href="#" class="text-white me-3">Privacy Policy</a>
                            <a href="#" class="text-white">Terms of Service</a>
                        </p>
                    </div>
                </div>
            </div>
    </footer>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/20c0360bf5.js" crossorigin="anonymous"></script>
    <script src="{{ asset('js/cart.js') }}"></script>
</body>

</html>

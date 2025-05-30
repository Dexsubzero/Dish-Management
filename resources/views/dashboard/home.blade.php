@extends('dashboard.layout')

@section('content')
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner"
            class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Navbar & Hero Start -->
        <div class="container-xxl position-relative p-0">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 px-lg-5 py-3 py-lg-0"
                style="border-bottom: 2px solid white;">
                <a href="{{ route('dashboard.home') }}" class="navbar-brand p-0">
                    <h1 class="text-primary m-0"><i class="fas fa-utensils"></i>{{ config('app.name') }}</h1>
                    <!-- <img src="img/logo.png" alt="Logo"> -->
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto py-0 pe-4">
                        <a href="{{ route('dashboard.home') }}" class="nav-item nav-link active">Home</a>
                        <a href="{{ route('directory.services') }}" class="nav-item nav-link">Service</a>
                        <a href="{{ route('directory.menu') }}" class="nav-item nav-link">Menu</a>
                        <a href="{{ route('directory.about') }}" class="nav-item nav-link">About</a>
                        <a href="{{ route('directory.contacts') }}" class="nav-item nav-link">Contact</a>
                    </div>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class="btn btn-danger mt-3" type="submit">Logout</button>
                    </form>
                </div>
            </nav>

            <div class="container-xxl py-5 bg-dark hero-header mb-5">
                <div class="container my-5 py-5">
                    <div class="row align-items-center g-5">
                        <div class="col-lg-6 text-center text-lg-start">
                            <h1 class="display-3 text-white animated slideInLeft">"FareSync – Where Flavors Connect!"
                            </h1>
                            <p class="text-white animated slideInLeft mb-4 pb-2"></p>
                            <a href="{{ route('directory.cart') }}"
                                class="btn btn-primary py-sm-3 px-sm-5 me-3 animated slideInLeft"><i
                                    class="fas fa-cart-plus"></i> Cart</a>
                        </div>
                        <div class="col-lg-6 text-center text-lg-end overflow-hidden">
                            <img class="img-fluid" src="{{ asset('img/hero.png') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Navbar & Hero End -->

        <style>
            :root {
                --primary-orange: #FF6B00;
                --light-orange: #FFE8D9;
                --dark-orange: #E05D00;
            }

            body {
                background-color: #f8f9fa;
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            }

            .navbar {
                background-color: white;
                box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            }

            .navbar-brand {
                font-weight: 700;
                color: var(--primary-orange) !important;
            }

            .nav-link {
                color: #555 !important;
                font-weight: 500;
            }

            .nav-link:hover,
            .nav-link.active {
                color: var(--primary-orange) !important;
            }

            .btn-orange {
                background-color: var(--primary-orange);
                color: white;
                border: none;
            }

            .btn-orange:hover {
                background-color: var(--dark-orange);
                color: white;
            }

            .btn-outline-orange {
                border-color: var(--primary-orange);
                color: var(--primary-orange);
            }

            .btn-outline-orange:hover {
                background-color: var(--primary-orange);
                color: white;
            }

            .purchase-card {
                border-radius: 10px;
                border-left: 4px solid var(--primary-orange);
                transition: transform 0.3s ease;
            }

            .purchase-card:hover {
                transform: translateY(-5px);
                box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            }

            .order-status {
                padding: 5px 15px;
                border-radius: 20px;
                font-weight: 600;
                font-size: 0.8rem;
            }

            .status-delivered {
                background-color: #E8F5E9;
                color: #2E7D32;
            }

            .status-shipped {
                background-color: #E3F2FD;
                color: #1565C0;
            }

            .status-processing {
                background-color: #FFF3E0;
                color: #EF6C00;
            }

            .status-cancelled {
                background-color: #FFEBEE;
                color: #C62828;
            }

            .purchase-header {
                border-bottom: 1px solid #eee;
                padding-bottom: 15px;
                margin-bottom: 20px;
            }

            .product-img {
                width: 80px;
                height: 80px;
                object-fit: cover;
                border-radius: 8px;
            }

            .tracking-steps .step {
                position: relative;
                padding-left: 30px;
                margin-bottom: 20px;
            }

            .tracking-steps .step:before {
                content: '';
                position: absolute;
                left: 0;
                top: 0;
                width: 20px;
                height: 20px;
                border-radius: 50%;
                background-color: #ddd;
                border: 3px solid white;
            }

            .tracking-steps .step.active:before {
                background-color: var(--primary-orange);
            }

            .tracking-steps .step.completed:before {
                background-color: var(--primary-orange);
            }

            .tracking-steps .step:after {
                content: '';
                position: absolute;
                left: 9px;
                top: 20px;
                width: 2px;
                height: 100%;
                background-color: #ddd;
            }

            .tracking-steps .step:last-child:after {
                display: none;
            }

            .tracking-steps .step.completed:after {
                background-color: var(--primary-orange);
            }

            .sidebar-link {
                display: block;
                padding: 10px 15px;
                color: #555;
                text-decoration: none;
                border-radius: 5px;
                margin-bottom: 5px;
            }

            .sidebar-link:hover,
            .sidebar-link.active {
                background-color: var(--light-orange);
                color: var(--primary-orange);
                font-weight: 500;
            }

            .sidebar-link i {
                margin-right: 10px;
                width: 20px;
                text-align: center;
            }

            @media (max-width: 768px) {
                .product-img {
                    width: 60px;
                    height: 60px;
                }

                .order-details {
                    margin-top: 20px;
                }
            }
        </style>

        <div class="container mb-5">
            <div class="row">
                <!-- Main Content -->
                <div class="col-lg-12">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <div class="purchase-header">
                                <h4 class="mb-0">My Purchases</h4>
                                <p class="text-muted mb-0">View and manage your orders</p>
                            </div>

                            <!-- Order List -->
                            <div class="mb-4">
                                <div class="card purchase-card mb-3">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-md-3">
                                                <p class="mb-1 text-muted small">Order # 0010</p>
                                                <p class="mb-0 fw-bold">Calamari</p>
                                            </div>
                                            <div class="col-md-3">
                                                <p class="mb-1 text-muted small">Total</p>
                                                <p class="mb-0 fw-bold">₱89.98</p>
                                            </div>
                                            <div class="col-md-3">
                                                <p class="mb-1 text-muted small">Status</p>
                                                <span class="order-status status-delivered">Delivered</span>
                                            </div>
                                            <div class="col-md-3 text-md-end">
                                                <button class="btn btn-sm btn-outline-orange">View Details</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Order Details Modal (example for one order) -->
                    <div class="modal fade" id="orderDetailsModal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Order # 0010</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row mb-4">
                                        <div class="col-md-6">
                                            <h6>Order Summary</h6>
                                            <p class="mb-1"><strong>Order Date:</strong> May 15, 2023</p>
                                            <p class="mb-1"><strong>Status:</strong> <span
                                                    class="order-status status-delivered">Delivered</span></p>
                                            <p class="mb-1"><strong>Total Amount:</strong> ₱89.98</p>
                                        </div>
                                        <div class="col-md-6">
                                            <h6>Delivery Address</h6>
                                            <p class="mb-1">John Doe</p>
                                            <p class="mb-1">123 Main Street Hilongos, Leyte</p>
                                            <p class="mb-1">johndoe@fake.com</p>
                                            <p class="mb-1">Phone: (123) 456-7890</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            // Example JavaScript to open the modal (would be triggered when clicking "View Details")
            document.addEventListener('DOMContentLoaded', function() {
                // This would be connected to your actual "View Details" buttons
                var viewDetailsButtons = document.querySelectorAll('.btn-outline-orange');

                viewDetailsButtons.forEach(function(button) {
                    button.addEventListener('click', function() {
                        var modal = new bootstrap.Modal(document.getElementById('orderDetailsModal'));
                        modal.show();
                    });
                });
            });
        </script>


        @include('dashboard.footer')

@extends('partial-layouts.cart-layout')
@section('content')
    <!-- Main Content -->
    <div class="container mb-5">
        <div class="row">
            <!-- Checkout Form -->
            <div class="col-lg-8">
                <div class="card checkout-card mb-4">
                    <div class="card-header checkout-card-header py-3">
                        <h5 class="mb-0">Shipping Information</h5>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="firstName" class="form-label">First name</label>
                                    <input type="text" class="form-control" id="firstName" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="lastName" class="form-label">Last name</label>
                                    <input type="text" class="form-control" id="lastName" required>
                                </div>
                                <div class="col-12">
                                    <label for="address" class="form-label">Hilongos Address</label>
                                    <input type="text" class="form-control" id="address" placeholder="Brgy./Sitio./St." required>
                                </div>
                                <div class="col-12">
                                    <label for="email" class="form-label">Email </label>
                                    <input type="email" class="form-control" id="email" placeholder="johndoe@gmail.com" required>
                                </div>
                                <div class="col-12">
                                    <label for="phone" class="form-label">Phone Number </label>
                                    <input type="number" class="form-control" id="phone" placeholder="+639877650233" required>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Order Summary -->
            <div class="col-lg-4 order-summary">
                <div class="card checkout-card mb-4">
                    <div class="card-header checkout-card-header py-3">
                        <h5 class="mb-0">Your Order</h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-group mb-3">
                            <li class="list-group-item d-flex justify-content-between lh-sm">
                                <div>
                                    <h6 class="my-0">Calamari</h6>
                                </div>
                                <span class="text-muted">$200.00</span>
                            </li>


                            <li class="list-group-item d-flex justify-content-between">
                                <span>Subtotal</span>
                                <strong>$200.00</strong>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <span>discount</span>
                                <strong>$10.00</strong>
                            </li>
                            <li class="list-group-item d-flex justify-content-between summary-total">
                                <span>Total (USD)</span>
                                <strong>$190.00</strong>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="d-grid gap-2">
                    <button class="btn btn-orange btn-lg" type="button">Complete Purchase</button>
                    <a href="{{ route('directory.menu') }}" class="btn btn-outline-orange btn-lg">Continue Shopping</a>
                </div>

            </div>
        </div>
    </div>
@endsection

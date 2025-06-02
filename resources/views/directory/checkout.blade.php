@extends('partial-layouts.cart-layout')

@section('content')
    <!-- Main Content -->
    <div class="container mb-5">
        <form action="{{ route('checkout.store') }}" method="POST">
            @csrf

            <div class="row">
                <!-- Shipping Info -->
                <div class="col-lg-8">
                    <div class="card checkout-card mb-4">
                        <div class="card-header checkout-card-header py-3">
                            <h5 class="mb-0">Shipping Information</h5>
                        </div>
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-12">
                                    <label for="fullname" class="form-label">Full name</label>
                                    <input type="text" class="form-control" id="fullname" name="name" placeholder="John Doe" required>
                                </div>
                                <div class="col-12">
                                    <label for="address" class="form-label">Hilongos Address</label>
                                    <input type="text" class="form-control" id="address" name="address" placeholder="Brgy./Sitio./St." required>
                                </div>
                                <div class="col-12">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="johndoe@gmail.com" required>
                                </div>
                                <div class="col-12">
                                    <label for="phone" class="form-label">Phone Number</label>
                                    <input type="number" class="form-control" id="phone" name="phone" placeholder="+639087654321" required>
                                </div>
                            </div>
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
                                @foreach ($cart as $item)
                                    <li class="list-group-item d-flex justify-content-between lh-sm">
                                        <div class="d-flex align-items-center">
                                            <img src="{{ asset('storage/' . $item['image']) }}" alt="{{ $item['name'] }}"
                                                class="img-fluid rounded me-3"
                                                style="width: 80px; height: 80px; object-fit: cover;">
                                            <div>
                                                <h6 class="mb-1">{{ $item['name'] }}</h6>
                                                <small class="text-muted">x{{ $item['quantity'] }}</small>
                                            </div>
                                        </div>
                                        <strong>₱{{ number_format($item['price'] * $item['quantity'], 2) }}</strong>
                                    </li>
                                @endforeach
                                <li class="list-group-item d-flex justify-content-between summary-total">
                                    <span>Subtotal:</span>
                                    <strong>₱{{ number_format($subtotal, 2) }}</strong>
                                </li>
                                <li class="list-group-item d-flex justify-content-between summary-total">
                                    <span>Discount:</span>
                                    <strong>-₱{{ number_format($discount, 2) }}</strong>
                                </li>
                                <li class="list-group-item d-flex justify-content-between summary-total">
                                    <span>Total:</span>
                                    <strong>₱{{ number_format($total, 2) }}</strong>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Hidden Inputs -->
                <input type="hidden" name="subtotal" value="{{ $subtotal }}">
                <input type="hidden" name="discount" value="{{ $discount }}">
                <input type="hidden" name="total" value="{{ $total }}">
                <input type="hidden" name="items" value="{{ json_encode($cart) }}">

                <!-- Buttons -->
                <div class="d-grid gap-2 mt-3">
                    <button class="btn btn-orange btn-lg" type="submit">Complete Purchase</button>
                    <a href="{{ route('directory.menu') }}" class="btn btn-outline-orange btn-lg">Continue Shopping</a>
                </div>
            </div>
        </form>
    </div>
@endsection

@extends('partial-layouts.cart-layout')
@section('content')
    <div class="container mb-5">
        <div class="row">
            <div class="col-12">
                <h2 class="mb-4"><i class="fas fa-shopping-cart me-2"></i> Your Shopping Cart</h2>
            </div>
        </div>

        <div class="row">
            <!-- Cart Items Column -->
            <div class="col-lg-8">
                <!-- Cart Header -->
                <div class="cart-header p-3 mb-3 d-none d-md-flex">
                    <div class="row align-items-center">
                        <div class="col-md-5">
                            <span class="fw-bold">PRODUCT</span>
                        </div>
                        <div class="col-md-2 text-center">
                            <span class="fw-bold">PRICE</span>
                        </div>
                        <div class="col-md-3 text-center">
                            <span class="fw-bold">QUANTITY</span>
                        </div>
                        <div class="col-md-2 text-center">
                            <span class="fw-bold">TOTAL</span>
                        </div>
                    </div>
                </div>

                <!-- Cart Items -->
                <div class="cart-items">
                    <!-- Item 1 -->
                    @foreach ($cart as $id => $item)
                        <div class="cart-item p-3 mb-3" data-id="{{ $id }}" data-price="{{ $item['price'] }}">
                            <div class="row align-items-center">
                                <div class="col-3 col-md-1">
                                    <img src="{{ asset('storage/' . $item['image']) }}" alt="Product"
                                        class="product-img img-fluid">
                                </div>
                                <div class="col-9 col-md-4">
                                    <h6 class="mb-1">{{ $item['name'] }}</h6>
                                    <!-- Modified remove button with data-id -->
                                    <button class="btn btn-sm btn-outline-danger p-1 remove-btn"
                                        data-id="{{ $id }}">
                                        <i class="fas fa-trash-alt me-1"></i> Remove
                                    </button>
                                </div>
                                <div class="col-6 col-md-2 text-md-center mt-3 mt-md-0">
                                    <span>₱{{ number_format($item['price'], 2) }}</span>
                                </div>
                                <div class="col-6 col-md-3 mt-3 mt-md-0">
                                    <div class="d-flex align-items-center justify-content-center">
                                        <button class="quantity-btn minus"><i class="fas fa-minus"></i></button>
                                        <input type="number" class="quantity-input mx-2" value="{{ $item['quantity'] }}"
                                            min="1">
                                        <button class="quantity-btn plus"><i class="fas fa-plus"></i></button>
                                    </div>
                                </div>
                                <div class="col-12 col-md-2 text-md-center mt-3 mt-md-0">
                                    <span
                                        class="item-total fw-bold">₱{{ number_format($item['price'] * $item['quantity'], 2) }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>

                <!-- Continue Shopping & Update Cart Buttons -->
                <div class="row mt-4">
                    <div class="col-md-6 mb-3 mb-md-0">
                        <a href="{{ route('directory.menu') }}" class="btn btn-outline-orange">
                            <i class="fas fa-arrow-left me-2"></i> Continue Shopping
                        </a>
                    </div>
                </div>
            </div>

            <!-- Order Summary Column -->
            <div class="col-lg-4 mt-4 mt-lg-0">
                <div class="summary-card p-4">
                    <div class="summary-header pb-3 mb-3">
                        <h5 class="mb-0"><i class="fas fa-receipt me-2"></i> Order Summary</h5>
                    </div>
                    @php
                        $discount = 10.0; // Example discount
                        $value = $total - $discount;
                    @endphp

                    <div class="mb-3">
                        <div class="d-flex justify-content-between mb-2">
                            <span>Subtotal</span>
                            <span id="subtotal">₱{{ number_format($total, 2) }}</span>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span>Discount</span>
                            <span>₱{{ number_format($discount, 2) }}</span>
                        </div>
                        <div class="d-flex justify-content-between mt-3 pt-3 border-top">
                            <span class="fw-bold">Total</span>
                            <span class="fw-bold" id="total">₱{{ number_format($total - $discount, 2) }}</span>
                        </div>
                    </div>

                    <form id="checkoutForm" method="POST" action="{{ route('directory.checkout') }}">
                        @csrf
                        @foreach ($cart as $id => $item)
                            <input type="hidden" name="items[{{ $id }}][quantity]"
                                class="quantity-input-hidden-{{ $id }}" value="{{ $item['quantity'] }}">
                        @endforeach

                        <button type="submit" class="btn btn-orange w-100 py-2">
                            <i class="fas fa-lock me-2"></i> Proceed to Checkout
                        </button>
                    </form>
                    <div class="mt-3 text-center">
                        <p class="small text-muted mb-1">We accept:</p>
                        <i class="fa fa-truck"></i>
                        <p class="small text-muted mb-0">Cash on delivery only</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

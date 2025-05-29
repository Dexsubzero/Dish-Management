@extends('dashboard.layout')
@section('content')
    @include('partial.nav-menu')
    <!-- Menu Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h5 class="section-title ff-secondary text-center text-primary fw-normal">Food Menu</h5>
            <h1>FareSync Menu</h1>
        </div>

        <div class="row justify-content-center">
            @foreach ($dishes as $dish)
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                <div class="product h-100 shadow-sm rounded overflow-hidden">
                    <a href="{{ route('dishes.show', $dish->id) }}" class="img-prod d-block">
                        <img class="img-fluid w-100" src="{{ asset('storage/' . $dish->image) }}" alt="{{ $dish->name }}" style="height: 200px; object-fit: cover;">
                        <div class="overlay"></div>
                    </a>
                    <div class="text-center p-3 bg-dark text-white">
                        <h5 class="mb-1" style="color: white;">{{ $dish->name }}</h5>
                        <p class="mb-1 text-warning">₱{{ number_format($dish->price, 2) }}</p>
                        <p class="small mb-2">{{ Str::limit($dish->description, 50) }}</p>
                        <a href="#" class="btn btn-primary btn-sm">Add to Cart</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
    <!-- Menu End -->
    @include('dashboard.footer')
@endsection

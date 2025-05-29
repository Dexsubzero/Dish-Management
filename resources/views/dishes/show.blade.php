@extends('crud-layout.layout')
@section('content')

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow" style="border: 1px solid #ff7f50;">
                <div class="card-header text-white" style="background-color: #ff7f50;">
                    <h4 class="mb-0">Dish Details</h4>
                </div>
                <div class="card-body">

                    <div class="mb-3">
                        <h5 class="card-title text-dark">Name:</h5>
                        <p class="card-text">{{ $dish->name }}</p>
                    </div>

                    <div class="mb-3">
                        <h5 class="card-title text-dark">Image:</h5>
                        @if($dish->image)
                            <img src="{{ asset('storage/' . $dish->image) }}" alt="{{ $dish->name }}" class="img-fluid rounded shadow" style="max-height: 250px; border: 1px solid #ccc;">
                        @else
                            <p>No image available.</p>
                        @endif
                    </div>

                    <div class="mb-3">
                        <h5 class="card-title text-dark">Price:</h5>
                        <p class="card-text">₱{{ number_format($dish->price, 2) }}</p>
                    </div>

                    <div class="mb-3">
                        <h5 class="card-title text-dark">Description:</h5>
                        <p class="card-text">{{ $dish->description }}</p>
                    </div>

                    <a href="{{ route('dishes.index') }}" class="btn text-white mt-2" style="background-color: #ff7f50;">
                        <i class="fa fa-arrow-left"></i> Back to List
                    </a>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection

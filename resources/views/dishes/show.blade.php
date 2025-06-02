@extends('crud-layout.layout')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">

            {{-- Dish Card --}}
            <div class="card shadow" style="border: 1px solid #ff7f50;">
                <div class="card-header text-white" style="background-color: #ff7f50;">
                    <h4 class="mb-0">Dish Details</h4>
                </div>

                <div class="card-body">

                    {{-- Dish Name --}}
                    <div class="mb-3">
                        <h5 class="card-title text-dark">Name:</h5>
                        <p class="card-text">{{ $dish->name }}</p>
                    </div>

                    {{-- Dish Image --}}
                    <div class="mb-3">
                        <h5 class="card-title text-dark">Image:</h5>

                        @if ($dish->image)
                            <div>
                                <img src="{{ asset('storage/' . $dish->image) }}"
                                     alt="{{ $dish->name }}"
                                     class="img-fluid rounded shadow mb-2"
                                     style="max-height: 250px; border: 1px solid #ccc;" />

                                {{-- Download and Print Buttons --}}
                                <div class="d-flex gap-2">
                                    <a href="{{ asset('storage/' . $dish->image) }}"
                                       download
                                       class="btn btn-sm btn-outline-primary">
                                        📥 Download Image
                                    </a>

                                    <button onclick="printImage('{{ asset('storage/' . $dish->image) }}')"
                                            class="btn btn-sm btn-outline-secondary">
                                        🖨️ Print Image
                                    </button>
                                </div>
                            </div>
                        @else
                            <p>No image available.</p>
                        @endif
                    </div>

                    {{-- Dish Price --}}
                    <div class="mb-3">
                        <h5 class="card-title text-dark">Price:</h5>
                        <p class="card-text">₱{{ number_format($dish->price, 2) }}</p>
                    </div>

                    {{-- Dish Description --}}
                    <div class="mb-3">
                        <h5 class="card-title text-dark">Description:</h5>
                        <p class="card-text">{{ $dish->description }}</p>
                    </div>

                    {{-- Back Button --}}
                    <a href="{{ route('dishes.index') }}"
                       class="btn text-white mt-2"
                       style="background-color: #ff7f50;">
                        <i class="fa fa-arrow-left"></i> Back to List
                    </a>

                </div>
            </div>
        </div>
    </div>
</div>

{{-- Print Image Script --}}
<script>
    function printImage(url) {
        const printWindow = window.open('', '_blank');
        printWindow.document.write(`
            <html>
                <head><title>Print Image</title></head>
                <body style="text-align: center;">
                    <img src="${url}" onload="window.print();window.close();" style="max-width: 100%;" />
                </body>
            </html>
        `);
        printWindow.document.close();
    }
</script>
@endsection

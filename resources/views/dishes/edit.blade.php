@extends('crud-layout.layout')
@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow" style="border: 1px solid #ff7f50;">
                    <div class="card-header text-white" style="background-color: #ff7f50;">
                        <h4 class="mb-0">Edit Dish</h4>
                    </div>
                    <div class="card-body">

                        <form action="{{ route('dishes.update', $dish->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')

                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" name="name" id="name" value="{{ $dish->name }}"
                                    class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="image" class="form-label">Image</label>
                                <input type="file" name="image" id="image" class="form-control">
                                @if ($dish->image)
                                    <div class="mt-2">
                                        <img src="{{ asset('storage/' . $dish->image) }}" width="80" height="80"
                                            style="object-fit: cover; border: 1px solid #ddd;" alt="Current Image">
                                    </div>
                                @endif
                            </div>

                            <div class="mb-3">
                                <label for="price" class="form-label">Price</label>
                                <input type="number" name="price" id="price" value="{{ $dish->price }}"
                                    class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <input type="text" name="description" id="description" value="{{ $dish->description }}"
                                    class="form-control" required>
                            </div>

                            <button type="submit" class="btn text-white" style="background-color: #ff7f50;">
                                <i class="fa fa-save"></i> Update
                            </button>
                        </form>

                        <div class="mt-2">
                            <div class="text-start">
                                <a href="{{ route('dishes.index') }}" class="btn btn-sm text-decoration-none"
                                    style="background-color: #ff7f50; color: white;">Go Back to list</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

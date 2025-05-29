@extends('crud-layout.layout')
@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="card shadow" style="border: 1px solid #ff7f50;">
                    <div class="card-header text-white" style="background-color: #ff7f50;">
                        <h2 class="mb-0">Dish Management System</h2>
                    </div>
                    <div class="card-body">
                        <a href="{{ route('dishes.create') }}" class="btn btn-sm text-white mb-3"
                            style="background-color: #ff7f50;">
                            <i class="fa fa-plus"></i> Add New
                        </a>

                        <div class="table-responsive">
                            <table class="table table-bordered table-striped text-center align-middle">
                                <thead class="text-white" style="background-color: #ffa07a;">
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Image</th>
                                        <th>Price</th>
                                        <th>Description</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($dishes as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td><img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }}"
                                                    width="60" height="60" style="object-fit: cover;"></td>
                                            <td>₱{{ number_format($item->price, 2) }}</td>
                                            <td style="max-width: 200px;">{{ Str::limit($item->description, 50) }}</td>
                                            <td>
                                                <a href="{{ route('dishes.show', $item->id) }}"
                                                    class="btn btn-info btn-sm mb-1" title="View Dish">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                                <a href="{{ route('dishes.edit', $item->id) }}"
                                                    class="btn btn-primary btn-sm mb-1" title="Edit Dish">
                                                    <i class="fa fa-pencil-square"></i>
                                                </a>
                                                <form method="POST" action="{{ route('dishes.destroy', $item->id) }}"
                                                    style="padding-bottom: 3px;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" title="Delete Dish"
                                                        onclick="return confirm('Confirm delete?')">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="mt-2">
                                <div class="text-start">
                                    <a href="{{ route('adminmanager.mgr-dashboard') }}"
                                        class="btn btn-sm text-decoration-none"
                                        style="background-color: #ff7f50; color: white;">Go Back</a>
                                </div>
                            </div>
                        </div>

                    @if ($dishes->isEmpty())
                        <div class="alert alert-warning text-center mt-4">
                            No dishes found. Click "Add New" to create one.
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

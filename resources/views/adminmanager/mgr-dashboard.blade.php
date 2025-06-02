    @extends('adminmanager.layout')

    @section('content')
        @include('adminmanager.mgr-sidebar')
        <!-- Main Content -->
        <div id="main-content" class="main-content container-fluid p-4" style="flex: 1;">
            <!-- Header -->
            <div class="header d-flex justify-content-between align-items-center">
                <div>
                    <button class="btn btn-sm d-lg-none" id="sidebarToggle">
                        <i class="fas fa-bars"></i>
                    </button>
                    <h4 class="mb-0">Welcome back, {{ Auth::user()->name }}!</h4>
                </div>
                <div class="d-flex align-items-center">
                    <div class="user-profile d-flex align-items-center">
                        <h6>{{ Auth::user()->name }}</h6>
                    </div>
                </div>
            </div>

            <h3>Products & Orders</h3>
            <h4 class="mt-4">📁 Dish Excel Import/Export</h4>

            {{-- Success Message --}}
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            {{-- Validation Errors --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif

            <div class="d-flex gap-3 align-items-center mt-3">
                {{-- Import Form --}}
                <form action="{{ route('dishes.import') }}" method="POST" enctype="multipart/form-data"
                    class="d-flex align-items-center gap-2">
                    @csrf
                    <input type="file" name="file" required class="form-control">
                    <button type="submit" class="btn btn-success">📤 Import Dishes</button>
                </form>

                {{-- Export Button --}}
                <a href="{{ route('dishes.export') }}" class="btn btn-info">📥 Export Dishes</a>
            </div>

            <div class="d-flex gap-3">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Dish Management System</h5>
                        <p class="card-text">Add, Modify, and Remove Dishes</p>
                        <a href="{{ route('dishes.index') }}" class="btn btn-primary">Go to Dish page</a>
                    </div>
                </div>

                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Dish Management System</h5>
                        <p class="card-text">Manage Customer Orders</p>
                        <a href="{{ route('orders.index') }}" class="btn btn-primary">Go to Orders Page</a>
                    </div>
                </div>
            </div>
        @endsection

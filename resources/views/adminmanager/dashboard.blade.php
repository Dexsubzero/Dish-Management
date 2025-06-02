    @extends('adminmanager.admin-layout')

    @section('content')

    @include('adminmanager.sidebar')
        <!-- Main Content -->
        <div id="dashboard" class="main-content container-fluid p-4" style="flex: 1;">
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

            <h3>Manager and Transactions</h3>
            <div class="d-flex gap-3">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Access Manager Functionality</h5>
                        <p class="card-text">Manage Products and Orders</p>
                        <a href="{{ route('adminmanager.mgr-dashboard') }}" class="btn btn-primary">Go to Manager page</a>
                    </div>
                </div>

                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Manage Transactions</h5>
                        <p class="card-text">Add, Modify, and Remove Business Transactions</p>
                        <a href="#" class="btn btn-primary">Go to Transactions Page</a>
                    </div>
                </div>
            </div>
    @endsection

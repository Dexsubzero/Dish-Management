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
                    <div class="me-3">
                        <i class="fas fa-bell"></i>
                        <span class="badge badge-orange rounded-pill">3</span>
                    </div>
                    <div class="user-profile d-flex align-items-center">
                        <img src="https://via.placeholder.com/40" alt="User">
                        <span>{{ Auth::user()->name }}</span>
                    </div>
                </div>
            </div>
    @endsection
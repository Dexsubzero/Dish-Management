    <div class="d-flex">
        <!-- Sidebar -->
        <div class="sidebar p-3" id="sidebar" style="width: 250px;">
            <div class="text-center mb-4">
                <h4 class="text-orange">Admin Dashboard</h4>
            </div>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link active" href="#dashboard">
                        <i class="fas fa-tachometer-alt"></i> Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('adminmanager.mgr-dashboard') }}">
                        <i class="fas fa-users"></i> Manager
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fas fa-chart-line"></i> Transactions
                    </a>
                </li>
                <li class="nav-item mt-4">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger w-100">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </button>
                    </form>
                </li>
            </ul>
        </div>
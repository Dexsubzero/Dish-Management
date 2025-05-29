    <div class="d-flex">
        <!-- Sidebar -->
        <div class="sidebar p-3" id="sidebar" style="width: 250px;">
            <div class="text-center mb-4">
                <h4 class="text-orange">Manager Dashboard</h4>
            </div>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link active" href="#" data-target="#main-content">
                        <i class="fas fa-tachometer-alt"></i> Dashboard
                    </a>
                </li>
                @if(auth()->check() && auth()->user()->is_role == 2)
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('adminmanager.dashboard') }}">
                        <i class="fas fa-users"></i> Admin
                    </a>
                </li>
                @endif
                <li class="nav-item">
                    <a class="nav-link" href="#" data-url="{{ route('manager.products') }}">
                        <i class="fas fa-box"></i> Products
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" data-url="{{ route('manager.orders') }}">
                        <i class="fas fa-shopping-cart"></i> Orders
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
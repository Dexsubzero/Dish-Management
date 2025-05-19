    @extends('adminmanager.layout')

    @section('content')
    <div class="d-flex">
        <!-- Sidebar -->
        <div class="sidebar p-3" id="sidebar" style="width: 250px;">
            <div class="text-center mb-4">
                <h4 class="text-orange">Admin Dashboard</h4>
            </div>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link active" href="#">
                        <i class="fas fa-tachometer-alt"></i> Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fas fa-users"></i> Users
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fas fa-box"></i> Products
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fas fa-shopping-cart"></i> Orders
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fas fa-chart-line"></i> Analytics
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fas fa-cog"></i> Settings
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

        <!-- Main Content -->
        <div class="main-content">
            <!-- Header -->
            <div class="header d-flex justify-content-between align-items-center">
                <div>
                    <button class="btn btn-sm d-lg-none" id="sidebarToggle">
                        <i class="fas fa-bars"></i>
                    </button>
                    <h4 class="mb-0">Welcome back, Admin!</h4>
                </div>
                <div class="d-flex align-items-center">
                    <div class="me-3">
                        <i class="fas fa-bell"></i>
                        <span class="badge badge-orange rounded-pill">3</span>
                    </div>
                    <div class="user-profile d-flex align-items-center">
                        <img src="https://via.placeholder.com/40" alt="User">
                        <span>Admin User</span>
                    </div>
                </div>
            </div>

            <!-- Stats Cards -->
            <div class="row">
                <div class="col-md-6 col-lg-3">
                    <div class="stat-card">
                        <div class="d-flex justify-content-between">
                            <div>
                                <div class="stat-value">1,254</div>
                                <div class="stat-label">Total Users</div>
                            </div>
                            <div class="stat-icon">
                                <i class="fas fa-users"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="stat-card">
                        <div class="d-flex justify-content-between">
                            <div>
                                <div class="stat-value">$12,345</div>
                                <div class="stat-label">Total Revenue</div>
                            </div>
                            <div class="stat-icon">
                                <i class="fas fa-dollar-sign"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="stat-card">
                        <div class="d-flex justify-content-between">
                            <div>
                                <div class="stat-value">356</div>
                                <div class="stat-label">New Orders</div>
                            </div>
                            <div class="stat-icon">
                                <i class="fas fa-shopping-cart"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="stat-card">
                        <div class="d-flex justify-content-between">
                            <div>
                                <div class="stat-value">89%</div>
                                <div class="stat-label">Satisfaction Rate</div>
                            </div>
                            <div class="stat-icon">
                                <i class="fas fa-chart-line"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content Row -->
            <div class="row mt-4">
                <div class="col-lg-8">
                    <div class="recent-activity">
                        <h5 class="mb-4">Recent Activity</h5>
                        <div class="activity-item">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <strong>New order received</strong>
                                    <p>Order #12345 from John Doe</p>
                                </div>
                                <div class="activity-time">10 min ago</div>
                            </div>
                        </div>
                        <div class="activity-item">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <strong>New user registered</strong>
                                    <p>Jane Smith joined the platform</p>
                                </div>
                                <div class="activity-time">25 min ago</div>
                            </div>
                        </div>
                        <div class="activity-item">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <strong>Payment received</strong>
                                    <p>$245.00 for order #12344</p>
                                </div>
                                <div class="activity-time">1 hour ago</div>
                            </div>
                        </div>
                        <div class="activity-item">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <strong>System update</strong>
                                    <p>Version 2.1.0 deployed</p>
                                </div>
                                <div class="activity-time">2 hours ago</div>
                            </div>
                        </div>
                        <div class="activity-item">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <strong>New product added</strong>
                                    <p>"Premium Widget" added to catalog</p>
                                </div>
                                <div class="activity-time">4 hours ago</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="recent-activity">
                        <h5 class="mb-4">Quick Actions</h5>
                        <button class="btn btn-primary w-100 mb-3">
                            <i class="fas fa-plus me-2"></i> Add New Product
                        </button>
                        <button class="btn btn-outline-secondary w-100 mb-3">
                            <i class="fas fa-user-plus me-2"></i> Create User
                        </button>
                        <button class="btn btn-outline-secondary w-100 mb-3">
                            <i class="fas fa-file-invoice-dollar me-2"></i> Generate Report
                        </button>
                        <button class="btn btn-outline-secondary w-100 mb-3">
                            <i class="fas fa-envelope me-2"></i> Send Newsletter
                        </button>
                        
                        <h5 class="mt-4 mb-3">System Status</h5>
                        <div class="mb-2">
                            <small class="text-muted">Storage</small>
                            <div class="progress" style="height: 8px;">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: 65%;" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <small>65% used (32.5GB of 50GB)</small>
                        </div>
                        <div class="mb-2">
                            <small class="text-muted">Memory</small>
                            <div class="progress" style="height: 8px;">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 45%;" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <small>45% used</small>
                        </div>
                        <div class="mb-2">
                            <small class="text-muted">CPU</small>
                            <div class="progress" style="height: 8px;">
                                <div class="progress-bar bg-info" role="progressbar" style="width: 30%;" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <small>30% used</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
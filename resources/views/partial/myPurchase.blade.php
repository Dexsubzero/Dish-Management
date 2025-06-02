                <style>
                    :root {
                        --primary-orange: #FF6B00;
                        --light-orange: #FFE8D9;
                        --dark-orange: #E05D00;
                    }

                    body {
                        background-color: #f8f9fa;
                        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                    }

                    .navbar {
                        background-color: white;
                        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
                    }

                    .navbar-brand {
                        font-weight: 700;
                        color: var(--primary-orange) !important;
                    }

                    .nav-link {
                        color: #555 !important;
                        font-weight: 500;
                    }

                    .nav-link:hover,
                    .nav-link.active {
                        color: var(--primary-orange) !important;
                    }

                    .btn-orange {
                        background-color: var(--primary-orange);
                        color: white;
                        border: none;
                    }

                    .btn-orange:hover {
                        background-color: var(--dark-orange);
                        color: white;
                    }

                    .btn-outline-orange {
                        border-color: var(--primary-orange);
                        color: var(--primary-orange);
                    }

                    .btn-outline-orange:hover {
                        background-color: var(--primary-orange);
                        color: white;
                    }

                    .purchase-card {
                        border-radius: 10px;
                        border-left: 4px solid var(--primary-orange);
                        transition: transform 0.3s ease;
                    }

                    .purchase-card:hover {
                        transform: translateY(-5px);
                        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
                    }

                    .order-status {
                        padding: 5px 15px;
                        border-radius: 20px;
                        font-weight: 600;
                        font-size: 0.8rem;
                    }

                    .status-delivered {
                        background-color: #E8F5E9;
                        color: #2E7D32;
                    }

                    .status-shipped {
                        background-color: #E3F2FD;
                        color: #1565C0;
                    }

                    .status-processing {
                        background-color: #FFF3E0;
                        color: #EF6C00;
                    }

                    .status-cancelled {
                        background-color: #FFEBEE;
                        color: #C62828;
                    }

                    .purchase-header {
                        border-bottom: 1px solid #eee;
                        padding-bottom: 15px;
                        margin-bottom: 20px;
                    }

                    .product-img {
                        width: 80px;
                        height: 80px;
                        object-fit: cover;
                        border-radius: 8px;
                    }

                    .tracking-steps .step {
                        position: relative;
                        padding-left: 30px;
                        margin-bottom: 20px;
                    }

                    .tracking-steps .step:before {
                        content: '';
                        position: absolute;
                        left: 0;
                        top: 0;
                        width: 20px;
                        height: 20px;
                        border-radius: 50%;
                        background-color: #ddd;
                        border: 3px solid white;
                    }

                    .tracking-steps .step.active:before {
                        background-color: var(--primary-orange);
                    }

                    .tracking-steps .step.completed:before {
                        background-color: var(--primary-orange);
                    }

                    .tracking-steps .step:after {
                        content: '';
                        position: absolute;
                        left: 9px;
                        top: 20px;
                        width: 2px;
                        height: 100%;
                        background-color: #ddd;
                    }

                    .tracking-steps .step:last-child:after {
                        display: none;
                    }

                    .tracking-steps .step.completed:after {
                        background-color: var(--primary-orange);
                    }

                    .sidebar-link {
                        display: block;
                        padding: 10px 15px;
                        color: #555;
                        text-decoration: none;
                        border-radius: 5px;
                        margin-bottom: 5px;
                    }

                    .sidebar-link:hover,
                    .sidebar-link.active {
                        background-color: var(--light-orange);
                        color: var(--primary-orange);
                        font-weight: 500;
                    }

                    .sidebar-link i {
                        margin-right: 10px;
                        width: 20px;
                        text-align: center;
                    }

                    @media (max-width: 768px) {
                        .product-img {
                            width: 60px;
                            height: 60px;
                        }

                        .order-details {
                            margin-top: 20px;
                        }
                    }
                </style>

                <div class="container mb-5">
                    <div class="row">
                        <!-- Main Content -->
                        <div class="col-lg-12">
                            <div class="card shadow-sm">
                                <div class="card-body">
                                    <div class="purchase-header">
                                        <h4 class="mb-0">My Purchases</h4>
                                    </div>

                                    <!-- Order List -->
                                    <div class="mb-4">
                                        @foreach ($orders as $order)
                                            <div class="card purchase-card mb-3">
                                                <div class="card-body">
                                                    <div class="row align-items-center">
                                                        <div class="col-md-3">
                                                            <p class="mb-1 text-muted small">Order #
                                                                {{ str_pad($order->id, 4, '0', STR_PAD_LEFT) }}</p>
                                                            <p class="mb-0 fw-bold">
                                                                {{ $order->items[0]['name'] ?? 'N/A' }}</p>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <p class="mb-1 text-muted small">Total</p>
                                                            <p class="mb-0 fw-bold">
                                                                ₱{{ number_format($order->total, 2) }}</p>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <p class="mb-1 text-muted small">Status</p>
                                                            <span
                                                                class="order-status status-{{ strtolower($order->status) }}">{{ ucfirst($order->status) }}</span>
                                                        </div>
                                                        <div class="col-md-3 text-md-end">
                                                            <button class="btn btn-sm btn-outline-orange"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#orderDetailsModal{{ $order->id }}">View
                                                                Details</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Modal per order -->
                                            <div class="modal fade" id="orderDetailsModal{{ $order->id }}"
                                                tabindex="-1" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Order
                                                                #{{ str_pad($order->id, 4, '0', STR_PAD_LEFT) }}</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row mb-4">
                                                                <div class="col-md-6">
                                                                    <h6>Order Summary</h6>
                                                                    <p><strong>Order Date:</strong>
                                                                        {{ $order->created_at->format('F j, Y') }}</p>
                                                                    <p><strong>Status:</strong> <span
                                                                            class="order-status status-{{ strtolower($order->status) }}">{{ ucfirst($order->status) }}</span>
                                                                    </p>
                                                                    <p><strong>Total Amount:</strong>
                                                                        ₱{{ number_format($order->total, 2) }}</p>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <h6>Delivery Address</h6>
                                                                    <p>{{ $order->name }}</p>
                                                                    <p>{{ $order->address }}</p>
                                                                    <p>{{ $order->email }}</p>
                                                                    <p>Phone: {{ $order->phone }}</p>
                                                                </div>
                                                            </div>

                                                            <hr>

                                                            <h6>Ordered Items</h6>
                                                            @php
                                                                $items = json_decode($order->items, true);
                                                            @endphp

                                                            @if (is_array($items))
                                                                <ul class="list-group">
                                                                    @foreach ($items as $item)
                                                                        <li
                                                                            class="list-group-item d-flex justify-content-between align-items-center">
                                                                            {{ $item['name'] }}
                                                                            (x{{ $item['quantity'] }})
                                                                            <span>₱{{ number_format($item['price'] * $item['quantity'], 2) }}</span>
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                            @else
                                                                <p>No items found.</p>
                                                            @endif

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <script>
                    // Example JavaScript to open the modal (would be triggered when clicking "View Details")
                    document.addEventListener('DOMContentLoaded', function() {
                        // This would be connected to your actual "View Details" buttons
                        var viewDetailsButtons = document.querySelectorAll('.btn-outline-orange');

                        viewDetailsButtons.forEach(function(button) {
                            button.addEventListener('click', function() {
                                var modal = new bootstrap.Modal(document.getElementById('orderDetailsModal'));
                                modal.show();
                            });
                        });
                    });
                </script>

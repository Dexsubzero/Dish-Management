@extends('crud-layout.layout')

@section('content')
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-lg-10">

                <div class="card shadow" style="border-color: orange;">
                    <div class="card-header text-white" style="background-color: orange;">
                        <h2 class="mb-0">🧾 Orders List</h2>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped align-middle text-center">
                            <thead style="background-color: #ffe5b4;">
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Dish</th>
                                    <th>Total Amount</th>
                                    <th>Address</th>
                                    <th>Email</th>
                                    <th>Mobile</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $order->name }}</td>
                                        <td>
                                            @php
                                                $items = json_decode($order->items, true);
                                            @endphp

                                            @if (is_array($items))
                                                @foreach ($items as $item)
                                                    <div>{{ $item['name'] }} x{{ $item['quantity'] }}</div>
                                                @endforeach
                                            @else
                                                <div>Invalid data</div>
                                            @endif
                                        </td>
                                        <td>₱{{ number_format($order->total, 2) }}</td>
                                        <td>{{ $order->address }}</td>
                                        <td>{{ $order->email }}</td>
                                        <td>{{ $order->phone }}</td>
                                        <td>
                                            <a href="#" class="btn btn-info btn-sm" title="View Order">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <a href="#" class="btn btn-success btn-sm" title="Confirm Order">
                                                <i class="fa-solid fa-circle-check"></i>
                                            </a>
                                            <a href="#" class="btn btn-success btn-sm" title="Mark as Delivered">
                                                <i class="fa-solid fa-truck"></i>
                                            </a>
                                            <span class="badge bg-success">Delivered</span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>
@endsection

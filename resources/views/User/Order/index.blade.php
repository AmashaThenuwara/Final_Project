@extends('layout.user')

@section('content')
<h1>My Orders</h1>
<table class="product-table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Total</th>
            <th>Status</th>
            <th>Products</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>Rs: {{ $order->total }}</td>
                <td>{{ ucfirst($order->status) }}</td>
                <td>
                    @foreach ($order->products as $product)
                        <div style="margin-bottom: 10px;">
                            <img src="{{ asset('storage/' . $product['image']) }}" alt="{{ $product['name'] }}" style="width: 60px; height: auto; margin-right: 10px;">
                            {{ $product['name'] }} (Qty: {{ $product['quantity'] }})
                        </div>
                    @endforeach
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection

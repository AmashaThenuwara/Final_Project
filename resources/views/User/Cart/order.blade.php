@extends('layout.user')

@section('content')
<div class="order-confirmation">
    <h2>Order Confirmation</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="order-details">
        <h3>Customer Info</h3>
        <p><strong>Name:</strong> {{ $order->name }}</p>
        <p><strong>Phone:</strong> {{ $order->phone }}</p>
        <p><strong>Address:</strong> {{ $order->address }}</p>
        <p><strong>Payment Method:</strong> {{ ucfirst($order->payment_method) }}</p>
    </div>

    <div class="order-summary">
        <h3>Order Summary</h3>
        <table class="order-table">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Qty</th>
                    <th>Price</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($order->products as $product)
                <tr>
                    <td>{{ $product['name'] }}</td>
                    <td>{{ $product['quantity'] }}</td>
                    <td>Rs: {{ $product['price'] }}</td>
                    <td>Rs: {{ $product['price'] * $product['quantity'] }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="order-total">
            <strong>Total Price: Rs. {{ $order->total }}</strong>
        </div>
    </div>
</div>
@endsection

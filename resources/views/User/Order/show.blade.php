@extends('layout.user')

@section('content')
<h2>Order #{{ $order->id }}</h2>
<p>Status: {{ ucfirst($order->status) }}</p>
<p>Total: Rs. {{ $order->total }}</p>

<ul style="list-style: none; padding-left: 0;">
@foreach($order->products as $product)
    <li style="margin-bottom: 15px;">
        <img src="{{ asset('storage/' . $product['image']) }}" alt="{{ $product['name'] }}" style="width: 60px; height: auto; margin-right: 10px;">
        {{ $product['name'] }} - Qty: {{ $product['quantity'] }} - Rs. {{ $product['price'] }}
    </li>
@endforeach
</ul>
@endsection

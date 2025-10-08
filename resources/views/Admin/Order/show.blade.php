@extends('layout.admin')

@section('content')
<div class="order-details-container">
    <h2 class="section-title">🧾 Order Details</h2>

    <div class="order-info">
        <p><strong>Name:</strong> {{ $order->name }}</p>
        <p><strong>Phone:</strong> {{ $order->phone }}</p>
        <p><strong>Address:</strong> {{ $order->address }}</p>
        <p><strong>Payment:</strong> {{ ucfirst($order->payment_method) }}</p>
        <p><strong>Status:</strong> <span class="status-badge">{{ ucfirst($order->status) }}</span></p>
    </div>

    <h3 class="section-subtitle">🛍️ Items</h3>
    @php
    $items = json_decode($order->products, true);
    @endphp

    <table class="order-table product-table">
        <thead>
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Qty</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            @foreach($items as $item)
            <tr>
                <td>
                    @if(isset($item['image']))
                    <img src="{{ asset('storage/' . $item['image']) }}" alt="{{ $item['name'] }}">
                    @else
                    <span style="color:gray;">No image</span>
                    @endif
                </td>
                <td>{{ $item['name'] }}</td>
                <td>{{ $item['quantity'] }}</td>
                <td>Rs {{ $item['price'] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <p class="order-total"><strong>Total:</strong> Rs {{ $order->total }}</p><br>

    <div class="button-row" style="display: flex; justify-content: space-between; align-items: center; margin-top: 20px;">
        <form method="POST" action="{{ route('admin.orders.confirm', $order->id) }}">
            @csrf
            <button type="submit" class="btn-confirm">Confirm Order & Send Message</button>
        </form>
        <form method="POST" action="{{ route('admin.orders.dispatch', $order->id) }}">
            @csrf
            <button type="submit" class="btn-confirm">Mark as Dispatched</button>
        </form>
    </div>
</div>
@endsection


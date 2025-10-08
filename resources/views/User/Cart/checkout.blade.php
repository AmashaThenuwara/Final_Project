@extends('layout.user')

@section('content')
<div class="checkout-container">
    <h2>Checkout</h2>

    <form method="POST" action="{{ route('orders.store') }}">
        @csrf
        <div class="form-group">
            <label for="name">Full Name</label>
            <input type="text" name="name" id="name" required>

            <label for="phone">Phone Number</label>
            <input type="text" name="phone" id="phone" required>

            <label for="address">Delivery Address</label>
            <textarea name="address" id="address" required placeholder="Enter your delivery address"></textarea>
        </div>

        <div class="form-group">
            <label for="payment_method">Payment Method</label>
            <select name="payment_method" id="payment_method" required>
                <option value="">Select Payment Method</option>
                <option value="cod">Cash on Delivery</option>
                <option value="card">Credit/Debit Card</option>
                <option value="paypal">PayPal</option>
            </select>
        </div>

        <div class="order-summary">
            <h3>Order Summary</h3>
            <p>Total Items: {{ $totalItems }}</p>
            <p>Total Price: Rs.{{ $totalPrice }}</p>
        </div>

        <button type="submit" class="checkout-btn">Place Order</button>
    </form>
</div>
@endsection

@extends('layout.user')

@section('content')
<section class="cart-container">
    <h2>Your Cart</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(count($products) > 0)
    <table class="cart-table">
        <thead>
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Price</th>
                <th>Qty</th>
                <th>Total</th>
                <th>Remove</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td><img src="{{ asset('storage/' . $product->image_url) }}" class="cart-img" alt="{{ $product->name }}"></td>
                <td>{{ $product->name }}</td>
                <td>Rs: {{ $product->price }}</td>
                <td>{{ $cart[$product->id] }}</td>
                <td>Rs: {{ $product->price * $cart[$product->id] }}</td>
                <td>
                    <form method="POST" action="{{ route('cart.remove', $product->id) }}">
                        @csrf
                        <button type="submit" class="remove-btn"><i class="bi bi-trash"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="cart-total">
        <strong>Total: Rs:
            {{ $products->sum(fn($p) => $p->price * $cart[$p->id]) }}
        </strong>
        @auth('web')
        <a href="{{ route('checkout') }}" class="checkout-btn">Checkout</a>
        @else
        <a href="{{ route('user.login') }}" class="checkout-btn">Login to Checkout</a>
        @endauth
    </div>
    @else
        <p>Your cart is empty.</p>
    @endif
</section>
@endsection


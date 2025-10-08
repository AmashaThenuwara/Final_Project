@extends('layout.user')

@section('content')
<section class="product">
    <h2>{{ $category->name }} Collection</h2>
    <div class="product-grid">
        @forelse($products as $product)
        <div class="product-card">
            <img src="{{ asset('storage/' . $product->image_url) }}" alt="{{ $product->name }}">
            <h3>{{ $product->name }}</h3>
            <p>Rs: {{ $product->price }}</p>
            <form method="POST" action="{{ route('cart.add', $product->id) }}">
                @csrf
                <button type="submit" class="btn">Add to Cart</button>
            </form>
        </div>
        @empty
        <p>No products found in this category.</p>
        @endforelse
    </div>
</section>
@endsection

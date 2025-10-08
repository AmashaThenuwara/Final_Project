<form method="POST" action="{{ route('orders.store') }}">
    @csrf
    @foreach($products as $product)
        <div>
            <label>{{ $product->name }} (Rs. {{ $product->price }})</label>
            <input type="number" name="products[{{ $loop->index }}][quantity]" min="0">
            <input type="hidden" name="products[{{ $loop->index }}][id]" value="{{ $product->id }}">
        </div>
    @endforeach
    <button type="submit">Place Order</button>
</form>

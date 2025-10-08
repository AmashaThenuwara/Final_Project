@extends('layout.admin')

@section('content')
    <h1>Manage Products</h1>
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <a href="{{ route('admin.inventory.create') }}" class="btn btn-primary">Add Product</a>
    <table class="product-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Size</th>
                <th>Category</th>
                <th>Stock</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->description }}</td>
                    <td>${{ $product->price }}</td>
                    <td>{{ $product->size }}</td>
                    <td>{{ $product->category ? $product->category->name : 'N/A' }}</td>
                    <td>{{ $product->stock }}</td>
                    <td><img src="{{ asset('storage/' . $product->image_url) }}" alt="{{ $product->name }}" width="50"></td>
                    <td>
                        <a href="{{ route('admin.inventory.edit', $product) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('admin.inventory.destroy', $product) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

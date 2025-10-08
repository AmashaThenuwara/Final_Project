@extends('layout.admin')

@section('content')
    <h1>Categories</h1>
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">Add New Category</a>
    <table class="product-table">
        <thead>
            <tr><th>ID</th><th>Name</th><th>Actions</th></tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>
                        <a href="{{ route('admin.categories.edit', $category) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Delete this category?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

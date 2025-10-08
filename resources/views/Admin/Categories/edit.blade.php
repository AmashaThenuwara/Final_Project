@extends('layout.admin')

@section('content')
    <h1>Edit Category</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
        </div>
    @endif
    <form method="POST" action="{{ route('admin.categories.update', $category) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label>Category Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $category->name) }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Category</button>
    </form>
@endsection

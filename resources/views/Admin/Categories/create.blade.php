@extends('layout.admin')

@section('content')
    <h1>Add Category</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
        </div>
    @endif
    <form method="POST" action="{{ route('admin.categories.store') }}">
        @csrf
        <div class="form-group">
            <label>Category Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Category</button>
    </form>
@endsection

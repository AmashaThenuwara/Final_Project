@extends('layout.user')

@section('content')
<div class="auth-container">
    <h2>Register</h2>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="POST" action="{{ route('user.register') }}">
        @csrf
        <label>Name</label>
        <input type="text" name="name" value="{{ old('name') }}" required>
        <label>Email</label>
        <input type="email" name="email" value="{{ old('email') }}" required>
        <label>Password</label>
        <input type="password" name="password" required>
        <label>Confirm Password</label>
        <input type="password" name="password_confirmation" required>
        <button type="submit">Register</button>
    </form>
    <p>Already have an account? <a href="{{ route('user.login') }}">Login here</a></p>
</div>
@endsection

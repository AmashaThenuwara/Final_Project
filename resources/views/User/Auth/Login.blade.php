@extends('layout.user')

@section('content')
<div class="auth-container">
    <h2>Login</h2>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="POST" action="{{ route('user.login') }}">
        @csrf
        <label>Email</label>
        <input type="email" name="email" value="{{ old('email') }}" required>
        <label>Password</label>
        <input type="password" name="password" required>
        <button type="submit">Login</button>
    </form>
    <p>Don’t have an account? <a href="{{ route('user.register') }}">Register here</a></p>
</div>
@endsection

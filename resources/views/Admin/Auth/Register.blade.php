<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Register - Clothing Dashboard</title>
    <link rel="stylesheet" href="{{ asset('assets/admin/auth.css') }}">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap');
    </style>
</head>
<body>
    <div class="auth-bg">
        <div class="auth-container">
            <h2>Admin Registration</h2>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('admin.register') }}">
                @csrf

                <label for="name">Name</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" required>

                <label for="email">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" required>

                <label for="password">Password</label>
                <input type="password" name="password" id="password" required>

                <label for="password_confirmation">Confirm Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" required>

                <button type="submit">Register</button>
            </form>

            <p>Already have an account? <a href="{{ route('admin.login') }}">Login here</a></p>
        </div>
    </div>
</body>
</html>

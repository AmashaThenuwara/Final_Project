<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Login - Clothing Dashboard</title>
    <link rel="stylesheet" href="{{ asset('assets/admin/auth.css') }}">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap');
    </style>
</head>
<body>
    <div class="auth-bg">
        <div class="auth-container">
            <h2>Admin Login</h2>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('admin.login') }}">
                @csrf

                <label for="email">Email</label>
                <input type="email" name="email" id="email" required>

                <label for="password">Password</label>
                <input type="password" name="password" id="password" required>

                <button type="submit">Login</button>
            </form>

            <p>Don’t have an account? <a href="{{ route('admin.register') }}">Register here</a></p>
        </div>
    </div>
</body>
</html>

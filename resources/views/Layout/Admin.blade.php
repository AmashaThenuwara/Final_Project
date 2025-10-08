<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin - ADD Clothing</title>
    <link rel="stylesheet" href="{{asset('assets/admin/dashboard.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>
    <!-- Admin Header -->
    @include('layout.partials.header')

    <div class="admin-container">
        <!-- Admin Sidebar -->
        @include('layout.partials.sidebar')

        <!-- Admin Page Content -->
        <div class="content">
            @yield('content')
        </div>
    </div>

    <!-- Admin Footer -->
    @include('layout.partials.footer')
</body>
</html>

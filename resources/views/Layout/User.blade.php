<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ADD Clothing</title>
    <link rel="stylesheet" href="{{ asset('assets/user/home.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>

    <!-- User Header-->
    @include('layout.includes.header')

    <div class="main-container">
        <!--User Sidebar-->
        @include('layout.includes.sidebar')

        <!--User Page Content-->
        <div class="content">
            @yield('content')
        </div>
    </div>

    <!--User Footer-->
    @include('layout.includes.footer')

</body>
</html>

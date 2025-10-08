<!--Navbar-->
<header class="navbar">
    <!-- Left : Menu icon-->
    <div class="menu-btn" id="menu-btn"><i class="bi bi-list"></i></div>

    <!-- Center : logo-->
    <div class="image-text-container">
        <img src="{{ asset('Images/Logo/AddClothing_Logo.png')}}" alt="logo">
         <div class="logo">ADDCLOTHING</div>
    </div>

    <!-- Right: Nav Link+Search+cart-->
    <nav class="nav-links">
        <ul>
            <li><a href="{{ url('home') }}">Home</a></li>
            <li class="dropdown">
                <a href="#">Product</a>
                <ul class="dropdown-content">
                    <li><a href="{{ route('category.show', 'ladies') }}">Ladies</a></li>
                    <li><a href="{{ route('category.show', 'gents') }}">Gents</a></li>
                    <li><a href="{{ route('category.show', 'kids') }}">Kids</a></li>
                </ul>
            </li>

            <li><a href="{{ url('about')}}">About</a></li>
            <div class="search-cart">
                <a href="{{ route('cart.view') }}" class="cart-icon"><i class="bi bi-cart4" style="color: white;"></i></a>

            </div>
            @auth('web')
            <li>
                <a href="{{ route('user.profile') }}" class="profile-icon"><i class="bi bi-person-circle" style="color: white;"></i> {{ Auth::user()->name }}</a>
            </li>
            @else
                <li>
                    <a href="{{ route('user.login') }}" class="btn btn-outline-light">Sign In</a>
                </li>
            @endauth
        </ul>
    </nav>
</header>

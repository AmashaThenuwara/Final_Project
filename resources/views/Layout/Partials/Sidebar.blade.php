<!-- Sidebar -->
<aside class="sidebar" id="sidebar">
    <div class="close-btn" id="close-btn">&times;</div>
    <div class="image-text-container">
        <img src="{{ asset('Images/Logo/AddClothing_Logo.png')}}" alt="logo">
        <span class="logo-text">Add Clothing</span>
    </div>
    <ul>
        @auth('admin')
        <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
        @endauth
        <li>
            <a href="#">Products</a>
            <ul class="dropdown">
                <li><a href="{{ route('admin.inventory.create') }}" class="product"><i class="bi bi-folder-plus" style="color: white;"></i> Add New Product</a></li>
                <li><a href="{{ route('admin.inventory.index') }}" class="product"><i class="bi bi-folder-fill" style="color: white;"></i> Manage Products</a></li>
            </ul>
        </li>
        <li><a href="{{ route('admin.categories.index') }}">Categories</a></li>
        <li><a href="{{ route('admin.orders.index') }}">Orders</a></li>
        <li><a href="{{ route('admin.users.index') }}">Users</a></li>
    </ul>
</aside>
<!-- JS for Sidebar -->
<script>
document.querySelectorAll(".sidebar ul li a").forEach(item => {
    item.addEventListener("click", function(e) {
        const parent = this.parentElement;
        if (parent.querySelector(".dropdown")) {
            e.preventDefault();
            parent.classList.toggle("active");
        }
    });
});
</script>

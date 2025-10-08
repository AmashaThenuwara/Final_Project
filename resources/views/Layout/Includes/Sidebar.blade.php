<!-- Sidebar -->
<aside class="sidebar" id="sidebar">
    <div class="close-btn" id="close-btn">&times;</div>
    <ul>
        <li><a href="{{ url('home') }}">Home</a></li>

        <!-- Dropdown -->
        <li>
            <a href="#" class="dropdown-toggle">Categories</a>
            <ul class="dropdown">
                <li><a href="{{ route('category.show', 'ladies') }}">Ladies</a></li>
                <li><a href="{{ route('category.show', 'gents') }}">Gents</a></li>
                <li><a href="{{ route('category.show', 'kids') }}">Kids</a></li>
            </ul>
        </li>
        <li><a href="{{ url('cart') }}">Cart</a></li>
        <li><a href="{{url('contact')}}">Contact</a></li>
        <li><a href="{{url('about')}}">About</a></li>
    </ul>
</aside>

<!-- JS for Sidebar -->
<script>
    const menuBtn = document.getElementById('menu-btn');
    const sidebar = document.getElementById('sidebar');
    const closeBtn = document.getElementById('close-btn');

    // Sidebar open
    menuBtn.addEventListener('click', () => {
        sidebar.classList.add('active');
    });

    // Sidebar close
    closeBtn.addEventListener('click', () => {
        sidebar.classList.remove('active');
    });

    // Dropdown toggle
    const dropdownToggles = document.querySelectorAll('.dropdown-toggle');
    dropdownToggles.forEach(toggle => {
        toggle.addEventListener('click', (e) => {
            e.preventDefault(); // Prevents jumping to top
            const parent = toggle.parentElement;
            parent.classList.toggle('open');
        });
    });
</script>

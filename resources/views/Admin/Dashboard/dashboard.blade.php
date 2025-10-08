@extends('layout.admin')

@section('content')
<main class="dashboard-content">
    <h1>Welcome, Admin</h1>
    <p>Here’s an overview of your store.</p>

 <div class="dashboard-cards">
    <button class="card-button" onclick="window.location='{{ route('admin.inventory.index') }}'">
        <div class="card">
            <h2>Total Products</h2>
            <p>{{ $totalProducts }}</p>
        </div>
    </button>

    <button class="card-button" onclick="window.location='{{ route('admin.orders.index') }}'">
        <div class="card">
            <h2>Orders Today</h2>
            <p>{{ $ordersToday }}</p>
        </div>
    </button>

    <button class="card-button" onclick="window.location='{{ route('admin.users.index') }}'">
        <div class="card">
            <h2>Users</h2>
            <p>{{ $users }}</p>
        </div>
    </button>

    <button class="card-button" onclick="window.location='{{ route('admin.orders.index') }}'">
        <div class="card">
            <h2>Revenue</h2>
            <p>Rs {{ number_format($revenue, 2) }}</p>
        </div>
    </button>
</div>


    <!-- Chart Section -->
    <div class="chart-container">
        <canvas id="ordersChart"></canvas>
    </div>
</main>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('ordersChart').getContext('2d');
    const ordersChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: {!! json_encode($orderLabels) !!},
            datasets: [{
                label: 'Orders This Week',
                data: {!! json_encode($orderCounts) !!},
                backgroundColor: 'rgba(75, 192, 192, 0.6)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: { beginAtZero: true }
            }
        }
    });
</script>
@endsection

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>E-Commerce Admin Dashboard</title>

<!-- Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

<style>
    body {
        background: #f4f6f9;
        font-family: "Inter", Arial, sans-serif;
    }

    /* SIDEBAR */
    .sidebar {
        width: 260px;
        height: 100vh;
        position: fixed;
        background: #111827;
        padding: 25px 20px;
        color: white;
    }

    .sidebar h4 {
        color: #10b981;
        margin-bottom: 30px;
        text-align: center;
        font-weight: bold;
    }

    .sidebar a {
        display: block;
        padding: 12px;
        margin-bottom: 10px;
        border-radius: 6px;
        color: #d1d5db;
        text-decoration: none;
        transition: 0.3s;
    }

    .sidebar a:hover {
        background: #374151;
        color: white;
    }

    /* MAIN */
    .main {
        margin-left: 280px;
        padding: 25px;
    }

    /* TOP BAR */
    .topbar {
        background: white;
        padding: 15px 20px;
        border-radius: 10px;
        box-shadow: 0 2px 6px rgba(0,0,0,0.08);
        margin-bottom: 30px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    /* CARDS */
    .stat-card {
        background: white;
        padding: 25px;
        border-radius: 12px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.08);
    }

    .stat-title {
        color: #6b7280;
        font-size: 14px;
        margin-bottom: 8px;
    }

    .stat-value {
        font-size: 28px;
        font-weight: bold;
        color: #10b981;
    }

    .section-title {
        margin-top: 30px;
        margin-bottom: 15px;
        font-size: 20px;
        font-weight: 600;
    }

    /* TABLE */
    .table-custom {
        background: white;
        border-radius: 12px;
        padding: 20px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.08);
    }

</style>
</head>
<body>

<!-- SIDEBAR -->
<div class="sidebar">
    <h4>Seller Admin</h4>

    <a href="{{ route('dashboard') }}"><i class="bi bi-speedometer2 me-2"></i> Dashboard</a>
    <a href="{{ route('orders.index') }}"><i class="bi bi-bag-check me-2"></i> Orders</a>
    <a href="{{ route('products.index') }}"><i class="bi bi-box-seam me-2"></i> Products</a>
    <a href="{{ route('customers.index') }}"><i class="bi bi-people me-2"></i> Customers</a>
    <a href="#"><i class="bi bi-bar-chart-line me-2"></i> Analytics</a>
    <a href="#"><i class="bi bi-credit-card me-2"></i> Payments</a>
    <a href="#"><i class="bi bi-gear me-2"></i> Settings</a>
</div>

<!-- MAIN CONTENT -->
<div class="main">

    <!-- TOP BAR -->
    <div class="topbar">
        <h4>E-Commerce Overview</h4>
        <div>
            <button class="btn btn-outline-secondary"><i class="bi bi-bell me-1"></i> Notifications</button>
            <button class="btn btn-success"><i class="bi bi-person-circle me-1"></i> Admin</button>
        </div>
    </div>

    <!-- STATS -->
    <div class="row g-4">
        <div class="col-md-3">
            <div class="stat-card">
                <p class="stat-title">Total Sales</p>
                <p class="stat-value">${{ number_format(\App\Models\Order::sum('total'), 2) }}</p>
            </div>
        </div>

        <div class="col-md-3">
            <div class="stat-card">
                <p class="stat-title">Orders</p>
                <p class="stat-value">{{ \App\Models\Order::count() }}</p>
            </div>
        </div>

        <div class="col-md-3">
            <div class="stat-card">
                <p class="stat-title">Customers</p>
                <p class="stat-value">{{ \App\Models\User::count() }}</p>
            </div>
        </div>

        <div class="col-md-3">
            <div class="stat-card">
                <p class="stat-title">Low Stock</p>
                <p class="stat-value">{{ \App\Models\Product::where('stock', '<', 10)->count() }}</p>
            </div>
        </div>
    </div>

    <!-- ORDERS TABLE -->
    <h5 class="section-title">Recent Orders</h5>

    <div class="table-custom">
        <table class="table">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Customer</th>
                    <th>Status</th>
                    <th>Total</th>
                    <th>Date</th>
                </tr>
            </thead>

<tbody>
@foreach($orders as $order)
<tr>
    <td>#{{ $order->id }}</td>
    <td>{{ $order->user ? $order->user->name : 'Guest' }}</td>
    <td>
        @if($order->status == 'delivered')
            <span class="badge bg-success">Delivered</span>
        @elseif($order->status == 'pending')
            <span class="badge bg-warning">Pending</span>
        @else
            <span class="badge bg-info">{{ ucfirst($order->status) }}</span>
        @endif
    </td>
    <td>${{ number_format($order->total, 2) }}</td>
    <td>{{ $order->created_at->format('M d, Y') }}</td>
</tr>
@endforeach
</tbody>

        </table>
    </div>

</div>

</body>
</html>

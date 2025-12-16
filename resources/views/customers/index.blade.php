<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Customers List</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
    body { background: #f4f6f9; font-family: 'Inter', sans-serif; }
    .sidebar { width: 260px; height: 100vh; position: fixed; background: #111827; padding: 25px 20px; color: white; }
    .sidebar a { display:block; padding:12px; color:#d1d5db; margin-bottom:10px; text-decoration:none; border-radius:6px; }
    .sidebar a:hover { background:#374151; color:white; }
    .main { margin-left:280px; padding:25px; }
    .table-custom { background:white; padding:20px; border-radius:12px; box-shadow:0 2px 10px rgba(0,0,0,0.08); }
    @media(max-width: 768px){
        .main { margin-left:0; }
        .sidebar { width:100%; height:auto; position:relative; padding:15px; }
    }
</style>
</head>
<body>

<div class="sidebar">
    <h4>Admin Panel</h4>
    <a href="{{ route('dashboard') }}">Dashboard</a>
    <a href="{{ route('customers.create') }}">Add Customer</a>
    <a href="{{ route('customers.index') }}">View Customers</a>
</div>

<div class="main">
    <h4>Customers List</h4>

    <div class="table-custom mt-3">
        <table class="table table-striped table-hover align-middle">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Gender</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($customers as $customer)
                <tr>
                    <td>{{ $customer->id }}</td>
                    <td>{{ $customer->name }}</td>
                    <td>{{ $customer->email }}</td>
                    <td>{{ $customer->phone }}</td>
                    <td>{{ $customer->address ?? 'N/A' }}</td>
                    <td>{{ ucfirst($customer->gender) }}</td>
                    <td>
                        <a href="{{ route('customers.edit', $customer->id) }}" class="btn btn-sm btn-warning">
                            Edit
                        </a>
                        <form action="{{ route('customers.destroy', $customer->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this customer?')">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
                @if($customers->isEmpty())
                <tr>
                    <td colspan="7" class="text-center text-muted">No customers found</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

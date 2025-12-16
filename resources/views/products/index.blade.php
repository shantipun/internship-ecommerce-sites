<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Products List</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
    body { background: #f4f6f9; font-family: 'Inter', sans-serif; }
    .sidebar { width: 260px; height: 100vh; position: fixed; background: #111827; padding: 25px 20px; color: white; }
    .sidebar a { display:block; padding:12px; color:#d1d5db; margin-bottom:10px; text-decoration:none; border-radius:6px; }
    .sidebar a:hover { background:#374151; color:white; }
    .main { margin-left:280px; padding:25px; }
    .table-custom { background:white; padding:20px; border-radius:12px; box-shadow:0 2px 10px rgba(0,0,0,0.08); }
    .product-img {
        width: 60px;
        height: 60px;
        object-fit: cover;
        border-radius: 8px;
    }
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
    <a href="{{ route('products.create') }}">Add Product</a>
    <a href="{{ route('products.index') }}">View Products</a>
    <a href="{{ route('categories.create') }}">Add Category</a>
    <a href="{{ route('categories.index') }}">View Category</a>
</div>

<div class="main">
    <h4>Products List</h4>

    <div class="table-custom mt-3">
        <table class="table table-striped table-hover align-middle">
           <thead class="table-dark">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Category</th> <!-- New Category Column -->
        <th>Price</th>
        <th>Stock</th>
        <th>Image</th>
        <th>Actions</th>
    </tr>
</thead>
<tbody>
    @foreach($products as $product)
    <tr>
        <td>{{ $product->id }}</td>
        <td>{{ $product->name }}</td>
        <td>{{ $product->category ? $product->category->name : 'N/A' }}</td> <!-- Show Category -->
        <td>Rs. {{ number_format($product->price, 2) }}</td>
        <td>{{ $product->stock }}</td>
        <td>
            @if($product->image)
                <img src="{{ asset('storage/'.$product->image) }}" alt="{{ $product->name }}" class="product-img">
            @else
                N/A
            @endif
        </td>
        <td>
            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-warning">
                <i class="bi bi-pencil-square"></i> Edit
            </a>
            <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this product?')">
                    <i class="bi bi-trash"></i> Delete
                </button>
            </form>
        </td>
    </tr>
    @endforeach
    @if($products->isEmpty())
    <tr>
        <td colspan="7" class="text-center text-muted">No products found</td>
    </tr>
    @endif
</tbody>

        </table>
    </div>
</div>

<!-- Bootstrap JS (Optional) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

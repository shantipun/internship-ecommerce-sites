<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <style>
        body {
            background: #f1f5f9;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: "Inter", sans-serif;
        }

        .form-container {
            width: 480px;
            background: #ffffff;
            padding: 35px;
            border-radius: 20px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.12);
            animation: fadeIn 0.5s ease-in-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(15px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .stylish-input {
            border-radius: 12px;
            padding: 12px;
            background: #f9fafb;
            border: 1px solid #d1d5db;
            transition: 0.25s;
        }

        .stylish-input:focus {
            background: #fff;
            border-color: #0d6efd;
            box-shadow: 0 0 0 4px rgba(13,110,253,.22);
        }

        .submit-btn {
            border-radius: 12px;
            font-weight: 600;
            padding: 12px;
            transition: 0.3s;
        }
        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(13,110,253,0.3);
        }

        .form-title {
            font-weight: 700;
        }
    </style>
</head>

<body>

    <div class="form-container">

        <h3 class="form-title mb-4 text-center">➕ Add New Product</h3>

        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label class="form-label fw-semibold">Product Name</label>
                <input type="text" name="name" class="form-control stylish-input" placeholder="Product name" required>
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Price</label>
                <input type="number" name="price" step="0.01" class="form-control stylish-input" placeholder="0.00" required>
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Stock</label>
                <input type="number" name="stock" class="form-control stylish-input" placeholder="0" required>
            </div>
            <div class="mb-3">
        <label class="form-label fw-semibold">Category</label>
        <select name="category_id" class="form-control stylish-input" required>
            <option value="" disabled selected>Select a category</option>

            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach

        </select>
    </div>

            <div class="mb-4">
                <label class="form-label fw-semibold">Product Image</label>
                <input type="file" name="image" class="form-control stylish-input">
            </div>

            <button type="submit" class="btn btn-primary w-100 submit-btn">
                <i class="bi bi-upload me-1"></i> Add Product
            </button>

        </form>
    </div>

</body>
</html>

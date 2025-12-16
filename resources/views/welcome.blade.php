<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>E-commerce Form</title>

<style>
    body {
        font-family: Arial, Helvetica, sans-serif;
        background: #f7f7f7;
        padding: 30px;
    }

    .container {
        max-width: 450px;
        background: white;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        margin: auto;
    }

    h2 {
        text-align: center;
        margin-bottom: 25px;
        color: #333;
    }

    label {
        font-weight: bold;
        margin-bottom: 5px;
        display: block;
        color: #555;
    }

    input, select, textarea {
        width: 100%;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 6px;
        margin-bottom: 15px;
        font-size: 15px;
    }

    textarea {
        height: 100px;
    }

    button {
        width: 100%;
        background: #ff6b00;
        color: white;
        border: none;
        padding: 14px;
        border-radius: 6px;
        font-size: 16px;
        cursor: pointer;
        font-weight: bold;
        transition: 0.3s;
    }

    button:hover {
        background: #e55d00;
    }
</style>

</head>
<body>

<div class="container">
    <h2>Add Product</h2>

    <form action="/submit-product" method="POST">
        @csrf

        <label>Product Name</label>
        <input type="text" name="product_name" placeholder="Enter product name">

        <label>Price ($)</label>
        <input type="number" name="price" placeholder="Enter price">

        <label>Category</label>
        <select name="category">
            <option value="Electronics">Electronics</option>
            <option value="Fashion">Fashion</option>
            <option value="Dashboard">Dashboard</option>
            <option value="Gadgets">Gadgets</option>
            <option value="Sports">Sports</option>
        </select>

        <label>Description</label>
        <textarea name="description" placeholder="Enter product description"></textarea>

        <label>Upload Image</label>
        <input type="file" name="image">

        <button type="submit">Add Product</button>
    </form>
</div>

</body>
</html>

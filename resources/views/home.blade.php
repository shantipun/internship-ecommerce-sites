@extends('layouts.app')

@section('title', 'ShopNepal - Home')

@section('content')
<!-- Hero Section -->
<section class="py-5 text-center bg-light">
  <div class="container">
    <h1 class="display-5 fw-bold">Welcome to ShopNepal</h1>
    <p class="lead">Find your favorite products at best prices</p>
    <a href="#" class="btn btn-primary btn-lg">Shop Now</a>
  </div>
</section>

<!-- Products Section -->
<section class="py-5">
  <div class="container">
    <h2 class="mb-4">Featured Products</h2>
    <div class="row g-4">
      @foreach($products as $product)
      <div class="col-md-3">
        <div class="product-card">
          <img src="{{ asset('storage/'.$product->image) }}" alt="{{ $product->name }}" class="product-img">
          <div class="p-3">
            <h5>{{ $product->name }}</h5>
            <p>Rs. {{ number_format($product->price, 2) }}</p>
            <a href="#" class="btn btn-sm btn-success w-100">Add to Cart</a>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>
@endsection

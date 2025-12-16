@extends('layouts.app')
@section('title', 'Shop - ShopNepal')

@section('content')
<section class="py-5">
  <div class="container">

    <!-- 🔍 Search + Category + Sort -->
    <div class="row mb-4">
    <div class="col-md-4 mb-2">
        <form action="{{ route('shop') }}" method="GET">
          <div class="input-group shadow-sm rounded">
            <input type="text" name="search" class="form-control border-0" placeholder="Search products..."
              value="{{ request('search') }}">
            <button class="btn btn-primary"><i class="bi bi-search"></i></button>
          </div>
        </form>
      </div>


      <div class="col-md-4">
        <form action="{{ route('shop') }}" method="GET">
          <select name="category" class="form-select" onchange="this.form.submit()">
            <option value="">All Categories</option>
            @foreach($categories as $cat)
              <option value="{{ $cat->id }}" {{ request('category')==$cat->id ? 'selected' : '' }}>
                {{ $cat->name }}
              </option>
            @endforeach
          </select>
        </form>
      </div>

      <div class="col-md-4">
        <form action="{{ route('shop') }}" method="GET">
          <select name="sort" class="form-select" onchange="this.form.submit()">
            <option value="">Sort By</option>
            <option value="new" {{ request('sort')=='new' ? 'selected' : '' }}>Newest</option>
            <option value="lh" {{ request('sort')=='lh' ? 'selected' : '' }}>Price: Low to High</option>
            <option value="hl" {{ request('sort')=='hl' ? 'selected' : '' }}>Price: High to Low</option>
          </select>
        </form>
      </div>
    </div>

    <h2 class="mb-4">All Products</h2>

    <!-- Product Grid -->
    <div class="row g-4">
      @forelse($products as $product)
      <div class="col-md-3">
        <div class="product-card position-relative">

          <!-- Discount Badge -->
          @if($product->discount > 0)
          <span class="badge bg-danger position-absolute" style="top:10px; left:10px;">
            {{ $product->discount }}% OFF
          </span>
          @endif

          <img src="{{ asset('storage/'.$product->image) }}" alt="{{ $product->name }}" class="product-img">

          <div class="p-3">
            <h5>{{ $product->name }}</h5>

            <p class="m-0">
              @if($product->discount > 0)
                <span class="text-muted text-decoration-line-through">
                  Rs. {{ number_format($product->price, 2) }}
                </span>
                <span class="fw-bold">
                  Rs. {{ number_format($product->price - ($product->price * $product->discount / 100), 2) }}
                </span>
              @else
                <span class="fw-bold">
                  Rs. {{ number_format($product->price, 2) }}
                </span>
              @endif
            </p>

            <!-- Stock -->
            <p class="small {{ $product->stock > 0 ? 'text-success' : 'text-danger' }}">
              {{ $product->stock > 0 ? 'In Stock' : 'Out of Stock' }}
            </p>

            <a href="{{ route('product.show', $product->id) }}" class="btn btn-sm btn-primary w-100 mb-1">
              View
            </a>

            <a href="{{ route('cart.add', $product->id) }}"
               class="btn btn-sm btn-success w-100 {{ $product->stock == 0 ? 'disabled' : '' }}">
              Add to Cart
            </a>
          </div>
        </div>
      </div>
      @empty
        <p class="text-center">No products found.</p>
      @endforelse
    </div>

    <!-- Pagination -->
    <div class="mt-4">
      {{ $products->links() }}
    </div>

  </div>
</section>
@endsection

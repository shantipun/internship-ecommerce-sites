@extends('layouts.app')
@section('title', $product->name.' - ShopNepal')
@section('content')
<section class="py-5">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <img src="{{ asset('storage/'.$product->image) }}" class="img-fluid rounded" alt="{{ $product->name }}">
      </div>
      <div class="col-md-6">
        <h2>{{ $product->name }}</h2>
        <h4>Rs. {{ number_format($product->price, 2) }}</h4>
        <p>{{ $product->description ?? 'No description available.' }}</p>
        <a href="{{ route('cart.add', $product->id) }}" class="btn btn-success">Add to Cart</a>
      </div>
    </div>
  </div>
</section>
@endsection

@extends('layouts.app')
@section('title', 'Your Cart - ShopNepal')
@section('content')
<section class="py-5">
  <div class="container">
    <h2 class="mb-4">Shopping Cart</h2>
    <table class="table table-bordered bg-white shadow-sm rounded">
      <thead>
        <tr>
          <th>Product</th>
          <th>Price</th>
          <th>Quantity</th>
          <th>Total</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @forelse($cart as $item)
        <tr>
          <td>{{ $item->name }}</td>
          <td>Rs. {{ number_format($item->price, 2) }}</td>
          <td>{{ $item->quantity }}</td>
          <td>Rs. {{ number_format($item->price * $item->quantity, 2) }}</td>
          <td>
            <a href="{{ route('cart.remove', $item->id) }}" class="btn btn-sm btn-danger">Remove</a>
          </td>
        </tr>
        @empty
        <tr>
          <td colspan="5" class="text-center">Your cart is empty</td>
        </tr>
        @endforelse
      </tbody>
    </table>
    @if($cart->count() > 0)
      <a href="{{ route('checkout') }}" class="btn btn-primary">Proceed to Checkout</a>
    @endif
  </div>
</section>
@endsection

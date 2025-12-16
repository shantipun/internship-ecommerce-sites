@extends('layouts.app')
@section('title', 'Checkout - ShopNepal')
@section('content')

@auth
<section class="py-5">
  <div class="container">
    <h2 class="mb-4">Checkout</h2>
    <form action="{{ route('checkout.process') }}" method="POST">
      @csrf
      <div class="mb-3">
        <label>Name</label>
        <input type="text" name="name" class="form-control" value="{{ auth()->user()->name }}" required>
      </div>
      <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control" value="{{ auth()->user()->email }}" required>
      </div>
      <div class="mb-3">
        <label>Address</label>
        <textarea name="address" class="form-control" required></textarea>
      </div>
      <button type="submit" class="btn btn-success">Place Order</button>
    </form>
  </div>
</section>
@else
<section class="py-5 text-center">
  <div class="container">
    <h2>Please login to proceed to checkout</h2>
    <a href="{{ route('login') }}" class="btn btn-primary mt-3">Login</a>
  </div>
</section>
@endauth

@endsection

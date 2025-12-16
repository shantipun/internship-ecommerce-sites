@extends('layouts.app')

@section('title', 'Thank You')

@section('content')
<section class="py-5 text-center">
    <div class="container">
        <h2 class="mb-4 text-success">Thank You for Your Order!</h2>
        <p>Your order has been successfully placed.</p>

        <a href="{{ route('home') }}" class="btn btn-primary mt-3">Go to Home</a>
    </div>
</section>
@endsection

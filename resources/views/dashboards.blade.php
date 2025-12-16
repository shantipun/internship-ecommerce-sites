@extends('layouts.app')

@section('title', 'Dashboard - ShopNepal')

@section('content')
<section class="py-5">
    <div class="container">
        <h2 class="mb-4">Welcome, {{ $user->name }}!</h2>

        <!-- User Info -->
        <div class="card mb-4">
            <div class="card-header">
                Your Profile
            </div>
            <div class="card-body">
                <p><strong>Name:</strong> {{ $user->name }}</p>
                <p><strong>Email:</strong> {{ $user->email }}</p>
                <a href="{{ route('profile.edit') }}" class="btn btn-primary">Edit Profile</a>
            </div>
        </div>

        <!-- Orders -->
        <div class="card">
            <div class="card-header">
                Your Orders
            </div>
            <div class="card-body">
                @if($orders->isEmpty())
                    <p>You have not placed any orders yet.</p>
                @else
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th>Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <td>{{ $order->id }}</td>
                                    <td>${{ number_format($order->total, 2) }}</td>
                                    <td>{{ ucfirst($order->status) }}</td>
                                    <td>{{ $order->created_at->format('d M, Y') }}</td>
                                    <td>
                                        @if($order->status == 'pending')
                                            <span class="text-warning">Processing</span>
                                        @else
                                            <span class="text-success">Completed</span>
                                        @endif
                                        <a href="{{ route('orders.thankyou') }}" class="btn btn-sm btn-info">View</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection

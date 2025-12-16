@extends('layouts.app')
@section('title', 'Orders - ShopNepal')
@section('content')
<div class="container py-5">
    <h2 class="mb-4">All Orders</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>User</th>
                <th>Total</th>
                <th>Status</th>
                <th>Items</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->user->name }}</td>
                <td>Rs. {{ number_format($order->total, 2) }}</td>
                <td>{{ ucfirst($order->status) }}</td>
                <td>
                    @foreach($order->items as $item)
                        {{ $item->product->name }} (x{{ $item->quantity }})<br>
                    @endforeach
                </td>
                <td>{{ $order->created_at->format('d M Y') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

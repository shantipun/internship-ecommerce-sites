<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    // Show all orders (for admin) or current user's orders
    public function index()
    {
        // For admin: show all orders
        if (Auth::user() && Auth::user()->is_admin) {
            $orders = Order::with('user', 'items.product')->latest()->get();
        } else {
            // For normal users: only their orders
            $orders = Order::with('items.product')
                           ->where('user_id', Auth::id())
                           ->latest()
                           ->get();
        }

        return view('orders.index', compact('orders'));
    }

    // Dashboard view with orders (for admin)
    public function dashboard()
    {
        // Fetch all orders for admin dashboard
        $orders = Order::with('user', 'items.product')->latest()->get();

        return view('dashboard', compact('orders'));
    }

    // Store a new order (checkout)
    public function store(Request $request)
    {
        $cart = session()->get('cart', collect());

        if ($cart->isEmpty()) {
            return redirect()->back()->with('error', 'Your cart is empty.');
        }

        $total = $cart->sum(fn($item) => $item->price * $item->quantity);

        $order = Order::create([
            'user_id' => Auth::id(),
            'total' => $total,
            'status' => 'pending',
        ]);

        foreach ($cart as $id => $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $id,
                'quantity' => $item->quantity,
                'price' => $item->price,
            ]);
        }

        session()->forget('cart');

        return redirect()->route('orders.thankyou');
    }

    // Thank you page after order
    public function thankyou()
    {
        return view('orders.thankyou');
    }
}

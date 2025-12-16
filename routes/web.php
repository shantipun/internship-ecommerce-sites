<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Models\Product;
use App\Http\Controllers\CategoryController;

// ----------------------
// Public Routes
// ----------------------

// Home Page
Route::get('/', function () {
    $products = Product::take(8)->get();
    return view('home', compact('products'));
})->name('home');

// Shop Page
Route::get('/shop', [ShopController::class, 'index'])->name('shop');

// Product Detail
Route::get('/product/{id}', function ($id) {
    $product = Product::findOrFail($id);
    return view('product', compact('product'));
})->name('product.show');

// Cart Routes
Route::get('/cart', function () {
    $cart = session()->get('cart', collect());
    return view('cart', compact('cart'));
})->name('cart');

Route::get('/cart/add/{id}', function ($id) {
    $product = Product::findOrFail($id);
    $cart = session()->get('cart', collect());
    $cart->put($id, (object)[
        'id' => $product->id,
        'name' => $product->name,
        'price' => $product->price,
        'quantity' => ($cart->get($id)->quantity ?? 0) + 1
    ]);
    session(['cart' => $cart]);
    return redirect()->back();
})->name('cart.add');

Route::get('/cart/remove/{id}', function ($id) {
    $cart = session()->get('cart', collect());
    $cart->forget($id);
    session(['cart' => $cart]);
    return redirect()->back();
})->name('cart.remove');

// ----------------------
// Authentication Routes
// ----------------------

// Show login form
Route::get('/login', [AuthenticatedSessionController::class, 'create'])
    ->name('login');

// Login POST
Route::post('/login', [AuthenticatedSessionController::class, 'store'])
    ->name('login.store');

// Logout (protected by auth)
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->name('logout')
    ->middleware('auth');

// ----------------------
// Auth Protected Routes
// ----------------------
Route::middleware('auth')->group(function () {

    // Checkout
    Route::get('/checkout', function () {
        return view('checkout');
    })->name('checkout');

    Route::post('/checkout', [OrderController::class, 'store'])
        ->name('checkout.process');

    // Orders
    Route::get('/orders', [OrderController::class, 'index'])
        ->name('orders.index');

    Route::get('/orders/thankyou', [OrderController::class, 'thankyou'])
        ->name('orders.thankyou');

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Admin: Products & Customers CRUD
    Route::resource('products', ProductController::class);
    Route::resource('customers', CustomerController::class);

    // Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/dashboard', [OrderController::class, 'dashboard'])->name('dashboard');
    Route::resource('categories', CategoryController::class);
});

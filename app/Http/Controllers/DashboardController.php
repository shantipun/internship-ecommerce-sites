<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user(); // get logged-in user
        // You can also fetch orders or cart info
        $orders = $user->orders ?? []; // assuming you have orders relationship
        return view('dashboard', compact('user', 'orders'));
    }
}

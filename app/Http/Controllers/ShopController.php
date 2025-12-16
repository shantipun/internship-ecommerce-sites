<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ShopController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query();

        // Search
        if ($request->search) {
            $query->where('name', 'LIKE', '%' . $request->search . '%');
        }

        // Category
        if ($request->category) {
            $query->where('category_id', $request->category);
        }

        // Sorting
        if ($request->sort == 'new') {
            $query->latest();
        } elseif ($request->sort == 'lh') {
            $query->orderBy('price', 'asc');
        } elseif ($request->sort == 'hl') {
            $query->orderBy('price', 'desc');
        }

        $products = $query->paginate(12);
        $categories = Category::all();

        return view('shop', compact('products', 'categories'));
    }
}

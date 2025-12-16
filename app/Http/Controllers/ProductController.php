<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;


class ProductController extends Controller
{
    public function index() {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function create() {
        $categories = Category::all(); // fetch all categories
        return view('products.create', compact('categories'));
    }

    public function store(Request $request) {
        $data = $request->only(['name','price','stock','category_id']);

        if($request->hasFile('image')){
            $file = $request->file('image')->store('products','public'); // store in storage/app/public/products
            $data['image'] = $file;
        }

        Product::create($data);
        return redirect()->route('products.index')->with('success','Product added successfully.');
    }

    public function edit(Product $product) {
        $categories = Category::all();
        return view('products.edit', compact('product', 'categories'));
    }
    public function update(Request $request, Product $product) {
        $data = $request->only(['name','price','stock']);

        if($request->hasFile('image')){
            $file = $request->file('image')->store('products','public');
            $data['image'] = $file;
        }

        $product->update($data);
        return redirect()->route('products.index')->with('success','Product updated successfully.');
    }

    public function destroy(Product $product) {
        if($product->image){
            \Storage::disk('public')->delete($product->image);
        }
        $product->delete();
        return redirect()->route('products.index')->with('success','Product deleted successfully.');
    }


}

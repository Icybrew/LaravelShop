<?php

namespace shop\Http\Controllers;

use shop\Product;

class ProductsController extends Controller
{

    public function index() {
        return redirect()->route('categories.index');
    }
    
    public function show($id) {
        $product = Product::findOrFail($id);
        return view('shop.product.index', compact('product'));
    }
    
}

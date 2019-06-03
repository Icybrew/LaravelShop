<?php

namespace shop\Http\Controllers;

use shop\Product;

class HomeController extends Controller
{

    public function index()
    {
        $products = Product::orderBy('id', 'desc')->take(config('shop.index.products', 9))->get();
        return view('shop.home', compact('products'));
    }

}

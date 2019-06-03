<?php

namespace shop\Http\Controllers;

use shop\ProductCategory;
use shop\Product;

class CategoriesController extends Controller
{
    
    public function index()
    {
        $categories = ProductCategory::paginate(config('shop.categories.perPage', 3));
        return view('shop.categories.index', compact('categories'));

    }
    
    public function show($id) {
        $products = Product::where('category_id', $id)->paginate(config('shop.products.perPage', 9));
        return view('shop.categories.category', compact('products'));
    }
    
}

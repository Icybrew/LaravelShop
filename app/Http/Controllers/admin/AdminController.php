<?php

namespace shop\Http\Controllers\Admin;

use shop\Http\Controllers\Controller;
use Illuminate\Http\Request;

use shop\ProductCategory;
use shop\Product;
use shop\User;

class AdminController extends Controller
{
    
    public function index() {
        $total_categories = ProductCategory::all()->count();
        $total_products = Product::all()->count();
        $total_users = User::all()->count();

        $total = (object) ['categories' => $total_categories, 'products' => $total_products, 'users' => $total_users];

        return view('admin.index', compact('total'));
    }
    
}

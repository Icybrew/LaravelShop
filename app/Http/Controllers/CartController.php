<?php

namespace shop\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use shop\Product;

class CartController extends Controller
{

    public function index() {
        $products = Session::get('cart');
        return view('shop.cart.index', compact('products'));
    }
    
    public function store(Request $request) {

        $request->validate([
            'product' => 'required|integer|min:1',
            'quantity' => 'required|integer|min:1|max:' . config('shop.cart.maxOfItem')
        ]);

        $product = Product::find($request->product);
        $errors = new \Illuminate\Support\MessageBag();

        if ($product != NULL) {
            $cart = Session::get('cart');
            
            if (!is_array($cart)) {
                $cart = array();
            }
            
            if (count($cart) < config('shop.cart.maxOfItems')) {
                $product['quantity'] = $request->quantity;
                array_push($cart, $product);
                Session::put('cart', $cart);
                return redirect()->route('cart.index')->with('success', __('cart.success.add'));
            } else {
                $errors->add('Error', __('cart.error.limit'));
                return redirect()->route('cart.index')->withErrors($errors);
            }
        } else {
            $errors->add('Error', 'Invalid product given');
            return redirect()->route('cart.index')->withErrors($errors);
        }

    }
    
    public function destroy(Request $request) {

        $cart = session('cart');
        
        $request->validate([
            'product' => 'required|integer|min:0|max:' . (count($cart) - 1)
        ]);
        
        $product = Session::get('cart')[$request->product];

        if ($product != NULL) {
            unset($cart[$request->product]);
            session(['cart' => array_values($cart)]);
            return redirect()->route('cart.index')->with('success', __('cart.success.remove'));
        } else {
            $errors = new \Illuminate\Support\MessageBag();
            $errors->add('404', 'Invalid product given');
            return redirect()->route('cart.index')->withErrors($errors);
        }

    }
}

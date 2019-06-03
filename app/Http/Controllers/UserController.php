<?php

namespace shop\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Hash;
use shop\User;

class UserController extends Controller
{

    public function index()
    {

        if (Auth::check()) {
            $user = auth()->user();
            return view('shop.profile.index', compact('user'));
        } else {
            return redirect('login');
        }

    }

    public function show($id) {
        $user = User::findOrFail($id);
        return view('shop.profile.profile', compact('user'));
    }

    public function edit() {
        $user = auth()->user();
        return view('shop.profile.edit', compact('user'));
    }
    
    public function update(Request $request)
    {

        $errors = new MessageBag();

        $validator = Validator::make($request->all(), [
            'username' => 'required|string|min:' . config('shop.user.minUsernameLength') . '|max:' . config('shop.user.maxUsernameLength')
        ]);

        if (!$validator->fails()) {
            
            if (Hash::check($request->password, auth()->user()->password)) {
                
                $request->user()->update([
                    'name' => $request->username
                ]);
                
                return redirect()->route('profile.index')->with('success', 'Profile has been updated');
            } else {
                
                $errors->add('password', 'Wrong password');
                return redirect()->route('profile.edit')->withErrors($errors)->withInput();
            }
            
        } else {
            return redirect()->route('profile.edit')->withErrors($validator)->withInput();
        }
        
    }

}

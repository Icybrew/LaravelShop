<?php

namespace shop\Http\Controllers\Admin;

use shop\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Hash;

use shop\User;

class UsersController extends Controller
{
    
    public function index() {
        $users = User::paginate(9);
        return view('admin.users.index', compact('users'));
    }
    
    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:' . config('shop.user.minUsernameLength') . '|max:' . config('shop.user.maxUsernameLength'),
            'email' => 'required|string|unique:users',
            'password' => 'required|string|min:'. config('shop.user.minPasswordLength') . '|max:' . config('shop.user.maxPasswordLength') . '|confirmed'
        ]);

        if (User::where('email', $request->email)->first() === NULL) {

            $user = new User;

            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);

            try {
                $user->save();
                return redirect()->route('admin.users.index')->with('success', __('admin.users.create.success'));
            } catch (\Exception $ex) {
                return redirect()->route('admin.users.create')->withErrors(new MessageBag(['Create user error']))->withInput();
            }

        } else {
            return redirect()->route('admin.users.create')->withErrors(new MessageBag([__('admin.users.create.duplicate')]))->withInput();
        }
        
    }

    public function show($id)
    {
        $user = User::find($id);

        if ($user !== NULL) {
            return view('admin.users.user', compact('user'));
        } else {
            return abort(404);
        }

    }

    public function edit($id)
    {
        $user = User::find($id);
        if ($user !== NULL) {
            return view('admin.users.edit', compact('user'));
        } else {
            return redirect()->route('admin.users.index')->withErrors(new MessageBag([__('admin.users.404')]));
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|min:' . config('shop.user.minUsernameLength') . '|max:' . config('shop.user.maxUsernameLength'),
            'email' => 'required|string',
            'password' => 'sometimes|nullable|string|min:'. config('shop.user.minPasswordLength') . '|max:' . config('shop.user.maxPasswordLength') . '|confirmed'
        ]);
        
        $user = User::find($id);
        
        if ($user !== NULL) {
            
            $user->name = $request->name;
            $user->email = $request->email;
            
            if ($request->password !== NULL) {
                $user->password = Hash::make($request->password);
            }

            try {
                $user->save();
                return redirect()->route('admin.users.index')->with('success', __('admin.users.edit.success'));
            } catch (\Exception $ex) {
                return redirect()->route('admin.users.index')->withErrors(new MessageBag(['Edit user error']))->withInput();
            }
            
        } else {
            return redirect()->route('admin.users.index')->withErrors(new MessageBag([__('admin.users.404')]));
        }
        
    }

    public function destroy($id)
    {
        $user = User::find($id);
        
        if ($user !== NULL) {
            $this->authorize('destroy', $user);
            return redirect()->route('admin.users.index')->with('success', __('admin.users.destroy.success'));
        } else {
            return redirect()->route('admin.users.index')->withErrors(new MessageBag([__('admin.users.404')]));
        }
        
    }
    
}

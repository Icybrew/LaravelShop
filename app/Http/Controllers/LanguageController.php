<?php

namespace shop\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{

    public function change(Request $request)
    {

        $request->validate([
            'lang' => 'required|string'
        ]);

        if (Session::has('lang')) {
            Session::put('lang', $request->lang);
        } else {
            session(['lang' => $request->lang]);
        }

        return back()->with('success', 'Language changed');
    }

}

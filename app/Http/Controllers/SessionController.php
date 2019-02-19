<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function create()
    {
        return view('login');
    }
    public function store(Request $request)
    {
        $credentials = $request->only('login', 'password');
        if (auth()->attempt($credentials)) {
            if (auth()->user()->hasChosenRole()) {
                return redirect('/dashboard');
            }
            else {
                return redirect('/profile');
            }
        }
        else {
            return back();
        }
    }
}

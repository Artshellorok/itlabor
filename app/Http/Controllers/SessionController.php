<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    function __construct()
    {
        $this->middleware('guest')->except('destroy');
    }
    public function create()
    {
        return view('login');
    }
    public function store(Request $request)
    {
        $credentials = $request->only('login', 'password');
        if (auth()->attempt($credentials)) {
            if (auth()->user()->role()) {
                return redirect('/dashboard');
            } else {
                return redirect('/profile');
            }
        } else {
            return back();
        }
    }
    public function destroy()
    {
        auth()->logout();
        return redirect('/login');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ActionsController extends Controller
{
    function __construct()
    {
        $this->middleware(["web", "role"]);
    }
    public function index()
    {
        return view('dashboard');
    }
}

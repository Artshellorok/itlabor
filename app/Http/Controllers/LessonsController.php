<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Lesson;
class LessonsController extends Controller
{
    function __construct()
    {
        $this->middleware(['auth:web', 'role']);
    }
    public function index()
    {
        if (auth()->roleOr('teacher', 'student')) {
            $lessons = Lesson::latest()->get();
        }
        if (auth()->role('ancestor')) {
            $paid = Lesson::all();
        }
        return view('lessons.index', compact('lessons', 'paid'));
    }
    public function create()
    {
        return view('lessons.create');
    }
}

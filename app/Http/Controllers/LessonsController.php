<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Lesson;
class LessonsController extends Controller
{
    function __construct()
    {
        $this->middleware(['auth:web', 'role']);
        $this->middleware(['role:teacher'])->only(['create', 'store']);
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
    public function show(Lesson $lesson)
    {
        return view('lessons.show')->with('lesson', $lesson);
    }
    public function create()
    {
        $roles = \App\Role::all();
        return view('lessons.create', compact('roles'));
    }
    public function store(Request $request)
    {
        
        auth()->user()->teacher->lessons()->create(
            [
                'name' => $request->name,
                'description' => $request->description,
                'date' => $request->date,
            ]
        );

        return redirect('/lessons');
    }
}

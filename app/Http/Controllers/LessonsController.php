<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Lesson;
use \App\Http\Requests\CreateLessonRequest;
class LessonsController extends Controller
{
    function __construct()
    {
        $this->middleware(['auth:web', 'role']);
        $this->middleware(['role:teacher'])->only(['create', 'store']);
    }
    public function index()
    {
        $lessons = Lesson::latest()->get();
        return view('lessons.index', compact('lessons'));
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
    public function store(CreateLessonRequest $request)
    {
        $request->persist();
        return redirect('/lessons');
    }
}

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
        return view('lessons.index', compact('lessons', 'materials'));
    }
    public function show(Lesson $lesson)
    {
        $materials = ['assets', 'programs', 'videos'];
        $viewables = collect([]);
        foreach ($materials as $material) {
            foreach ($lesson->$material as $materialC) {
                if
            }
            if (auth()->roleOr(...$lesson->$material->roles())) {
                $viewables->push($lesson->$material);
            }
        }
        return view('lessons.show', compact('lesson', 'viewables'));
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

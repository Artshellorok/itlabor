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
        $lesson_materials = ['assets', 'programs', 'videos'];
        $viewables = collect([]);
        foreach ($lesson_materials as $lesson_material) {
            foreach ($lesson->$lesson_material as $material) {
                if (auth()->roleOr(...$material->roles->pluck('role'))) {
                    $viewables->push($material);
                }
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

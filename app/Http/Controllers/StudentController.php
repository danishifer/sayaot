<?php

namespace App\Http\Controllers;

use App\Models\Assistant;
use App\Models\Homeroom;
use App\Models\Student;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Inertia\Inertia;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::with([
            'regularAssistants.user:id,first_name,last_name',
            'homeroom:id,name'
        ])->get()->sortBy(['homeroom.name', 'initials'])->values()->all();

        return Inertia::render('Student/Index', compact('students'));
    }

    public function show($studentId)
    {
        $student = Student::with([
            'regularAssistants:id,user_id',
            'regularAssistants.user:id,first_name,last_name'
        ])->find($studentId);

        $assistants = Assistant::get();
        $homerooms = Homeroom::get()->map->append('code');

        return Inertia::render('Student/Show', compact('student', 'assistants', 'homerooms'));
    }

    public function create()
    {
        $assistants = Assistant::get();
        $homerooms = Homeroom::get()->map->append('code');

        return Inertia::render('Student/Create', compact('assistants', 'homerooms'));
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'homeroom' => ['required', 'exists:homerooms,id'],
            'initials' => ['required', 'max:4',
                Rule::unique('students')->where(function ($query) use ($request) {
                    return $query
                        ->whereInitials($request->initials)
                        ->whereHomeroomId($request->homeroom);
                }),
            ],
            'assistants' => ['array', 'exists:assistants,id']
        ]);


        return DB::transaction(function () use ($attributes) {
            $homeroom = Homeroom::find($attributes['homeroom']);

            $student = Student::create([
                'initials' => $attributes['initials'],
                'homeroom_id' => $attributes['homeroom'],
                'code' => $homeroom->code . $attributes['initials'],
            ]);

            $student->regularAssistants()->attach($attributes['assistants']);

            return redirect(route('students'));
        });
    }

    public function update(Request $request, Student $student)
    {
        $attributes = $request->validate([
            'homeroom' => ['required', 'exists:homerooms,id'],
            'initials' => ['required', 'max:4',
                Rule::unique('students')->ignore($student->id)->where(function ($query) use ($request) {
                    return $query
                        ->whereInitials($request->initials)
                        ->whereHomeroomId($request->homeroom);
                }),
            ],
            'assistants' => ['array', 'exists:assistants,id']
        ]);

        return DB::transaction(function () use ($student, $attributes) {
            $homeroom = Homeroom::find($attributes['homeroom']);

            $student->update([
                'initials' => $attributes['initials'],
                'homeroom_id' => $attributes['homeroom'],
                'code' => $homeroom->code . $attributes['initials'],
            ]);

            $student->regularAssistants()->sync($attributes['assistants']);

            return redirect(route('students'));
        });
    }
}

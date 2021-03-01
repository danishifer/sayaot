<?php

namespace App\Http\Controllers;

use App\Models\Assistant;
use App\Models\Position;
use App\Models\Program;
use App\Models\Strength;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Inertia\Inertia;
use Inertia\Response;

class AssistantController extends Controller
{
    public function index(): Response
    {
        $assistants = Assistant::with(['user', 'position:id,name', 'programs:name', 'regularStudents:code'])->get();
        $positions = Position::all();

        return Inertia::render('Assistant/Index', [
            'assistants' => $assistants,
            'positions' => $positions,
        ]);
    }

    public function show($assistantId)
    {
        $assistant = Assistant::with(['user', 'programs:id,name', 'strengths:id,name', 'regularStudents:id,code'])
            ->find($assistantId);
        $positions = Position::all();
        $programs = Program::latest()->get();
        $strengths = Strength::all();
        $students = Student::all();

        return Inertia::render('Assistant/Show', [
            'assistant' => $assistant,
            'positions' => $positions,
            'programs' => $programs,
            'strengths' => $strengths,
            'students' => $students
        ]);
    }

    public function create()
    {
        $programs = Program::latest()->get();
        $positions = Position::all();
        $strengths = Strength::all();
        $students = Student::all();

        return Inertia::render('Assistant/Create', [
            'programs' => $programs,
            'strengths' => $strengths,
            'students' => $students,
            'positions' => $positions
        ]);
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'firstName' => ['required', 'min:2', 'max:20'],
            'lastName' => ['required', 'min:2', 'max:20'],
            'email' => ['required', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'phone_number', 'unique:users'],
            'position' => ['required', 'exists:positions,id'],
            'programs' => ['array', 'exists:programs,id'],
            'strengths' => ['array', 'exists:strengths,id'],
            'students' => ['array', 'exists:students,id']
        ]);

        return DB::transaction(function () use ($attributes) {
            $user = User::create([
                'first_name' => $attributes['firstName'],
                'last_name' => $attributes['lastName'],
                'email' => $attributes['email'],
                'phone' => $attributes['phone']
            ]);

            $assistant = Assistant::create([
                'user_id' => $user->id,
                'position_id' => $attributes['position'],
                'status' => 'Free'
            ]);

            $assistant->programs()->attach($attributes['programs']);
            $assistant->strengths()->attach($attributes['strengths']);
            $assistant->regularStudents()->attach($attributes['students']);

            return redirect(route('assistants'));
        });
    }

    public function update(Request $request, Assistant $assistant)
    {
        $uniqueRule = Rule::unique('users')->ignore($assistant->user_id);

        $attributes = $request->validate([
            'firstName' => ['required', 'min:2', 'max:20'],
            'lastName' => ['required', 'min:2', 'max:20'],
            'email' => ['required', 'email', 'max:255', $uniqueRule],
            'phone' => ['required', 'phone_number', $uniqueRule],
            'position' => ['required', 'exists:positions,id'],
            'programs' => ['array', 'exists:programs,id'],
            'strengths' => ['array', 'exists:strengths,id'],
            'students' => ['array', 'exists:students,id']
        ]);

        return DB::transaction(function () use ($assistant, $attributes) {
            $assistant->update([
                'position_id' => $attributes['position'],
            ]);

            $assistant->user()->update([
                'first_name' => $attributes['firstName'],
                'last_name' => $attributes['lastName'],
                'email' => $attributes['email'],
                'phone' => $attributes['phone']
            ]);

            $assistant->programs()->sync($attributes['programs']);
            $assistant->strengths()->sync($attributes['strengths']);
            $assistant->regularStudents()->sync($attributes['students']);

            return redirect(route('assistants'));
        });
    }
}

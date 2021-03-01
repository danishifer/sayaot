<?php

use App\Http\Controllers\AssistantController;
use App\Http\Controllers\HomeroomController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\StudentController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    Route::get('/assistants', [AssistantController::class, 'index'])->name('assistants');
    Route::get('/assistants/add', [AssistantController::class, 'create'])->name('assistants.create');
    Route::post('/assistants', [AssistantController::class, 'store']);

    Route::get('/assistants/{assistant}', [AssistantController::class, 'show'])->name('assistant');
    Route::put('/assistants/{assistant}', [AssistantController::class, 'update']);


    Route::get('/students', [StudentController::class, 'index'])->name('students');
    Route::get('/students/add', [StudentController::class, 'create'])->name('students.create');
    Route::post('/students', [StudentController::class, 'store']);

    Route::get('/students/{student}', [StudentController::class, 'show'])->name('student');
    Route::put('/students/{student}', [StudentController::class, 'update']);

    Route::get('/schedules', [ScheduleController::class, 'index'])->name('schedules');
    Route::get('/schedules/{homeroom}', [ScheduleController::class, 'show'])->name('schedule');

    Route::get('/settings', function () {
        return "settings";
    })->name('settings');
});

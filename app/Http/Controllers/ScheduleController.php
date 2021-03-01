<?php

namespace App\Http\Controllers;

use App\Models\Homeroom;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ScheduleController extends Controller
{
    public function index()
    {
        $homerooms = Homeroom::with(['grade:id,name,number', 'students:homeroom_id'])->get()->map->append('code');

        return Inertia::render('Schedule/Index', compact('homerooms'));
    }

    public function show(Homeroom $homeroom)
    {
        return Inertia::render('Schedule/Show', compact('homeroom'));
    }
}

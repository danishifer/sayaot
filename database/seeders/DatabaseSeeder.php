<?php

namespace Database\Seeders;

use App\Models\Assistant;
use App\Models\Grade;
use App\Models\Homeroom;
use App\Models\Position;
use App\Models\Program;
use App\Models\Strength;
use App\Models\Student;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Strength::insert([
            ['name' => 'Math'],
            ['name' => 'English'],
            ['name' => 'Literature'],
            ['name' => 'History'],
            ['name' => 'Physics'],
            ['name' => 'Hebrew'],
        ]);

        Position::insert([
            ['name' => 'Individual'],
            ['name' => 'Reinforcing']
        ]);
        $position = Position::create(['name' => 'National Service']);

        $grade = Grade::create(['number' => 11, 'name' => '11th Grade']);
        $homeroom = Homeroom::create(['grade_id' => $grade->id, 'number' => 1, 'name' => '11th / 1']);
        $student = Student::create(['initials' => 'SI', 'code' => '105SI', 'homeroom_id' => $homeroom->id]);

        $grade2 = Grade::create(['number' => 12, 'name' => '12th Grade']);
        $homeroom2 = Homeroom::create(['grade_id' => $grade2->id, 'number' => 5, 'name' => '12th / 5']);
        Student::insert([
            ['initials' => 'NG', 'code' => '125NG', 'homeroom_id' => $homeroom2->id],
            ['initials' => 'YY', 'code' => '125YY', 'homeroom_id' => $homeroom2->id]
        ]);

        Program::insert([
            ['name' => 'PELE', 'description' => 'New immigrants assistance program.'],
            ['name' => 'Ivrit', 'description' => 'The accelerated Hebrew program.']
        ]);

        $user = User::create(['first_name' => 'Yonit', 'last_name' => 'Levy', 'email' => 'yonitlevy@sayaot.app', 'phone' => '+972555555555']);
        $assistant = Assistant::create([
            'user_id' => $user->id,
            'position_id' => $position->id,
            'status' => 'In Lesson',
        ]);

        $assistant->regularStudents()->save($student);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assistant extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $appends = ["name"];

    public function getNameAttribute()
    {
        if ($this->user) {
            return $this->user->first_name . " " . $this->user->last_name;
        }
        return null;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function position()
    {
        return $this->belongsTo(Position::class);
    }

    public function programs()
    {
        return $this->belongsToMany(Program::class);
    }

    public function regularStudents()
    {
        return $this->belongsToMany(Student::class, 'assistant_regular_student');
    }

    public function strengths()
    {
        return $this->belongsToMany(Strength::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Homeroom extends Model
{
    use HasFactory;

    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }

    public function getCodeAttribute(): string
    {
        return $this->grade->number . $this->number;
    }

    public function students()
    {
        return $this->hasMany(Student::class);
    }
}

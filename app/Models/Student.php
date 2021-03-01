<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function regularAssistants()
    {
        return $this->belongsToMany(Assistant::class, 'assistant_regular_student');
    }

    public function homeroom()
    {
        return $this->belongsTo(Homeroom::class);
    }
}

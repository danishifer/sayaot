<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Strength extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function assistants()
    {
        return $this->belongsToMany(Assistant::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    /** @use HasFactory<\Database\Factories\LevelFactory> */
    use HasFactory, HasUuids;

    // each levels depends or belongs to a course
    public function courses()
    {
        return $this->belongsTo(Course::class);
    }

     // Level has many student level
    public function studentLevel()
    {
        return $this->hasMany(StudentLevel::class);
    }

     // Level has many subjects 
    public function subject()
    {
        return $this->hasMany(Subject::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentLevel extends Model
{
    /** @use HasFactory<\Database\Factories\StudentLevelFactory> */
    use HasFactory, HasUuids;

    //student level belongs to students
    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    //student level belongs to level
    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    //student level belongs to school year
    public function year()
    {
        return $this->belongsTo(SchoolYear::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrollement extends Model
{
    /** @use HasFactory<\Database\Factories\EnrollementFactory> */
    use HasFactory, HasUuids;

    // enrollement belongs to students
    public function students()
    {
        return $this->belongsTo(Student::class);
    }    

    // enrollement belongs to subjects
    public function subjects()
    {
        return $this->belongsTo(Subject::class);
    }    

    // student can enroll many time
    public function enrolled()
    {
        return $this->hasMany(Enrollement::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'student_id', 'course_id', 'lecturer_id', 'score', 'remarks',
    ];

    // Grade belongs to a student
    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    // Grade belongs to a course
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    // Grade is given by a teacher (User)
    public function lecturer()
    {
        return $this->belongsTo(Lecturer::class);
    }
}

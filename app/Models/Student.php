<?php

namespace App\Models;

use Database\Factories\EnrollementFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;


class Student extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'first_name', 'last_name', 'email', 'birthday', 'phone','gender', 'course_id', 'photo',
    ];

    // Student belongs to a course
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    // Student has many grades
    public function grades()
    {
        return $this->hasMany(Grade::class);
    }

     // Student has many student level
    public function studentLevel()
    {
        return $this->hasMany(StudentLevel::class);
    }

    // Student has many enrollement
    public function enrollement()
    {
        return $this->hasMany(Enrollement::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    /** @use HasFactory<\Database\Factories\DepartmentFactory> */
    use HasFactory, HasUuids;

    // Department has many courses
    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    // Department has many lecturers
    public function lecturers()
    {
        return $this->hasMany(Lecturer::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'name', 'description',
    ];

    // Course has many students
    public function students()
    {
        return $this->hasMany(Student::class);
    }

    // Course has many levels
    public function levels()
    {
        return $this->hasMany(Level::class);
    }

    // Course is in a departmentsubjects
    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}

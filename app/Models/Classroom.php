<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'name', 'description',
    ];

    // Classroom has many students
    public function students()
    {
        return $this->hasMany(Student::class, 'class_id');
    }
}

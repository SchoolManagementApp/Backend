<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;


class Student extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'first_name', 'last_name', 'email', 'birthday', 'phone','gender', 'class_id', 'photo',
    ];

    // Student belongs to a classroom
    public function classroom()
    {
        return $this->belongsTo(Classroom::class, 'class_id');
    }

    // Student has many grades
    public function grades()
    {
        return $this->hasMany(Grade::class);
    }
}

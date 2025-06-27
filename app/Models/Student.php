<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    /** @use HasFactory<\Database\Factories\StudentFactory> */
    use HasFactory, HasUuids;
    protected $keyType = 'string';
    public $incrementing = false;
    protected $fillable = ["first_name", "last_name", "email", "birthday", "phone", "gender", 'course_id'];

    public function course()
    {
       return $this->belongsTo(Course::class);
    }

    public function grades()
    {
        return $this->belongsTo(Grade::class);
    }
}

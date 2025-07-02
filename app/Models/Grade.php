<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'enrollement_id', 'lecturer_subject_id', 'score', 'remarks'
    ];

    // Grade belongs to a enrolled student
    public function studentEnrolled()
    {
        return $this->belongsTo(Enrollement::class);
    }


    // Grade belongs to a subject given by teacher (User)
    public function lectureSubject()
    {
        return $this->belongsTo(LecturerSubject::class);
    }
}

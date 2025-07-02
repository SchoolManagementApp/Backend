<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LecturerSubject extends Model
{
    /** @use HasFactory<\Database\Factories\LecturerSubjectFactory> */
    use HasFactory, HasUuids;

    // subject is given by a lecturer
    public function lecturer()
    {
        return $this->belongsTo(Lecturer::class);
    }

    //lecturer gives a subject
    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
}

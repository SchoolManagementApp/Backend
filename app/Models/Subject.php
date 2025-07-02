<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'name', 'description',
    ];

    // Course has many grades
    public function grades()
    {
        return $this->hasMany(Grade::class);
    }

    // subject is in a level
    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    // subject has many enrollement
    public function enrollement()
    {
        return $this->hasMany(Enrollement::class);
    }

    // lecturer has many lecturer subjects
    public function lecturerSubject()
    {
        return $this->hasMany(LecturerSubject::class);
    }
}

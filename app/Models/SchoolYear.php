<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolYear extends Model
{
    /** @use HasFactory<\Database\Factories\SchoolYearFactory> */
    use HasFactory, HasUuids;

     // school year has many student level
    public function studentLevel()
    {
        return $this->hasMany(StudentLevel::class);
    }
}

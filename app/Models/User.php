<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable,HasUuids;

    protected $fillable = [
        'name', 'email', 'password', 'role',
    ];

    // A teacher has many grades given
    public function gradesGiven()
    {
        return $this->hasMany(Grade::class, 'lecturer_id');
    }
}

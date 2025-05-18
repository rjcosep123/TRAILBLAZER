<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Student extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'full_name',  // Matching your input field name
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentInfo extends Model
{
    protected $table = 'students'; // Or the actual name of your table in the DB

    protected $fillable = [
        'name',
        'student_id',
        'email',
        'id_image',
        'cor_image',
    ];
}

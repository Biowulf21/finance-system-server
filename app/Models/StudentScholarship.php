<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentScholarship extends Model
{
    use HasFactory;

    protected $table = 'finance_system_student_scholarship';

    protected $fillable = [
        'student_id',
        'scholarship_id'
    ];
}

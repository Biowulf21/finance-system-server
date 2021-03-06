<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'finance_system_student';

    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'lrn',
    ];
}

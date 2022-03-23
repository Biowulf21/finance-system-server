<?php

namespace App\Repositories\Student;

use App\Models\Student;

class StudentRepository implements StudentRepositoryInterface
{
    public function createStudent($data)
    {
        $student = new Student;

        $student->first_name = $data["first_name"];
        $student->middle_name = $data["middle_name"];
        $student->last_name = $data["last_name"];
        $student->lrn = $data["lrn"];

        $student->save();
    }
}

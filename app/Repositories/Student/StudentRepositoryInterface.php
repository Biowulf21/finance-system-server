<?php

namespace App\Repositories\Student;

use App\Repositories\Student\Request;

interface StudentRepositoryInterface
{
    public function createStudent($data);

    public function updateStudent($request, $id);
}

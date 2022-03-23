<?php

namespace App\Repositories\Scholarship;

use App\Models\Scholarship;

class ScholarshipRepository implements ScholarshipRepositoryInterface
{
    public function createScholarship($data)
    {
        $scholarship = new Scholarship;

        $scholarship->name = $data["name"];
        $scholarship->type = $data["type"];

        $scholarship->save();
    }
}

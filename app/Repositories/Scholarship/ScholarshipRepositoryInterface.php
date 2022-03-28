<?php

namespace App\Repositories\Scholarship;

interface ScholarshipRepositoryInterface
{
    public function createScholarship($data);

    public function updateScholarship($request, $id);
}

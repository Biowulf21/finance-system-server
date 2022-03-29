<?php

namespace App\Repositories\Scholarship;

use App\Models\Scholarship;
use Exception;

class ScholarshipRepository implements ScholarshipRepositoryInterface
{
    public function createScholarship($data)
    {
        $scholarship = new Scholarship;

        $scholarship->name = $data["name"];
        $scholarship->type = $data["type"];
        $scholarship->amount = $data["amount"];

        $scholarship->save();
    }
    public function updateScholarship($request, $id)
    {
        try {
            return $updatedScholarship = Scholarship::where('id', '=', $id)->update($request->all());
        } catch (Exception $e) {
            return response($e, 400);
        }

    public function getScholarships()
    {
        return Scholarship::all();
    }
}

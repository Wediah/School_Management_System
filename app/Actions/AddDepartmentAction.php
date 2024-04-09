<?php
namespace App\Actions;

use App\Http\Requests\StoreDepartmentRequest;
use App\Models\Department;

class AddDepartmentAction
{
    use ApiResponseHelpers;

    public function handle(StoreDepartmentRequest $request)
    {
        $request->validated($request->all());

        $department = Department::create([
            'name' => $request->name,
            'slug' => $request->slug,
        ]);

        return $this->respondWithSuccess([
            'department' => $department,
        ]);
    }
}

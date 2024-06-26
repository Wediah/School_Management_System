<?php
namespace App\Actions;

use App\Http\Requests\StoreDepartmentRequest;
use App\Models\Department;
use F9Web\ApiResponseHelpers;
use Illuminate\Http\JsonResponse;

class AddDepartmentAction
{
    use ApiResponseHelpers;

    public function handle(StoreDepartmentRequest $request): JsonResponse
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

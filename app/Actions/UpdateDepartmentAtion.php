<?php
namespace App\Actions;


use App\Http\Requests\UpdateDepartmentRequest;
use App\Models\Department;
use F9Web\ApiResponseHelpers;
use Illuminate\Validation\Rule;

class UpdateDepartmentAtion
{
    use ApiResponseHelpers;

    public function handle(Department $department)
    {
        $attributes = $this->validateDepartment($department);

        $department->update($attributes);

        return $this->respondWithSuccess([
            'department' => $department,
        ]);
    }

    protected function validateDepartment(?Department $department = null): array
    {
        $department ?? new Department();

        return request()->validate([
            'name' => 'required',
            'slug' => ['required', Rule::unique('departments', 'slug')->ignore($department)->ignore($department->id)],
        ]);
    }

}

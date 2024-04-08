<?php
namespace App\Actions;

use App\Http\Requests\StoreDepartmentRequest;
use App\Models\Department;
use F9Web\ApiResponseHelpers;
use Illuminate\Support\Facades\Hash;

class AddDepartmentAction
{
    use ApiResponseHelpers;

    public function handle(StoreDepartmentRequest $request)
    {
        $request->validated($request->all());

        $department = Department::created([

        ])
    }
}

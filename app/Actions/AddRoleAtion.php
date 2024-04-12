<?php
namespace app\Actions;

use App\Http\Requests\StoreRoleRequest;
use App\Models\Role;
use F9Web\ApiResponseHelpers;

class AddRoleAction
{
    use ApiResponseHelpers;

    public function handle(StoreRoleRequest $request)
    {
        $request->validated($request->all());

        $role = Role::create([
            'name' => $request->name,
            'slug' => $request->slug,
        ]);

        return $this->respondWithSuccess([
            'role' => $role,
        ]);
    }
}

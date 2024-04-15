<?php
namespace App\Actions;

use F9Web\ApiResponseHelpers;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;

class AddUserAction
{
    use ApiResponseHelpers;

    public function handle(StoreUserRequest $request): JsonResponse
    {
        $request->validated($request->all());

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'department_id' => $request->department_id,
            'program_id' => $request->program_id,
            'role_id' => $request->role_id,
            'status_id' => $request->status_id,
        ]);

        return  $this->respondWithSuccess([
            'user' => $user
        ]);
    }
}

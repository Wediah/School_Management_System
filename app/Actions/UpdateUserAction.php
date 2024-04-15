<?php
namespace App\Actions;

use F9Web\ApiResponseHelpers;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\Rule;


class UpdateUserAction
{
    use ApiResponseHelpers;

    public function handle(User $user): JsonResponse
    {
        $attributes = $this->validateUser($user);

        $user->update($attributes);

        return $this->respondWithSuccess([
            'user' => $user
        ]);
    }

    protected function validateUser(User $user = null): array
    {
        $user ?? new User();

        return request()->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'department_id' => ['required', Rule::exists('departments', 'id')],
            'program_id' => ['required', Rule::exists('programs', 'id')],
            'role_id' => ['required', Rule::exists('roles', 'id')],
            'status' => ['required', Rule::exists('statuses', 'id')],
        ]);
    }
}

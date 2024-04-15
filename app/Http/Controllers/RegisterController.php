<?php

namespace App\Http\Controllers;

use App\Actions\AddUserAction;
use App\Actions\UpdateUserAction;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        return response()->json([
            'status' => true,
            'data' => User::all(),
        ]);
    }
    public function store(StoreUserRequest $request, AddUserAction $action)
    {
        return $action->handle($request);
    }

    public function update(UpdateUserAction $action, User $user)
    {
        return $action->handle($user);
    }

    public function destroy(User $user)
    {
        $user->delete();

        return response()->json([
            'status' => true,
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Actions\LoginUserAction;
use App\Http\Requests\LoginUserRequest;


class SessionsController extends Controller
{
    public function store(LoginUserRequest $request, LoginUserAction $action)
    {
        return $action->handle($request);
    }

    public function destroy()
    {
        auth()->logout();

        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }
}

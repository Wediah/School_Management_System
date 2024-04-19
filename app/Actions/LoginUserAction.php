<?php
namespace App\Actions;

use App\Http\Requests\LoginUserRequest;
use App\Models\User;
use F9Web\ApiResponseHelpers;
use Illuminate\Support\Facades\Auth;

class LoginUserAction
{
    use ApiResponseHelpers;
    public function handle(LoginUserRequest $request)
    {
        $request->validated($request->all());

        if(!Auth::attempt($request->only(['email', 'password'])))
        {
            return $this->respondFailedValidation('credentials does not match');
        }

        session()->regenerate();
        $user = User::where('email', $request->email)->first();

        return $this->respondWithSuccess
        ([
            'user' => $user,
            'token' => $user->createToken('API token of ' . $user->name)->plainTextToken
        ]);
    }
}

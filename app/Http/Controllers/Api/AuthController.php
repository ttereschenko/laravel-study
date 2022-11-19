<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\User\SignInRequest;
use App\Http\Resources\UserResource;
use App\Services\UserService;

class AuthController extends Controller
{
    public function __construct(private UserService $userService)
    {
    }

    public function signIn(SignInRequest $request)
    {
        $credentials = $request->validated();

        $user = $this->userService->signIn($credentials, 'api', $request);

        if ($user) {
            session()->flash('success', "You're Signed In!");

            return new UserResource($user);
        }

        $data = [
            'message' => 'The provided credentials are incorrect',
        ];

        return response($data, 401);
    }
}

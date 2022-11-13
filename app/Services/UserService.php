<?php

namespace App\Services;

use App\Events\UserLoggedIn;
use App\Events\UserRegistered;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserService
{
    public function signUp(array $data): User
    {
        $user = new User($data);
        $user->save();

        $event = new UserRegistered($user);
        event($event);

        return $user;
    }

    public function signIn(array $credentials, string $guard, $request): ?User
    {
        if (Auth::guard($guard)->attemptWhen($credentials)) {
            $user = auth($guard)->user();
            $ipAddress = $request->ip();

            $event = new UserLoggedIn($user, $ipAddress);
            event($event);

            return $user;
        }

        return null;
    }
}

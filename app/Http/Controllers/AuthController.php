<?php

namespace App\Http\Controllers;

use App\Events\UserLoggedIn;
use App\Http\Requests\User\SignInRequest;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function __construct(private UserService $userService)
    {
    }

    public function signInForm()
    {
        return view('sign-in');
    }

    public function signIn(SignInRequest $request)
    {
        $credentials = $request->validated();

        $user = $this->userService->signIn($credentials, 'web', $request);

        if ($user) {
            session()->flash('success', "You're Signed In!");

            return redirect()->route('home');
        }

        session()->flash('error', 'The provided credentials are incorrect');

        return redirect()->route('sign-in.form');
    }

    public function signOut()
    {
        Auth::logout();

        session()->flash('success', "You're signed out of your account!");

        return redirect()->route('sign-in.form');
    }
}

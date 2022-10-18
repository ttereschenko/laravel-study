<?php

namespace App\Http\Controllers;

use App\Events\UserLoggedIn;
use App\Http\Requests\User\SignInRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function signInForm()
    {
        return view('sign-in');
    }

    public function signIn(SignInRequest $request)
    {
        $credentials = $request->validated();

//        $check = function ($user) {
//            return $user->email_verified_at !== null;
//        };

        if (Auth::attemptWhen($credentials)) {
            $user = auth()->user();
            $ipAddress = $request->ip();

            $event = new UserLoggedIn($user, $ipAddress);
            event($event);

            session()->flash('success', "You're Signed In!");

            return redirect()->route('home');
        }

        session()->flash('error', 'The provided credentials are incorrect');

        return redirect()->route('sign-in.form');
    }

    public function signOut()
    {
        Auth::logout();

//        session()->flash('success', "You're signed out of your account!");

        return redirect()->route('sign-in.form');
    }
}

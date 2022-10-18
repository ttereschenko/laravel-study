<?php

namespace App\Http\Controllers;

use App\Events\UserRegistered;
use App\Http\Requests\User\SignUpRequest;
use App\Mail\EmailConfirm;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use DateTime;

class SignUpController extends Controller
{
    public function signUpForm()
    {
        return view('sign-up');
    }

    public function signUp(SignUpRequest $request)
    {
        $data = $request->validated();
        $user = new User($data);
        $user->save();

        $event = new UserRegistered($user);
        event($event);

        session()->flash('success', "You're Signed Up!");

        return redirect()->route('home');
    }

    public function verifyEmail(int $id, string $hash, Request $request)
    {
        if (!$request->hasValidSignature()) {
            abort(403);
        }

        $user = User::query()->findOrFail($id);

        if (!hash_equals($hash, sha1($user->email))) {
            abort(403);
        }

        $user->email_verified_at = new DateTime();
        $user->save();

        session()->flash('success', "Welcome, $user->name!");

        return redirect()->route('home');
    }
}

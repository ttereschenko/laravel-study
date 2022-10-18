<?php

namespace App\Http\Controllers;

use App\Models\LoginHistory;
use Illuminate\Http\Request;

class LoginHistoryController extends Controller
{
    public function list()
    {
        $user = auth()->user();

        $query = LoginHistory::query()
            ->where('user_id', '=', $user->id)
            ->latest();

        $entries = $query->paginate(3);

        return view('login-history', compact('entries'));
    }
}

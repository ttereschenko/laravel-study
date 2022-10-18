<?php

namespace App\Observers;

use App\Mail\UpdatedMovie;
use App\Models\Movie;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class MovieObserver
{
    /**
     * Handle the Article "updated" event.
     *
     * @param  \App\Models\Movie  $movie
     * @return void
     */
    public function updated(Movie $movie)
    {
        $isYearChanged = $movie->year !== $movie->getOriginal('year');

        if ($isYearChanged) {
            $users = User::all();

            foreach ($users as $user) {
                if ($user->id !== $movie->user_id) {
                    Mail::to($user->email)->send(new UpdatedMovie($movie));
                }
            }
        }
    }
}

<?php

namespace App\Observers;

use App\Jobs\SendUpdatedMovie;
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
            SendUpdatedMovie::dispatch($movie);
        }
    }
}

<?php

use App\Http\Controllers\ActorController;
use App\Http\Controllers\GenreController;
use App\Models\Actor;
use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\SignUpController;
use App\Http\Controllers\AuthController;

Route::get('/', [MainController::class, 'index'])->name('home');

Route::get('/about-us', [MainController::class, 'aboutUs'])->name('about');

Route::get('/contact-us', [ContactController::class, 'show'])->name('contact');

Route::post('/contact-us', [ContactController::class, 'store'])->name('contact.store');

Route::group(['prefix' => '/movies', 'as' => 'movie.', 'middleware' => 'auth'], function () {

    Route::get('', [MovieController::class, 'list'])->name('list');

    Route::group(['prefix' => '/create', 'middleware' => 'can:create,' . Movie::class], function () {

        Route::get('', [MovieController::class, 'createForm'])->name('create.form');

        Route::post('', [MovieController::class, 'create'])->name('create');
    });

    Route::group(['prefix' => '/{movie}/edit', 'middleware' => 'can:edit,' . Movie::class], function () {

        Route::get('', [MovieController::class, 'editForm'])->name('edit.form');

        Route::post('', [MovieController::class, 'edit'])->name('edit');
    });

    Route::get('/{movie}', [MovieController::class, 'show'])->name('show');

    Route::post('/{movie}/delete', [MovieController::class, 'delete'])->name('delete')
        ->middleware('can:delete,' . Movie::class);
});

Route::get('/sign-up', [SignUpController::class, 'signUpForm'])->name('sign-up.form');

Route::post('/sign-up', [SignUpController::class, 'signUp'])->name('sign-up');

Route::get('verified_email/{id}/{hash}', [SignUpController::class, 'verifyEmail'])->name('verify.email');

Route::get('/sign-in', [AuthController::class, 'signInForm'])->name('sign-in.form');

Route::post('/sign-in', [AuthController::class, 'signIn'])->name('sign-in');

Route::post('/sign-out', [AuthController::class, 'signOut'])->name('sign-out');

Route::group(['prefix' => '/genres', 'as' => 'genre.', 'middleware' => 'auth'], function () {

    Route::get('', [GenreController::class, 'list'])->name('list');

    Route::get('/create', [GenreController::class, 'createForm'])->name('create.form')
        ->middleware('can:create,' . Genre::class );

    Route::post('/create', [GenreController::class, 'create'])->name('create')
        ->middleware('can:create,' . Genre::class );

    Route::get('/{genre}/edit', [GenreController::class, 'editForm'])->name('edit.form')
        ->middleware('can:edit,' . Genre::class );

    Route::post('/{genre}/edit', [GenreController::class, 'edit'])->name('edit')
        ->middleware('can:edit,' . Genre::class );


    Route::post('/{genre}/delete', [GenreController::class, 'delete'])->name('delete')
        ->middleware('can:delete,' . Genre::class );

    Route::get('/{genre}', [GenreController::class, 'show'])->name('show');
});

Route::group(['prefix' => '/actors', 'as' => 'actor.', 'middleware' => 'auth'], function () {

    Route::get('', [ActorController::class, 'list'])->name('list');

    Route::get('/create', [ActorController::class, 'createForm'])->name('create.form')
        ->middleware('can:create,' . Actor::class);

    Route::post('/create', [ActorController::class, 'create'])->name('create')
        ->middleware('can:create,' . Actor::class);

    Route::get('/{actor}', [ActorController::class, 'show'])->name('show')
        ->middleware('can:show,' . Actor::class);

    Route::get('/{actor}/edit', [ActorController::class, 'editForm'])->name('edit.form')
        ->middleware('can:edit,' . Actor::class);

    Route::post('/{actor}/edit', [ActorController::class, 'edit'])->name('edit')
        ->middleware('can:edit,' . Actor::class);

    Route::post('/{actor}/delete', [ActorController::class, 'delete'])->name('delete')
        ->middleware('can:create,' . Actor::class);
});

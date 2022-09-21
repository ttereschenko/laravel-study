<?php

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

    Route::get('/create', [MovieController::class, 'createForm'])->name('create.form');

    Route::post('/create', [MovieController::class, 'create'])->name('create');

    Route::get('/{movie}', [MovieController::class, 'show'])->name('show');

    Route::get('/{movie}/edit', [MovieController::class, 'editForm'])->name('edit.form');

    Route::post('/{movie}/edit', [MovieController::class, 'edit'])->name('edit');

    Route::post('/{movie}/delete', [MovieController::class, 'delete'])->name('delete');
});

Route::get('/sign-up', [SignUpController::class, 'signUpForm'])->name('sign-up.form');

Route::post('/sign-up', [SignUpController::class, 'signUp'])->name('sign-up');

Route::get('verified_email/{id}/{hash}', [SignUpController::class, 'verifyEmail'])->name('verify.email');

Route::get('/sign-in', [AuthController::class, 'signInForm'])->name('sign-in.form');

Route::post('/sign-in', [AuthController::class, 'signIn'])->name('sign-in');

Route::post('/sign-out', [AuthController::class, 'signOut'])->name('sign-out');


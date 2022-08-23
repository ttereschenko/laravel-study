<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\MainController;

Route::get('/', [MainController::class, 'index'])->name('home');

Route::get('/about-us', [MainController::class, 'aboutUs'])->name('about');

Route::get('/contact-us', [MainController::class, 'contact'])->name('contact');

Route::post('contact-us/submit', [MainController::class, 'contact'])->name('contact-form');

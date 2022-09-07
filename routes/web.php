<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ContactController;

Route::get('/', [MainController::class, 'index'])->name('home');

Route::get('/about-us', [MainController::class, 'aboutUs'])->name('about');

Route::get('/contact-us', [ContactController::class, 'show'])->name('contact');

Route::post('/contact-us', [ContactController::class, 'store'])->name('contact.store');

<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'books')
    ->middleware(['auth', 'verified'])
    ->name('main');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::view('/books', 'books')
    ->middleware(['auth', 'verified'])
    ->name('books');

require __DIR__ . '/auth.php';

<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('main');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('/books/{book}', App\Livewire\Book::class)
    ->middleware(['auth', 'verified'])
    ->name('book');

Route::get('/books', App\Livewire\Books::class)
    ->middleware(['auth', 'verified'])
    ->name('books');

require __DIR__ . '/auth.php';

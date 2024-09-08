<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')
    ->name('main');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('/books', App\Livewire\Book::class)
    ->middleware(['auth', 'verified'])
    ->name('books');
Route::get('/books/{book}', App\Livewire\Books::class)
    ->middleware(['auth', 'verified'])
    ->name('book');

require __DIR__ . '/auth.php';

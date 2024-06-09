<?php

use App\Livewire\Book;
use App\Livewire\Books;
use Illuminate\Support\Facades\Route;

Route::get('/', Books::class);
Route::get('/{book}', Book::class);

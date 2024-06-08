<?php

namespace App\Livewire;

use Illuminate\Support\Collection;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Books')]
class Books extends Component
{
    public function books(): Collection
    {
        return \App\Models\Book::all()->sortByDesc('id');
    }
}

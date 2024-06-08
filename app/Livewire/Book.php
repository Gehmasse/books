<?php

namespace App\Livewire;

use Livewire\Attributes\Locked;
use Livewire\Component;

class Book extends Component
{
    public ?\App\Models\Book $book = null;

    #[Locked] public int $id;
    public string $title = '';
    public string $status = '';
    public string $author = '';
    public string $started_at = '';
    public string $finished_at = '';
    public string $info = '';
    public ?int $rating = null;

    public bool $showForm = false;

    use Attributes;

    public function mount(): void
    {
        $this->id = $this->book->id;
        $this->title = $this->book->title;
        $this->status = $this->book->status->value;
        $this->author = $this->book->author;
        $this->started_at = $this->book->started_at->format('Y-m-d');
        $this->finished_at = $this->book->finished_at?->format('Y-m-d') ?? '';
        $this->info = $this->book->info;
        $this->rating = $this->book->rating;
    }

    public function save(): void
    {
        $book = \App\Models\Book::find($this->id);

        $book->status = $this->status();
        $book->title = $this->title;
        $book->author = $this->author;
        $book->started_at = $this->started_at();
        $book->finished_at = $this->finished_at();
        $book->info = $this->info;
        $book->rating = $this->rating;

        $book->save();
    }
}

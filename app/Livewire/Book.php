<?php

namespace App\Livewire;

use App\Status;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Support\HtmlString;
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
        $this->started_at = $this->book->started_at?->format('Y-m-d') ?? '';
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

        $this->showForm = false;
    }

    public function rating(): Htmlable
    {
        $i = min(max($this->rating, 0), 5);

        $empty = str_repeat('<i class="bi bi-star-fill"></i>', $i);
        $filled = str_repeat('<i class="bi bi-star"></i>', 5 - $i);

        return new HtmlString($empty . $filled);
    }

    public function edit(): void
    {
        $this->showForm = true;
    }

    public function finished(): bool
    {
        return $this->status() === Status::FINISHED;
    }
}

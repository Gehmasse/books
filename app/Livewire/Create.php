<?php

namespace App\Livewire;

use App\Status;
use Livewire\Component;

class Create extends Component
{
    public string $title = '';
    public string $status = '';
    public string $author = '';
    public string $started_at = '';
    public string $finished_at = '';
    public string $info = '';
    public ?int $rating = null;

    use Attributes;
    use Casts;

    public function mount(): void
    {
        $this->clear();
    }

    public function save(): void
    {
        $book = new \App\Models\Book();

        $book->status = $this->status();
        $book->title = $this->title;
        $book->author = $this->author;
        $book->started_at = $this->started_at();
        $book->finished_at = $this->finished_at();
        $book->info = $this->info;
        $book->rating = $this->rating;

        $book->save();

        $this->clear();
    }

    private function clear(): void
    {
        $this->status = Status::TO_READ->value;
        $this->title = '';
        $this->author = '';
        $this->started_at = now()->format('Y-m-d');
        $this->finished_at = '';
        $this->info = '';
        $this->rating = null;
    }
}

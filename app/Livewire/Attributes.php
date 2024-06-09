<?php

namespace App\Livewire;

use App\Status;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Support\HtmlString;

trait Attributes
{
    public function rating(): Htmlable
    {
        $i = min(max($this->book->rating, 0), 5);

        $empty = str_repeat('<i class="bi bi-star-fill"></i>', $i);
        $filled = str_repeat('<i class="bi bi-star"></i>', 5 - $i);

        return new HtmlString($empty . $filled);
    }

    public function link(): Htmlable
    {
        return new HtmlString('<a href="/' . $this->book->id . '">' . $this->book->id . '</a>');
    }

    public function finished(): bool
    {
        return $this->book->status === Status::FINISHED;
    }

    public function hasRating(): bool
    {
        return $this->finished() && $this->book->rating > 0;
    }
}

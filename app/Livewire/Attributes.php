<?php

namespace App\Livewire;

use App\Status;
use Illuminate\Support\Carbon;

trait Attributes
{
    private function status(): Status
    {
        return Status::from($this->status);
    }

    private function started_at(): ?Carbon
    {
        return empty($this->finished_at) ? null : Carbon::parse($this->started_at);
    }

    private function finished_at(): ?Carbon
    {
        return empty($this->finished_at) ? null : Carbon::parse($this->finished_at);
    }
}

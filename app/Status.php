<?php

namespace App;

use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Support\HtmlString;
use Livewire\Wireable;

enum Status: string implements Wireable, Htmlable
{
    case TO_READ = 'toread';
    case READING = 'reading';
    case FINISHED = 'finished';
    case ABORTED = 'aborted';

    public static function options(): Htmlable
    {
        return new HtmlString(
            collect(self::cases())
                ->map(fn(self $status) => '<option value="' . $status->value . '">' . $status->label() . '</option>')
                ->join('')
        );
    }

    public function toLivewire(): array
    {
        return ['x' => $this->value];
    }

    public static function fromLivewire($value): Status
    {
        return self::from($value['x']);
    }

    public function toHtml(): string
    {
        return '<label>' . $this->label() . '</label>';
    }

    public function label(): string
    {
        return match ($this) {
            self::TO_READ => 'To Read',
            self::READING => 'Reading',
            self::FINISHED => 'Finished',
            self::ABORTED => 'Aborted',
        };
    }

    public function color(): string
    {
        return match ($this) {
            self::TO_READ => 'orange',
            self::READING => 'yellow',
            self::FINISHED => 'green',
            self::ABORTED => 'red',
        };
    }
}

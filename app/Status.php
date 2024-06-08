<?php

namespace App;

use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Support\HtmlString;
use Illuminate\Support\Str;
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
        return Str::convertCase($this->name, MB_CASE_TITLE);
    }
}

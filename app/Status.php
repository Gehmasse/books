<?php

namespace App;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;

enum Status: string implements HasColor, HasLabel
{
    case TO_READ = 'toread';
    case READING = 'reading';
    case FINISHED = 'finished';
    case ABORTED = 'aborted';

    public function getColor(): string
    {
        return match ($this) {
            self::TO_READ => 'info',
            self::READING => 'warning',
            self::FINISHED => 'success',
            self::ABORTED => 'danger',
        };
    }

    public function getLabel(): string
    {
        return match ($this) {
            self::TO_READ => 'To Read',
            self::READING => 'Reading',
            self::FINISHED => 'Finished',
            self::ABORTED => 'Aborted',
        };
    }
}

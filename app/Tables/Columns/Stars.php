<?php

namespace App\Tables\Columns;

use Filament\Tables\Columns\Column;
use Illuminate\Support\Collection;

class Stars extends Column
{
    protected string $view = 'tables.columns.stars';

    public static function options()
    {
        return Collection::range(0, 5)
            ->map(fn (int $index) => Stars::make($index)->render())
            ->toArray();
    }
}

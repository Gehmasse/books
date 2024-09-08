<?php

namespace App\Livewire;

use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Books')]
class Books extends Component implements HasTable, HasForms
{
    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        return $table
            ->query(\App\Models\Book::query())
            ->columns([
                TextColumn::make('title')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('status')
                    ->searchable()
                    ->badge(),

                TextColumn::make('author')
                    ->searchable()
                    ->sortable(),
            ])
            ->paginated([10, 20, 30, 'all'])
            ->defaultPaginationPageOption(20)
            ->extremePaginationLinks()
            ->recordUrl(fn(Model $record) => route('book', $record))
            ->openRecordUrlInNewTab()
            ->striped()
            ->defaultSort('id', 'desc');
    }
}

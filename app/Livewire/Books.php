<?php

namespace App\Livewire;

use App\Models\Book as BookModel;
use App\Status;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ToggleButtons;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ViewColumn;
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

    protected function formFields(): array
    {
        return [
            TextInput::make('title')->required(),
            ToggleButtons::make('status')
                ->options(Status::class)
                ->inline()
                ->required(),
            TextInput::make('author')->required(),
            DatePicker::make('started_at'),
            DatePicker::make('finished_at'),
            TextInput::make('info')->default(''),
            Radio::make('rating')
                ->options(['---', 1, 2, 3, 4, 5])
                ->inline(),
        ];
    }

    public function table(Table $table): Table
    {
        return $table
            ->query(BookModel::query())
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
                TextColumn::make('time'),
                ViewColumn::make('rating')
                    ->view('tables.columns.stars'),
            ])
            ->paginated([10, 20, 30, 'all'])
            ->defaultPaginationPageOption(20)
            ->extremePaginationLinks()
            ->openRecordUrlInNewTab()
            ->striped()
            ->defaultSort('id', 'desc')
            ->headerActions([
                CreateAction::make()
                    ->model(BookModel::class)
                    ->form($this->formFields()),
            ])
            ->actions([
                Action::make('delete')
                    ->requiresConfirmation()
                    ->action(fn(BookModel $record) => $record->delete()),

                Action::make('edit')
                    ->fillForm(fn(Model $record) => $record->toArray())
                    ->form($this->formFields())
                    ->action(fn(array $data, BookModel $record) => $record->fill($data)->save()),
            ]);
    }
}

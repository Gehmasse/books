@php /** @var App\Livewire\Show $this*/ @endphp

<div class="book">
    <form wire:submit="save">

        <select wire:model.blur="status">
            {{ App\Status::options() }}
        </select>

        <input wire:model.blur="title" placeholder="Title"/>
        <input wire:model.blur="author" placeholder="Author"/>
        <input wire:model.blur="started_at" type="date"/>
        <input wire:model.blur="finished_at" type="date"/>
        <input wire:model.blur="info" placeholder="Info"/>
        <input wire:model.blur="rating" type="number" placeholder="Rating"/>

        <input type="submit" value="Save"/>

    </form>
</div>

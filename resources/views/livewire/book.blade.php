@php /** @var App\Livewire\Book $this */ @endphp

<div class="book">

    <form wire:submit="save" @style(['display: none' => $this->showForm])>
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

    <div @style(['display: none' => !$this->showForm])>
        <div>{{ $id }}</div>
        <div>{{ $status }}</div>
        <div>{{ $author }}</div>
        <div>{{ $started_at }}</div>
        <div>{{ $finished_at }}</div>
        <div>{{ $info }}</div>
        <div>{{ $rating }}</div>
    </div>

</div>

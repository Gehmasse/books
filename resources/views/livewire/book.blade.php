@php /** @var App\Livewire\Book $this */ @endphp

<div class="book">

    <form wire:submit="save" @style(['display: none' => !$this->showForm])>
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

    <div @style(['display: none' => $this->showForm])>
        <div><em>({{ $id }})</em></div>
        <div><b>{{ $title }}</b></div>
        <div @style(['color: ' . $this->status()->color()])>{{ $this->status()->label()}}</div>
        <div>{{ $author }}</div>
        <div>{{ $this->started_at()?->format('d.m.Y') ?? '---' }} - {{ $this->finished_at()?->format('d.m.Y') ?? '---' }}</div>
        <div>{{ $info }}</div>
        @if($this->finished()) <div>{{ $this->rating() }}</div> @endif

        <button wire:click="edit">Edit</button>
    </div>


</div>

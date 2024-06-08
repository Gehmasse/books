@php /** @var App\Livewire\Books $this */ @endphp

<div class="books">
    <livewire:create/>

    @foreach($this->books() as $key => $book)
        <livewire:book :book="$book" wire:key="$key"/>
    @endforeach
</div>

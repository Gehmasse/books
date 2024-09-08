@php /** @var App\Livewire\Books $this */ @endphp

<div class="books">

    <livewire:create/>

    @foreach($this->books() as $key => $book)
        <livewire:show :$book wire:key="$key"/>
    @endforeach

</div>

@php /** @var App\Livewire\Show $this */ @endphp
@php /** @var App\Models\Book $book */ @endphp

<div class="show">

    <div><em>({{ $this->link() }})</em></div>

    <div><b>{{ $book->title }}</b></div>

    <div @style(['color: ' . $book->status->color()])>{{ $book->status->label()}}</div>

    <div>{{ $book->author }}</div>

    @if($book->started_at !== null || $book->finished_at !== null)
        <div>{{ $book->started_at?->format('d.m.Y') ?? '---' }}
            - {{ $book->finished_at?->format('d.m.Y') ?? '---' }}</div>
    @endif

    <div>{{ $book->info }}</div>

    @if($this->hasRating())
        <div>{{ $this->rating() }}</div>
    @endif

</div>

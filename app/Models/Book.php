<?php

namespace App\Models;

use App\Status;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Number;

/**
 * @property int $id
 * @property string $title
 * @property Status $status
 * @property string $author
 * @property ?Carbon $started_at
 * @property ?Carbon $finished_at
 * @property string $info
 * @property ?int $rating
 * @property-read int $status_sort
 * @property-read string $time
 */
class Book extends Model
{
    use HasFactory;

    protected $casts = [
        'status' => Status::class,
        'started_at' => 'date',
        'finished_at' => 'date',
    ];

    protected $fillable = [
        'title',
        'status',
        'author',
        'started_at',
        'finished_at',
        'info',
        'rating',

    ];

    public function hasRating(): bool
    {
        return $this->finished() && $this->rating > 0;
    }

    public function finished(): bool
    {
        return $this->status === Status::FINISHED;
    }

    protected function statusSort(): Attribute
    {
        return Attribute::get(fn() => match ($this->status) {
            Status::TO_READ => 2,
            Status::READING => 1,
            Status::FINISHED => 3,
            Status::ABORTED => 4,
        });
    }

    protected function info(): Attribute
    {
        return Attribute::set(fn(?string $value) => $value ?? '');
    }

    protected function time(): Attribute
    {
        return Attribute::get(fn() => $this->started_at === null && $this->finished_at === null
            ? '---' : ($this->started_at?->format('d.m.Y') ?? '---') . ' - ' . ($this->finished_at?->format('d.m.Y') ?? '---'));
    }

    protected function rating(): Attribute
    {
        return Attribute::make(
            get: fn(?int $i) => $i === null ? null : Number::clamp($i, 0, 5),
            set: fn(mixed $i) => $i === null || $i === '---' ? null : Number::clamp($i, 0, 5),
        );
    }
}

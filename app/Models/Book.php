<?php

namespace App\Models;

use App\Status;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

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
 */
class Book extends Model
{
    use HasFactory;

    protected $casts = [
        'status' => Status::class,
        'started_at' => 'date',
        'finished_at' => 'date',
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
        return Attribute::get(fn() =>  match($this->status) {
            Status::TO_READ => 2,
            Status::READING => 1,
            Status::FINISHED => 3,
            Status::ABORTED => 4,
        });
    }
}

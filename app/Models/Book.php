<?php

namespace App\Models;

use App\Status;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property string $title
 * @property Status $status
 * @property string $author
 * @property Carbon $started_at
 * @property ?Carbon $finished_at
 * @property string $info
 * @property ?int $rating
 */
class Book extends Model
{
    use HasFactory;

    protected $casts = [
        'status' => Status::class,
        'started_at' => 'date',
        'finished_at' => 'date',
    ];
}

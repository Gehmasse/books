<?php

namespace App\Models;

use App\Status;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * @param int $id
 * @param Status $status
 * @param string $author
 * @param Carbon $started_at
 * @param ?Carbon $finished_at
 * @param string $info
 * @param ?int $rating
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

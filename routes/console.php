<?php

use App\Models\Book;
use App\Status;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

Artisan::command('import {file}', function (string $file) {
    $file = file_get_contents(storage_path('import/' . $file));

    $lines = array_map(function (string $line) {
        $fields = explode(',', $line);

        if (count($fields) < 6) {
            return [];
        }

        $title = $fields[0];

        $status = (match ($fields[1]) {
            'Finished' => Status::FINISHED,
            'To Read' => Status::TO_READ,
            'Aborted' => Status::ABORTED,
            'Reading' => Status::READING,
        });

        $author = $fields[2];

        $started_at = is_string($fields[3]) && preg_match('/[0-9][0-9].[0-9][0-9].[0-9][0-9][0-9][0-9]/', $fields[3]) ? Carbon::createFromFormat('d.m.Y', $fields[3])->format('Y-m-d') : null;
        $finished_at = is_string($fields[4]) && preg_match('/[0-9][0-9].[0-9][0-9].[0-9][0-9][0-9][0-9]/', $fields[4]) ? Carbon::createFromFormat('d.m.Y', $fields[4])->format('Y-m-d') : null;

        $rating = (mb_strlen(trim($fields[5])) / 2) ?: null;
        $info = $fields[6];

        $book = new Book;

        $book->title = $title;
        $book->status = $status;
        $book->author = $author;
        $book->started_at = $started_at;
        $book->finished_at = $finished_at;
        $book->info = $info;
        $book->rating = $rating;

        $book->save();

        return [$title, $status->label(), $author, $started_at, $finished_at, $rating, $info];
    }, explode("\r\n", $file));

    $this->table(['Title', 'Status', 'Author', 'Started at', 'Finished at', 'Rating', 'Info'], $lines);
});

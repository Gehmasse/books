<?php

namespace App;

enum Status: string
{
    case TO_READ = 'toread';
    case READING = 'reading';
    case FINISHED = 'finished';
    case ABORTED = 'aborted';
}

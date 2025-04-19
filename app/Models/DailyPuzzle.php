<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DailyPuzzle extends Model
{
    protected $table = 'daily_puzzles';

    protected $fillable = [
        'type',
        'question',
        'answer',
        'available_on'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserPuzzleAnswer extends Model
{
    protected $table = 'user_puzzle_answers';

    // Optional: Add fillable fields
    protected $fillable = [
        'userid',
        'puzzleid',
        'answer',
        // add more if needed
    ];
}

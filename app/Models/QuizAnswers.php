<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizAnswers extends Model
{
    use HasFactory;
    protected $table = 'quiz_answers';
    protected $guarded = [];

    public function questionData()
    {
        return $this->hasOne('App\Models\QuizQuestions', 'id', 'questionid');
    }
}

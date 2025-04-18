<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizQuestions extends Model
{
    use HasFactory;

    protected $table = 'quiz_questions';
    protected $guarded = [];

    public function correctanswer()
    {
        return $this->hasOne('App\Models\QuizOptions', 'questionid', 'id')->where('correct',1);
    }

    public function options()
    {
        return $this->hasMany('App\Models\QuizOptions', 'questionid', 'id')->orderBy('id','asc');
    }


}

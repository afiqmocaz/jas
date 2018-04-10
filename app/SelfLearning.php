<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\QuizModul;
class SelfLearning extends Model
{
    public function quizModul(){
        return $this->hasOne('App\QuizModul','id','module');
    }
}



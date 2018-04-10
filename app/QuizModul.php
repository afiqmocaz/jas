<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\SelfLearning;
use App\QuestionList;
class QuizModul extends Model
{
    protected $table = 'quiz_modul';
    
    public function selfLearning(){
        return $this->hasMany('App\SelfLearning','module','id');
    }
    
    public function questionList(){
        return $this->hasMany('App\QuestionList', 'module', 'id');
    }

}

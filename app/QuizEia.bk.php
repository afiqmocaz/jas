<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\QuizOptions;
use App\QuizModul;

class QuizEia extends Model
{
    protected $table = 'quiz_eia';

    protected $fillable = ['limg', 'module', 'question', 'i', 'ii', 'iii', 'iv', 'eiarelated_id','difficulty_level'];


    public static function boot()
    {
        parent::boot();

        QuizEia::observe(new \App\Observers\UserActionsObserver);
    }


    public function options()
    {
        return $this->hasMany(QuizOptions::class, 'question_id');
    }

    public function eiarelated()
    {
        return $this->belongsTo('App\EiaRelated');
    }
    
    public function quizOptions()
    {
        return $this->hasMany('App\QuizOptions', 'question_id', 'id');
    }
    
    public function correctOption()
    {
        return $this->quizOptions()->where('correct','=', 1);
    }
    
    public function quizModule(){
        return $this->hasOne('App\QuizModul', "id", "module");
    }
}

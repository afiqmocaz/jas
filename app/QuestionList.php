<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\QuizOptions;
use App\QuizModul;
use App\Specialized;

class QuestionList extends Model
{
    protected $table = 'question_list';

    protected $fillable = ['limg', 'module', 'question', 'i', 'ii', 'iii', 'iv', 'related_id', 'specialize_id','difficulty_level'];


    public static function boot()
    {
        parent::boot();

        QuestionList::observe(new \App\Observers\UserActionsObserver);
    }


    public function options()
    {
        return $this->hasMany(QuizOptions::class, 'question_id');
    }

    public function related()
    {
        return $this->belongsTo('App\Related');
    }
    
     public function specialized()
    {
        return $this->hasOne('App\Specialized','id', 'specialize_id');
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

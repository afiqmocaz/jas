<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\QuizModul;
class QuizOptions extends Model
{
    protected $table='quiz_options';

    //use SoftDeletes;

    protected $fillable = ['option', 'correct', 'question_id'];
    
    
    public static function boot()
    {
        parent::boot();

        QuizOptions::observe(new \App\Observers\UserActionsObserver);
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setQuestionIdAttribute($input)
    {
        $this->attributes['question_id'] = $input ? $input : null;
    }
    
    public function question()
    {
        return $this->belongsTo(QuestionList::class, 'question_id');
    }
    
  
}

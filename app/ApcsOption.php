<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApcsOption extends Model
{
    //

    protected $table='apcsexamoption';

    //use SoftDeletes;

    protected $fillable = ['option', 'correct', 'question_id'];
    
    
    public static function boot()
    {
        parent::boot();

        ApcsOption::observe(new \App\Observers\UserActionsObserver);
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
        return $this->belongsTo(ExamApcs::class, 'question_id');
    }
}

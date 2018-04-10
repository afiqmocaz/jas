<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IetsOptions extends Model
{
    protected $table='ietsexamoption';

    //use SoftDeletes;

    protected $fillable = ['option', 'correct', 'question_id'];
    
    
    public static function boot()
    {
        parent::boot();

        IetsOptions::observe(new \App\Observers\UserActionsObserver);
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
        return $this->belongsTo(ExamIets::class, 'question_id');
    }

  
}

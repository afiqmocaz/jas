<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EiaOptions extends Model
{
    protected $table='eiaexamoption';

    //use SoftDeletes;

    protected $fillable = ['option', 'correct', 'question_id'];
    
    
    public static function boot()
    {
        parent::boot();

        EiaOptions::observe(new \App\Observers\UserActionsObserver);
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
        return $this->belongsTo(ExamEia::class, 'question_id');
    }
}

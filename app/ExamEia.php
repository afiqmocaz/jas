<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExamEia extends Model
{
    //
	
	protected $table = 'eiaexamquestions';

    protected $fillable = ['filename', 'mime', 'original_filename', 'limg', 'type', 'question', 'i', 'ii', 'iii', 'iv', 'eiarelated_id','level'];


    public static function boot()
    {
        parent::boot();

        ExamEia::observe(new \App\Observers\UserActionsObserver);
    }


    public function options()
    {
        return $this->hasMany(EiaOptions::class, 'question_id');
		
    }
	
	 public function eiarelated()
    {
        return $this->belongsTo('App\EiaRelated');
    }
}

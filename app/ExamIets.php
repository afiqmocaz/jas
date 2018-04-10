<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExamIets extends Model
{
   
	protected $table = 'ietsexamquestion';

    protected $fillable = ['filename', 'mime', 'original_filename', 'limg', 'module', 'question', 'i', 'ii', 'iii', 'iv', 'ietsrelated_id','difficulty_level'];


    public static function boot()
    {
        parent::boot();

        ExamIets::observe(new \App\Observers\UserActionsObserver);
    }

public function options()
    {
        return $this->hasMany(IetsOptions::class, 'question_id');
    }
     public function quizOptions()
    {
        return $this->hasMany('App\IetsOptions', 'question_id', 'id');
    }
    
    public function correctOption()
    {
        return $this->quizOptions()->where('correct','=', 1);
    }
	
	public function ietsrelated(){
        return $this->belongsTo('App\IetsRelated');
    }

    public function quizModule(){
        return $this->hasOne('App\IetsModul', "id", "module");
    }
}

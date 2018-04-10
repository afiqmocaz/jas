<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExamApcs extends Model
{
    //

    protected $table = 'apcsexamquestion';

    protected $fillable = ['filename', 'mime', 'original_filename','specialized_id', 'limg', 'type', 'question', 'i', 'ii', 'iii', 'iv', 'apcsrelated_id','level'];


    public static function boot()
    {
        parent::boot();

        ExamApcs::observe(new \App\Observers\UserActionsObserver);
    }


    public function options()
    {
        return $this->hasMany(ApcsOption::class, 'question_id');
		
    }
	
	public function apcsrelated()
    {
        return $this->belongsTo('App\Related');
    }

    public function quizModule(){
        return $this->hasOne('App\ApcsModul', "id", "module");
    }
}

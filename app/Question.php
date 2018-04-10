<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = 'apcsexamquestion';

    protected $fillable = ['filename', 'mime', 'original_filename', 'limg','module','specialized_id', 'question', 'i', 'ii', 'iii', 'iv', 'apcsrelated_id','difficulty_level'];


    public function specialized()
    {
    	return $this->belongsTo('App\Specialized');
    }

    public function related()
    {
    	return $this->belongsTo('App\Related');
    }

   public function options()
    {
        return $this->hasMany(ApcsOption::class, 'question_id');
    }

 public function quizOptions()
    {
        return $this->hasMany('App\ApcsOption', 'question_id', 'id');
    }
    
    public function correctOption()
    {
        return $this->quizOptions()->where('correct','=', 1);
    }

    public function quizModule(){
        return $this->hasOne('App\ApcsModul', "id", "module");
    }
}

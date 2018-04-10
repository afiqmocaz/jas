<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IetsQuestion extends Model
{
  
   protected $table = 'ietsexamquestion';

    protected $fillable = ['filename', 'mime', 'original_filename', 'limg','type', 'question', 'i', 'ii', 'iii', 'iv','correct', 'ietsrelated_id','level'];


   

    public function related()
    {
    	return $this->belongsTo('App\IetsRelated');
    }

     public function options()
    {
        return $this->hasMany(IetsOptions::class, 'question_id');
		
    }
}

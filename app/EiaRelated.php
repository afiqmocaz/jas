<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EiaRelated extends Model
{
    protected $table='eia_relates';

    public function quizzes()
    {
    	return $this->hasMany('App\Quiz');
    } 

    public function eiaquestions()
    {
    	return $this->hasMany('App\EiaQuestion');
    } 
}

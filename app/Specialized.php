<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Specialized extends Model
{
    protected $table='specializes';

    public function questions()
    {
    	return $this->hasMany('App\Question');
    } 
}

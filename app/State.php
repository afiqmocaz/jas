<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    //

    protected $table='state';

    public function state()
    {
    	return $this->hasMany('App\eiaSectionA','state_id');
    }
}

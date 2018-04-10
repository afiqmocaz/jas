<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EiaAppe extends Model
{
    protected $table = "eia_appes";
    
	public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

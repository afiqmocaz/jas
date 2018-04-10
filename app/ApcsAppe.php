<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApcsAppe extends Model
{
    protected $table = "apcs_appes";
    
	public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

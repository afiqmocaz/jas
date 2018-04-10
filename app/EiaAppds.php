<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EiaAppd extends Model
{
    protected $table = "eia_appds";
    
	public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

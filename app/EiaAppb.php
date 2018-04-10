<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EiaAppb extends Model
{
    protected $table = "eia_appbs";
    
	public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

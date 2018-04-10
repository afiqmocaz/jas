<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EiaAppc extends Model
{
    protected $table = "eia_appcs";
    
	public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

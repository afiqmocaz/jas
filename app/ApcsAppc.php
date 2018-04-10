<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApcsAppc extends Model
{
    protected $table = "apcs_appcs";
    
	public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApcsAppb extends Model
{
    protected $table = "apcs_appbs";
    
	public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

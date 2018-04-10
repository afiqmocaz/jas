<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApcsAppf extends Model
{
    protected $table = "apcs_appfs";
    
	public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

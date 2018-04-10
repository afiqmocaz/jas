<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EiaAppbs extends Model
{
    //
	protected $table = "eia_appb";
    
	public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}

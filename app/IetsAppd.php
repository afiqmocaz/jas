<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IetsAppd extends Model
{
    protected $table = "iets_appds";
    
	public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

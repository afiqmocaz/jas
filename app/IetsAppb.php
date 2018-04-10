<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IetsAppb extends Model
{
    protected $table = "iets_appbs";
    
	public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

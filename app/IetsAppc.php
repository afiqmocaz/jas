<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IetsAppc extends Model
{
    protected $table = "iets_appcs";
    
	public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

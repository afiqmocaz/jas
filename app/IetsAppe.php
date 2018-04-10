<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IetsAppe extends Model
{
    protected $table = "iets_appes";
    
	public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

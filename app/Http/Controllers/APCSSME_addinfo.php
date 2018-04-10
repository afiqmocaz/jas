<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class APCSSME_addinfo extends Model
{
     protected $table = 'apcsaddinfosme';
   protected $fillable = ['user_id', 'reqaddinfo'];
   
   
	public static function boot()
    {
        parent::boot();

        SMEaddinfo::observe(new \App\Observers\UserActionsObserver);
    }
	
	public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

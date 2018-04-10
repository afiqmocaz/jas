<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\SoftDeletes;

class SMEaddinfo extends Model {
    // upload model
	
	//use SoftDeletes;
   protected $table = 'smeaddinfo';
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

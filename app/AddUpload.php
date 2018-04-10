<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class AddUpload extends Model {
    // upload model
   protected $table = 'additional_info';
    protected $dates = ['created_at'];
	//protected $fillable = ['filename', 'mime', 'original_filename', 'created_at', 'updated_at','user_nric'];
	protected $fillable = ['user_id', 'filename', 'mime', 'original_filename'];
	
	public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
	 public static function boot()
    {
        parent::boot();

        AddUpload::observe(new \App\Observers\UserActionsObserver);
    }
	
}

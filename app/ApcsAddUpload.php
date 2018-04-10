<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class ApcsAddUpload extends Model {
    // upload model
   protected $table = 'apcsaddupload';
    protected $dates = ['created_at'];
	//protected $fillable = ['filename', 'mime', 'original_filename', 'created_at', 'updated_at','user_nric'];
	protected $fillable = ['user_id', 'filename', 'mime', 'original_filename'];
	
	public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
	
}

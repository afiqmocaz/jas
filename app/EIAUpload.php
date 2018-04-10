<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class EIAUpload extends Model {
    // upload model
   protected $table = 'uploads';
	//protected $fillable = ['filename', 'mime', 'original_filename', 'created_at', 'updated_at','user_nric'];
	protected $fillable = ['user_id', 'filename', 'mime', 'original_filename'];

	protected $date = ['created_at'];
	
	public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function general2()
    {
        return $this->belongsTo(EiaAssignment::class, 'assignment_id');
    }
	
}

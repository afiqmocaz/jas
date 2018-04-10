<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EiaAppa extends Model
{
    protected $table = "eia_appas";

 //    public function applicants() {
 //    return $this->belongsTo('App\Applicant', 'user_id');
	// }

	public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EiaAppInfo extends Model
{
    protected $table = "eia_app_infos";

    public function applicant() {
    return $this->belongsTo('App\EiaApplicant', 'user_id');
	}
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AppInfo extends Model
{
    protected $table = "app_infos";

    public function applicant() {
    return $this->belongsTo('App\Applicant', 'user_id');
	}
}

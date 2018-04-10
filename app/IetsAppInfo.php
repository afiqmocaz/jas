<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IetsAppInfo extends Model
{
    protected $table = "iets_app_infos";

    public function ietsapplicant() {
    return $this->belongsTo('App\IetsApplicant', 'user_id');
	}
}

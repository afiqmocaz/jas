<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class apcsSpecializeSectionB extends Model
{
    protected $table = 'apcs_specialize_section_bs';

    public function apcsSectionB()
    {
    	return $this->hasMany('App\apcsSectionB'); 
    }
}

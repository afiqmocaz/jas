<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Role;
class RoleUser extends Model
{
    protected $table='role_user';
    
    public function role()
    {
    	return $this->hasOne('App\Role', 'id', 'role_id');
    } 
    
}

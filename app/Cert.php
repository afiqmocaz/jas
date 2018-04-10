<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
class Cert extends Model
{
    //
    protected $table = 'certs';
    protected $dates = ['created_at','expired'];
    public function user(){
        return $this->belongsTo('App\User');
    }
    
    public function statusBy(){
     
        return $this->hasOne('App\User','id','status_by');
    }
    public function endorsementBy(){
     
        return $this->hasOne('App\User','id','status_by');
    }
    
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\PayInfo;
use App\ExamCandidate;
class Payment extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    public function payInfo()
    {
        return $this->hasOne('App\PayInfo', 'payment_id', 'id');
    }
    
    public function examCandidates()
    {
     
        return $this->hasMany('App\ExamCandidate', 'payment_id', 'id');
    }
}

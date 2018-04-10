<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use App\eiaSectionF;
use App\UserQuizSession;
use App\RoleUser;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use Notifiable;
    use EntrustUserTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','nric', 'email', 'password', 'email_token', 'verified',
    ];

    protected $table='users';

    public function applicants()
    {
        return $this->hasMany('App\Applicant');
    }

    public function eiaapplicants()
    {
        return $this->hasMany('App\EiaApplicant');
    }

    public function ietsapplicants()
    {
        return $this->hasMany('App\IetsApplicant');
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    // Set the verified status to true and make the email token null
    public function verified()
    {
       $this->verified = 1;
       $this->email_token = null;
       $this->save();
    }
    
    public function certEiaSectionA()
    {
        return $this->hasOne('App\eiaSectionA', 'user_id', 'id');
    }
    
    public function certEiaSectionE()
    {
        return $this->hasMany('App\eiaSectionE', 'user_id', 'id');
    }
    public function certIetsSectionA()
    {
        return $this->hasOne('App\ietsSectionA', 'user_id', 'id');
    }
    
    public function certIetsSectionE()
    {
        return $this->hasMany('App\ietsSectionE', 'user_id', 'id');
    }
    
    public function certApcsSectionA()
    {
        return $this->hasOne('App\apcsSectionA', 'user_id', 'id');
    }
    
    public function certApcsSectionE()
    {
        return $this->hasMany('App\apcsSectionE', 'user_id', 'id');
    }
    
    
    
    public function eiaSectionF()
    {
        return $this->hasOne('App\eiaSectionF', 'user_id', 'id');
    }
    
    public function quizSession(){
        return $this->hasOne('App\QuizSession', 'user_id', 'id');
    }

    public function apcsSectionF()
    {
        return $this->hasOne('App\apcsSectionF', 'user_id', 'id');
    }
    
    public function ietsSectionE()
    {
        return $this->hasOne('App\ietsSectionE', 'user_id', 'id');
    }
    
    public function roleUser(){
        return $this->hasmany('App\RoleUser', 'user_id', 'id');
    }
    
    //aisyah@grtech.com.my
    //added roleuser user table relationship
    public function roleUserNew(){
        return $this->hasOne('App\RoleUser', 'user_id', 'id');
    }

     public function paymenteia()
    {
        return $this->hasOne('App\Payment', 'user_id', 'id');
    }

    public function paymentiets()
    {
        return $this->hasOne('App\Payment', 'user_id', 'id');
    }

    public function paymentapcs()
    {
        return $this->hasOne('App\Payment', 'user_id', 'id');
    }
    
    public static function permission($category) {
            $permissioin = false;
        
            if($category === 'eia'){
                $eiaRoleIds = [4,2,13];
                $eiaR = RoleUser::where('user_id','=',Auth::id())->whereIn('role_id',$eiaRoleIds)->first();
                if(!empty($eiaR)){
                   $permissioin = true; 
                }
            }
            
            if($category === 'apcs'){
               $apcsRoleIds = [3,2,12];
                $apcsR = RoleUser::where('user_id','=',Auth::id())->whereIn('role_id',$apcsRoleIds)->first();
                if(!empty($apcsR)){
                   $permissioin = true; 
                }
            }
            
            if($category === 'iets'){
                  $ietsRoleIds = [4,2,14,8];
                $ietsR = RoleUser::where('user_id','=',Auth::id())->whereIn('role_id',$ietsRoleIds)->first();
                if(!empty($ietsR)){
                   $permissioin = true; 
                }
            }

       if($category === 'applicants'){
                  $appRoleIds = [2];
                $Applicants = RoleUser::where('user_id','=',Auth::id())->whereIn('role_id',$appRoleIds)->first();
                if(!empty($Applicants)){
                   $permissioin = true; 
                }
            }

             if($category === 'admin'){
                  $adminRoleIds = [2];
                $admin = RoleUser::where('user_id','=',Auth::id())->whereIn('role_id',$adminRoleIds)->first();
                if(!empty($admin)){
                   $permissioin = true; 
                }
            }
            
        
            return $permissioin;
    }
}

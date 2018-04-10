<?php

namespace App\Http\Controllers;

class MasterLayoutController  extends Controller
{
    public function getApplicant($category){
      
//        $extendLayout = null;
//        if($category === 'eia'){
//                 $extendLayout = 'layouts.appeia'; 
//        }else if($category === 'iets'){
//                 $extendLayout = 'layouts.appiets'; 
//        }else if($category === 'apcs'){
//                 $extendLayout = 'layouts.app3'; 
//        }
        return 'layouts.master_applicant';
    }
    
    public function getSec($category){
        
        
        $extendLayout = null;
        if($category === 'eia'){
                 $extendLayout = 'layouts.eiamaster'; 
        }else if($category === 'iets'){
                 $extendLayout = 'layouts.ietsmaster'; 
        }else if($category === 'apcs'){
                 $extendLayout = 'layouts.apcsmaster'; 
        }
        return $extendLayout;
    }
}

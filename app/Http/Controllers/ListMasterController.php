<?php

namespace App\Http\Controllers;

class ListMasterController extends Controller
{
    
   public function listInterviewStatus(){
       $list = [
           'pending' => 'pending',
           'assigned' => 'assigned',
           'rejected'  => 'rejected',
           'failed'  => 'failed',
           'passed'  => 'passed',
       ];
       
       return $list;
   } 
    
   public function listInterviewStatusForSecretariat(){
       $list = [
           'failed'  => 'Failed',
           'passed'  => 'passed',
       ];
       
       return $list;
   }
   
 
   
}
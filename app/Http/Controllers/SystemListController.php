<?php

namespace App\Http\Controllers;
use stdClass;
class SystemListController extends Controller
{
   public function applicantRole(){
       
       $list = array();
       
       $role = new stdClass();
       $role->code = 'PRE-REG';
       $role->name = 'Pre Registration';
       $list[] = $role;
       
       $role = new stdClass();
       $role->code = 'PRE-PAYMENT';
       $role->name = 'Pre Payment';
       $list[] = $role;
       
       $role = new stdClass();
       $role->code = 'CONSULTANT';
       $role->name = 'Consultant';
       $list[] = $role;
       
       return $list;
       
   }
   
   
   public function consultantType(){
       
       $list = array();
       
       $role = new stdClass();
       $role->code = 'EiA';
       $role->type = 'EiA';
       $list[] = $role;
       
       $role = new stdClass();
       $role->code = 'IETS';
       $role->type = 'IETS';
       $list[] = $role;
       
       $role = new stdClass();
       $role->code = 'APCS';
       $role->type = 'APCS';
       $list[] = $role;
       
       return $list;
       
   }
   
   
   
}

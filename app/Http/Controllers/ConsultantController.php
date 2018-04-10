<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Cert;
use Carbon\Carbon;

class ConsultantController extends Controller {

    public function index($category) {

        $data = array();
        $data['category'] = $category;
        return view('consultant_index')->with($data);
    }

    public function consultantProfile($category) {
        return redirect('/' . $category . 'profiles/create');
    }

    public function consultantCpd($category) {

        $data = array();
        $data['category'] = $category;
        return view('consultant_cpd')->with($data);
    }

    public function consultantCert($category) {

//        $ic1 = substr(Auth::user()->nric, 0, 6);
//        $ic2 = substr(Auth::user()->nric, 6, -4);
//        $ic3 = substr(Auth::user()->nric, 8, 12);
//
//        $ncerpIcFormat = $ic1 . '-' . $ic2 . '-' . $ic3;
//        $dbNrcep = \DB::connection('mysql_eimas_nrcep');
//        $profileJson = $dbNrcep->table('t_profile')->where('prof_idno', '=', $ncerpIcFormat)->first();
//        $profile = json_decode(json_encode($profileJson), true);
        
        $prevY1 = date('Y') - 1;
        $prevY2 = date('Y') - 2;
        $prevY3 = date('Y') - 3;

        $pointy1 = 0;
        $pointy2 = 0;
        $pointy3 = 0;
       
        $dbNrcep = \DB::connection('mysql_eimas_nrcep');
        
        $ic = Auth::user()->nric;
        
        $cpdSummaryJson1 = $dbNrcep->table('t_cpd_summary')->where('csum_create_by', '=', $ic)->where('csum_year', '=', $prevY1)->first();
        $cpd1 = json_decode(json_encode($cpdSummaryJson1), true);
      
        $cpdSummaryJson2 = $dbNrcep->table('t_cpd_summary')->where('csum_create_by', '=', $ic)->where('csum_year', '=', $prevY2)->first();
        $cpd2 = json_decode(json_encode($cpdSummaryJson2), true);
        
        $cpdSummaryJson3 = $dbNrcep->table('t_cpd_summary')->where('csum_create_by', '=', $ic)->where('csum_year', '=', $prevY3)->first();
        $cpd3 = json_decode(json_encode($cpdSummaryJson3), true);
        
        if(!empty($cpd1['csum_earned'])){
            $pointy1 = $cpd1['csum_earned'];
        }
        if(!empty($cpd2['csum_earned'])){
            $pointy2 = $cpd2['csum_earned'];
        }
        if(!empty($cpd3['csum_earned'])){
            $pointy3 = $cpd3['csum_earned'];
        }
      

        $prevYear1 = [$prevY1, $pointy1];
        $prevYear2 = [$prevY2, $pointy2];
        $prevYear3 = [$prevY3, $pointy3];

        $totalCPD = $prevYear1[1] + $prevYear2[1] + $prevYear3[1];


        $join[] = 'user.certEiaSectionA';
        $join[] = 'user.certEiaSectionE';

        $join[] = 'user.certIetsSectionA';
        $join[] = 'user.certIetsSectionE';

        $join[] = 'user.certApcsSectionA';
        $join[] = 'user.certApcsSectionE';

        $cert = Cert::with($join)->where('user_id', '=', Auth::user()->id)->where('category', '=', $category)->first();
        $now = Carbon::now();
        
        $created = new Carbon($cert->expired);
        $diffDay = $created->diff($now)->days;
        
        $data = array();
        $data['category'] = $category;
        $data['cert'] = $cert;

        $data['prevYear1'] = $prevYear1;
        $data['prevYear2'] = $prevYear2;
        $data['prevYear3'] = $prevYear3;
        $data['totalCPD'] = $totalCPD;
        $data['diffDay'] = $diffDay;

        //return $cert->user->certEiaSectionE;
        return view('consultant_cert')->with($data);
    }

    public function __construct() {
        $this->middleware('auth');
    }

}

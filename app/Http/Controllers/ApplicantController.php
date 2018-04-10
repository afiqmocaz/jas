<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\apcsSectionA;
use App\apcsSectionB;
use App\apcsSectionC;
use App\apcsSectionD;
use App\apcsSectionE;
use App\apcsSectionF;

use App\eiaSectionA;
use App\eiaSectionB;
use App\eiaSectionC;
use App\eiaSectionD;
use App\eiaSectionE;
use App\eiaSectionF;

use App\ietsSectionA;
use App\ietsSectionB;
use App\ietsSectionC;
use App\ietsSectionD;
use App\ietsSectionE;

use App\ApcsAppa;
use App\User;
use Session;
use App\EiaApplicant;
use App\Applicant;
use App\IetsApplicant;
use Auth;
use App\Specialized;
class ApplicantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $category = 'apcs';
        $link = '';
        $master = (new MasterLayoutController)->getSec($category);
        return view('eiaapplicant.create', compact('master','category','link'));
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $applicant = new Applicant;
        $applicant->comment = $request->comment;
        $applicant->status = $request->status;
        
        return redirect() -> route(('applicant.show'),$applicant->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $apcsSectionA = ApcsSectionA::all();
        $applicant = Applicant::all();
        $user = User::all();
        return view('applicant.show', compact('apcsSectionA', 'applicant', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
    public function find(Request $req){
        
        $applicant = array();
        
        if($req->category === 'eia'){
             $applicant = EiaApplicant::with('user.eiaSectionF')
                ->whereHas('user.eiaSectionF', function($q) {
                    $q->whereNotNull('user_id');
                })
                ->orderBy('updated_at','DESC')->get();
        }
        
        else if($req->category === 'iets'){
            $applicant = IetsApplicant::with('user.ietsSectionE')->where('status','!=','ReRegister')
                ->whereHas('user.ietsSectionE', function($q) {
                    $q->whereNotNull('user_id');
                })
                ->orderBy('updated_at','DESC')->get();
        }
        
        else if($req->category === 'apcs'){
            $applicant = Applicant::with('user.certApcsSectionE')
                ->whereHas('user.certApcsSectionE', function($q) {
                    $q->whereNotNull('user_id');
                })
                ->orderBy('updated_at','DESC')->get();
        }
       
        
    
        $res = new \stdClass();
        $res->data = $applicant;
        return json_encode($res);
    }

        public function findSection(Request $req){
        
        $applicant = array();
        
        if($req->category === 'eia'){
         $sectiona=eiaSectionA::where('user_id','=',Auth::user()->id)->first();
         $sectionb=eiaSectionB::where('user_id','=',Auth::user()->id)->first();
         $sectionc=eiaSectionC::where('user_id','=',Auth::user()->id)->first();
         $sectiond=eiaSectionD::where('user_id','=',Auth::user()->id)->first();
         $sectione=eiaSectionE::where('user_id','=',Auth::user()->id)->first();
         $sectionf=eiaSectionF::where('user_id','=',Auth::user()->id)->first();    
        }
        
        else if($req->category === 'iets'){
        $sectiona=ietsSectionA::where('user_id','=',Auth::user()->id)->first();
         $sectionb=ietsSectionB::where('user_id','=',Auth::user()->id)->first();
         $sectionc=ietsSectionC::where('user_id','=',Auth::user()->id)->first();
         $sectiond=ietsSectionD::where('user_id','=',Auth::user()->id)->first();
         $sectione=ietsSectionE::where('user_id','=',Auth::user()->id)->first();
         $sectionf="";
        }
        
        else if($req->category === 'apcs'){
         $sectiona=apcsSectionA::where('user_id','=',Auth::user()->id)->first();
         $sectionb=apcsSectionB::where('user_id','=',Auth::user()->id)->first();
         $sectionc=apcsSectionC::where('user_id','=',Auth::user()->id)->first();
         $sectiond=apcsSectionD::where('user_id','=',Auth::user()->id)->first();
         $sectione=apcsSectionE::where('user_id','=',Auth::user()->id)->first();
         $sectionf=apcsSectionF::where('user_id','=',Auth::user()->id)->first();
        }
       
        
    
        $res = new \stdClass();
        $res->data = $sectiona;
        $res->data2=$sectionb;
        $res->data3=$sectionc;
        $res->data4=$sectiond;
        $res->data5=$sectione;
        $res->data6=$sectionf;
        return json_encode($res);
    }

}

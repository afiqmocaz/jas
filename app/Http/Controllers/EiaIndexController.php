<?php

namespace App\Http\Controllers;
use stdClass;
use Illuminate\Http\Request;
use App\EiaIndex;
use App\EiaAnnounce;
use App\EiaApplicant;
use App\EiaPayment;
use App\EiaAssignApp;
use App\EiaProIv;
use App\EiaCert;
use App\EiaCpd;
use Session;
use App\Cert;
use App\ExamCandidate;
use App\Uploads;

use App\Payment;
use App\Http\Controllers\MasterLayoutController;

class EiaIndexController extends Controller
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
        $master = (new MasterLayoutController())->getSec('eia');
        
        $eiaannounce = EiaAnnounce::count();
        $eiaapplicant = EiaApplicant::count();
        //$eiapayment = EiaPayment::count();
        //$eiaassignapp = EiaAssignApp::count();
        //$eiaproiv = EiaProIv::count();
        //$eiacert = EiaCert::count();
          $applicantApproved=EiaApplicant::where('status','=','Approved')->count();
            $obj= new stdClass();
            $obj->name='Approved';
            $obj->y=$applicantApproved;
            
        $applicantPending=EiaApplicant::where('status','=','In Process...')->count();
            $obj1= new stdClass();
            $obj1->name='Pending';
            $obj1->y=$applicantPending;
            
        $donut[]=$obj;
        $donut[]=$obj1;

        $eiacpd = EiaCpd::count();
        
        $cat = 'eia';
        
        //count payment
        $eiapayment = Payment::where('payment_for','=',$cat)->count();
         $ietspaymentPre = Payment::where('payment_for','=',$cat)->where('type','=','PRE-QUALIFICATION REGISTRATION')->count();
            $pre=new stdClass();
            $pre->name='PRE-QUALIFICATION';
            $pre->y=$ietspaymentPre;
            $pre->drilldown='PRE-QUALIFICATION REGISTRATION';
        $ietspaymentRes = Payment::where('payment_for','=',$cat)->where('type','=','RESEAT EXAMINATION')->count();
            $res=new stdClass();
            $res->name='RESEAT EXAMINATION';
            $res->y=$ietspaymentRes;
            $res->drilldown='RESEAT EXAMINATION';
        $ietspaymentCert = Payment::where('payment_for','=',$cat)->where('type','=','renewal_cert')->count();
            $ren=new stdClass();
            $ren->name='CERTIFICATE RENEWAL';
            $ren->y=$ietspaymentCert;
            $ren->drilldown='CERTIFICATE RENEWAL';
        $paymentList = Payment::where('type','=','renewal_cert')->get();
        foreach($paymentList as $pay){
            $cert = Cert::find($pay->payment_for);
            if(!empty($cert) && $cert->category ==='eia'){
                $eiapayment++;
            }
        }
          $pie[]=$pre;
        $pie[]=$res;
        $pie[]=$ren;
        //count assigment
        $eiaassignapp = ExamCandidate::with('examSchedules')->whereHas('examSchedules',function($q)use($cat){
            $q->where('category','=',$cat);
        })->where('status','=','passed')
          ->where('status_assigment','=','created')->count();
       
        
         //count interview
        $eiaproiv =  ExamCandidate::with('examSchedules')->whereHas('examSchedules',function($q)use($cat){
            $q->where('category','=',$cat);
        })->where('status_assigment','=','passed')->where('status_interview','=','pending')->count();
        
        //count cert
        $eiacert = Cert::where('category','=',$cat)->where('status','=','created')->count();
     
       
        return view('eiaindex.create', compact('master','eiaannounce', 'eiaapplicant', 'eiapayment', 'eiaassignapp', 'eiaproiv', 'eiacert', 'eiacpd'))->with('donut',json_encode($donut))->with('pie',json_encode($pie));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $eiaindex = new EiaIndex;

        return redirect() -> route(('eiaindex.show'),$eiaindex->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
}

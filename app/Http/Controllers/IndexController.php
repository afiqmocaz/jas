<?php

namespace App\Http\Controllers;
use stdClass;
use Illuminate\Http\Request;
use App\Index;
use App\Announce;
use App\Applicant;
use App\Payment;
use App\AssignApp;
use App\ProIv;
use App\Cert;
use App\Cpd;
use Session;
use App\APCSSME_addinfo;
use App\ExamCandidate;
use App\Http\Controllers\MasterLayoutController;

class IndexController extends Controller
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
        
        $master = (new MasterLayoutController())->getSec('apcs');
        
        $announce = Announce::count();
        $applicant = Applicant::count();
        //$payment = Payment::count();
        //$assignapp = AssignApp::count();
        //$proiv = ProIv::count();
        //$cert = Cert::count();
           $applicantApproved=Applicant::where('status','=','Approved')->count();
            $obj= new stdClass();
            $obj->name='Approved';
            $obj->y=$applicantApproved;
            
        $applicantPending=Applicant::where('status','=','In Process...')->count();
            $obj1= new stdClass();
            $obj1->name='Pending';
            $obj1->y=$applicantPending;
            
        $donut[]=$obj;
        $donut[]=$obj1;

        $cpd = Cpd::count();
       $addinfo = APCSSME_addinfo::count();
       
       
        $cat = 'apcs';
        
        //count payment
        $payment = Payment::where('payment_for','=',$cat)->count();
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
                $payment++;
            }
        }
        $pie[]=$pre;
        $pie[]=$res;
        $pie[]=$ren;
        //count assigment
       
        $assignapp = ExamCandidate::with('examSchedules')->whereHas('examSchedules',function($q)use($cat){
            $q->where('category','=',$cat);
        })->where('status','=','passed')
          ->where('status_assigment','=','created')->count();
        
         //count interview
        $proiv = ExamCandidate::with('examSchedules')->whereHas('examSchedules',function($q)use($cat){
            $q->where('category','=',$cat);
        })->where('status_assigment','=','passed')->count();
        
        //count cert
         $cert = Cert::where('category','=',$cat)->where('status','=','created')->count();
       
        return view('index.create', compact('master','announce', 'applicant', 'payment', 'assignapp', 'proiv', 'cert', 'cpd','addinfo'))->with('donut',json_encode($donut))->with('pie',json_encode($pie));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $index = new Index;

        return redirect() -> route(('index.show'),$index->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $index = Index::all();
        return view('index.show', compact('index'));
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

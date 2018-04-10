<?php

namespace App\Http\Controllers;
use stdClass;
use Illuminate\Http\Request;
use App\IetsIndex;
use App\IetsAnnounce;
use App\IetsApplicant;
use App\IetsPayment;
use App\IetsAssignApp;
use App\IetsProIv;
use App\IetsCert;
use App\IetsCpd;
use App\SMEaddinfo;
use Session;
use App\Payment;
use App\Cert;
use App\ExamCandidate;
use App\Uploads;
use App\Http\Controllers\MasterLayoutController;

class IetsIndexController extends Controller
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
        
        $master = (new MasterLayoutController())->getSec('iets');
        
        $ietsannounce = IetsAnnounce::count();
        $ietsapplicant = IetsApplicant::count();
//        $ietspayment = IetsPayment::count();
//        $ietsassignapp = IetsAssignApp::count();
//        $ietsproiv = IetsProIv::count();
//        $ietscert = IetsCert::count();

        $applicantStatus=['Approved','In Process...'];
        foreach ($applicantStatus as  $sta) {
             $applicantCount=IetsApplicant::where('status','=',$sta)->count();
            $obj= new stdClass();
            $obj->name=$sta;
            $obj->y=$applicantCount;
            $donut[]=$obj;
        }

        $ietscpd = IetsCpd::count();
	    $addinfo = SMEaddinfo::count();
                
        $cat = 'iets';
        $paymentType=[];
        $paymentType=['PRE-QUALIFICATION REGISTRATION','RESEAT EXAMINATION','renewal_cert'];
        $statuss=['Approved','Declined','In Process...'];
        foreach ($paymentType as $sub) {
        $bayaran=Payment::where('payment_for','=',$cat)->where('type','=',$sub)->count();
            $pre=new stdClass();
            $pre->name=$sub;
            $pre->y=$bayaran;
            $pre->drilldown=$sub;
            $pie[]=$pre;
            //drilldown data
            $drill=new stdClass();
            $drill->name=$sub;
            $drill->id=$sub;
            foreach($statuss as $status){
                $pay=Payment::where('payment_for','=',$cat)->where('type','=',$sub)->where('status','=',$status)->count();
                $drill->data[]=[$status,$pay];
            }
            $Arr[]=$drill;
        }


     

        //count payment
        $ietspayment = Payment::where('payment_for','=',$cat)->count();

        $paymentList = Payment::where('type','=','renewal_cert')->get();
        foreach($paymentList as $pay){
            $cert = Cert::find($pay->payment_for);
            if(!empty($cert) && $cert->category ==='iets'){
                $ietspayment++;
            }
        }
   
        //count assigment
       
        $ietsassignapp = ExamCandidate::with('examSchedules')->whereHas('examSchedules',function($q)use($cat){
            $q->where('category','=',$cat);
        })->where('status','=','passed')
          ->where('status_assigment','=','created')->count();
        
       
      

         //count interview
        $ietsproiv =   ExamCandidate::with('examSchedules')->whereHas('examSchedules',function($q)use($cat){
            $q->where('category','=',$cat);
        })->where('status_assigment','=','passed')->where('status_interview','=','pending')->count();
        
        //count cert
        $ietscert = Cert::where('category','=',$cat)->where('status','=','created')->count();
        
       
                
        return view('ietsindex.create', compact('master','ietsannounce', 'ietsapplicant', 'ietspayment', 'ietsassignapp', 'ietsproiv', 'ietscert', 'ietscpd','addinfo'))->with('donut',json_encode($donut))->with('pie',json_encode($pie))->with('Arr',json_encode($Arr));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ietsindex = new IetsIndex;

        return redirect() -> route(('ietsindex.show'),$ietsindex->id);
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

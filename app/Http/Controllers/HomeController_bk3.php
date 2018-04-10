<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserAction;
use Auth;
use App\IetsRefference;
use App\IetsSyllabus;
use App\IetsAssignment;
use App\Refference;
use App\Assignment;
use App\Syllabus;
use App\Test;
use App\Uploads;
use App\IetsAssignApp;
use App\User;
use App\APCSUpload;
use App\AssignApp;
use App\EiaUpload;
use App\EiaAssignApp;
use App\RoleUser;
use App\EiaApplicant;
use App\IetsApplicant;
use App\Applicant;
use App\Payment;
use App\Cert;
use App\ExamCandidate;
class HomeController extends Controller
{
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    
    public function redirectRole(){

        $userId = Auth::user()->id;
                
        $getRole = RoleUser::with('role')->where('user_id','=',$userId)->first();
        
        
        
        
        if(!empty($getRole)){
            
        
        $ROLE = $getRole->role->name; 
          
        if($ROLE === 'applicants'){
            
        $eiaApplicant = EiaApplicant::where('user_id','=',$userId)->first(); //user aprroved or not
        $ietsApplicant = IetsApplicant::where('user_id','=',$userId)->first(); //user aprroved or not
        $apcsApplicant = Applicant::where('user_id','=',$userId)->first();
        
        
        $join = ['examCandidates','payInfo'];
        
        $paymentEia = Payment::with($join)
                ->where('payment_for','=','eia')
                //->where('type','=','PRE-QUALIFICATION REGISTRATION')
                ->where('user_id','=',$userId)->orderBy('id', 'desc')->get();
         $EiapayApprove=Payment::where('payment_for','=','eia')->where('user_id','=',$userId)->where('status','=','Approved')->get()->count();
       
       
        $paymentIets = Payment::with($join)
                ->where('payment_for','=','iets')
                //->where('type','=','PRE-QUALIFICATION REGISTRATION')
                ->where('user_id','=',$userId)->orderBy('id', 'desc')->get();
        $IetspayApprove=Payment::where('payment_for','=','iets')->where('user_id','=',$userId)->where('status','=','Approved')->get()->count();

       
        $paymentApcs = Payment::with($join)
                ->where('payment_for','=','apcs')
                //->where('type','=','PRE-QUALIFICATION REGISTRATION')
                ->where('user_id','=',$userId)->orderBy('id', 'desc')->get();

        
      
        $eiaConsultant = Cert::where('user_id','=',$userId)->where('category','=','eia')->get();
        $ietsConsultant = Cert::where('user_id','=',$userId)->where('category','=','iets')->get();
        $apcsConsultant = Cert::where('user_id','=',$userId)->where('category','=','apcs')->get();
         //return $paymentEia;
      
            $data = [

                 'eiaConsultant'=> $eiaConsultant,
                 'ietsConsultant'=> $ietsConsultant,
                 'apcsConsultant'=> $apcsConsultant,

                 'eiaApplicant'=> $eiaApplicant,
                 'ietsApplicant'=> $ietsApplicant,
                 'apcsApplicant'=> $apcsApplicant,

                 'paymentEia'=> $paymentEia,
                 'paymentIets'=> $paymentIets,
                 'paymentApcs'=> $paymentApcs,
                 'retakeExam' => 3,
                 'IetspayApprove'=>$IetspayApprove,
                 'EiapayApprove'=>$EiapayApprove,
            ];
        
        
            return view('starter')->with($data);
            
        }else if($ROLE === 'seceia'){
            return redirect('/eiaindex/create');
        }else if($ROLE === 'seciets'){
            return redirect('/ietsindex/create');
        }else if($ROLE === 'secapcs'){
            return redirect('/index/create');
        }else if($ROLE === 'admin'){
            return redirect('/users');
        }
        else if($ROLE === 'smeeia' ){
           return redirect('/secretariat_assigment/eia');
        }
        else if($ROLE === 'smeiets'){
            return redirect('/secretariat_assigment/iets');
        }
        else if($ROLE === 'smeapcs'){
             return redirect('/secretariat_assigment/apcs');
        }

        
        
//        else if($ROLE === 'smeapcs'){
//           return redirect('/secretariat_assigment/apcs');
//        }else if($ROLE === 'smeeia'){
//           return redirect('/secretariat_assigment/eia');
//        }else if($ROLE === 'smeiets'){
//           return redirect('/secretariat_assigment/iets');
//        }
        
        
        }else{
            return 'ERROR_ : no role assigned for user_id '.$userId;
        }
        
        
    
      
    }
    
    public function __construct()
    {
        $this->middleware('auth');
    }
	/**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index3()
    {
         return view('home');
    }


//---------------------EIA---------------------    
	public function index2() 		        //|
    {									    //|
	return view('secEIA.index');		    //|
}										    //|
										    //|
	public function announcement2()		    //| 
    {									    //|
	return view('secEIA.announcement');    	//|
}										    //|
										    //|
	public function news2() 				//|
    {										//|
	return view('secEIA.new');				//|
}											//|
											//|
	public function app2() 					//|
    {										//|
	return view('secEIA.app');				//|
}											//|
											//|
	public function appinfo2() 				//|
    {										//|
	return view('secEIA.appinfo');			//|
}											//|
											//|
	public function applicant2() 			//|
    {										//|
	return view('secEIA.applicant');		//|
}											//|
											//|
	public function assignapp2() 			//|
    {										//|
	return view('secEIA.assignapp');		//|
}											//|
											//|
	public function assignment2() 			//|
    {										//|
	return view('secEIA.assignment');		//|
}											//|
											//|
	public function assignpanel2() 			//|
    {										//|
	return view('secEIA.assignpanel');		//|
}											//|
											//|
	public function cert2() 				//|
    {										//|
	return view('secEIA.cert');				//|
}											//|
											//|
	public function compexam2() 			//|
    {										//|
	return view('secEIA.compexam');			//|
}											//|
											//|
	public function qp2() 					//|
    {										//|
	return view('secEIA.qp');				//|
}											//|
											//|
	public function cpd2() 					//|
    {										//|
	return view('secEIA.cpd');				//|
}											//|
											//|
	public function endorse2() 				//|
    {										//|
	return view('secEIA.endorse');			//|
}											//|
											//|
	public function exam2() 				//|
    {										//|
	return view('secEIA.exam');				//|
}											//|
											//|
	public function examattend2() 			//|
    {										//|
	return view('secEIA.examattend');		//|
}											//|
											//|
	public function exambank2() 			//|
    {										//|
	return view('secEIA.exambank');			//|
}											//|
											//|
	public function payinfo2() 				//|
    {										//|
	return view('secEIA.payinfo');			//|
}											//|
											//|
	public function payment2() 				//|
    {										//|
	return view('secEIA.payment');			//|
}											//|
											//|
	public function proiv2() 				//|
    {										//|
	return view('secEIA.proiv');			//|
}											//|
											//|
	public function quiz() 					//|
    {										//|
	return view('secEIA.quiz');				//|
}											//|
											//|
public function quizres() 					//|
    {										//|
	return view('secEIA.quizresult');		//|
}											//|
											//|
	public function rubric2() 				//|
    {										//|
	return view('secEIA.rubric');			//|
}											//|
											//|
	public function setiv2() 				//|
    {										//|
	return view('secEIA.setiv');			//|
}											//|
											//|
	public function self() 					//|
    {										//|
	return view('secEIA.selflearning');		//|
}//___________________________________________|


//---------------------IETS--------------------    
	public function index1() 		        //|
    {									    //|
	return view('secIETS.index');		    //|
}										    //|
										    //|
	public function announcement1()		    //| 
    {									    //|
	return view('secIETS.announcement');    //|
}										    //|
										    //|
	public function news1() 				//|
    {										//|
	return view('secIETS.new');				//|
}											//|
											//|
	public function app1() 					//|
    {										//|
	return view('secIETS.app');				//|
}											//|
											//|
	public function appinfo1() 				//|
    {										//|
	return view('secIETS.appinfo');			//|
}											//|
											//|
	public function applicant1() 			//|
    {										//|
	return view('secIETS.applicant');		//|
}											//|
											//|
	public function assignapp1() 			//|
    {										//|
	return view('secIETS.assignapp');		//|
}											//|
											//|
	public function assignment1() 			//|
    {										//|
	return view('secIETS.assignment');		//|
}											//|
											//|
	public function assignpanel1() 			//|
    {										//|
	return view('secIETS.assignpanel');		//|
}											//|
											//|
	public function cert1() 				//|
    {										//|
	return view('secIETS.cert');			//|
}											//|
											//|
	public function compexam1() 			//|
    {										//|
	return view('secIETS.compexam');		//|
}											//|
											//|
	public function cp1() 					//|
    {										//|
	return view('secIETS.cp');				//|
}											//|
											//|
	public function cpd1() 					//|
    {										//|
	return view('secIETS.cpd');				//|
}											//|
											//|
	public function endorse1() 				//|
    {										//|
	return view('secIETS.endorse');			//|
}											//|
											//|
	public function exam1() 				//|
    {										//|
	return view('secIETS.exam');			//|
}											//|
											//|
	public function examattend1() 			//|
    {										//|
	return view('secIETS.examattend');		//|
}											//|
											//|
	public function exambank1() 			//|
    {										//|
	return view('secIETS.exambank');		//|
}											//|
											//|
	public function payinfo1() 				//|
    {										//|
	return view('secIETS.payinfo');			//|
}											//|
											//|
	public function payment1() 				//|
    {										//|
	return view('secIETS.payment');			//|
}											//|
											//|
	public function proiv1() 				//|
    {										//|
	return view('secIETS.proiv');			//|
}											//|
											//|
	public function refference1() 			//|
    {										//|
	return view('secIETS.refference');		//|
}											//|
											//|
	public function rubric1() 				//|
    {										//|
	return view('secIETS.rubric');			//|
}											//|
											//|
	public function setiv1() 				//|
    {										//|
	return view('secIETS.setiv');			//|
}											//|
											//|
	public function syllibus1() 			//|
    {										//|
	return view('secIETS.syllibus');		//|
}//___________________________________________|


//-------------------APCS----------------------    
	public function index() 		        //|
    {									    //|
	return view('secAPCS.index');		    //|
}										    //|
										    //|
	public function announcement()		    //| 
    {									    //|
	return view('secAPCS.announcement');    //|
}										    //|
										    //|
	public function news() 					//|
    {										//|
	return view('secAPCS.new');				//|
}											//|
											//|
	public function app() 					//|
    {										//|
	return view('secAPCS.app');				//|
}											//|
											//|
	public function appinfo() 				//|
    {										//|
	return view('secAPCS.appinfo');			//|
}											//|
											//|
	public function applicant() 			//|
    {										//|
	return view('secAPCS.applicant');		//|
}											//|
											//|
	public function assignapp() 			//|
    {										//|
	return view('secAPCS.assignapp');		//|
}											//|
											//|
	public function assignment() 			//|
    {										//|
	return view('secAPCS.assignment');		//|
}											//|
											//|
	public function assignpanel() 			//|
    {										//|
	return view('secAPCS.assignpanel');		//|
}											//|
											//|
	public function cert() 					//|
    {										//|
	return view('secAPCS.cert');			//|
}											//|
											//|
	public function compexam() 				//|
    {										//|
	return view('secAPCS.compexam');		//|
}											//|
											//|
	public function cp() 					//|
    {										//|
	return view('secAPCS.cp');				//|
}											//|
											//|
	public function cpd() 					//|
    {										//|
	return view('secAPCS.cpd');				//|
}											//|
											//|
	public function endorse() 				//|
    {										//|
	return view('secAPCS.endorse');			//|
}											//|
											//|
	public function exam() 					//|
    {										//|
	return view('secAPCS.exam');			//|
}											//|
											//|
	public function examattend() 			//|
    {										//|
	return view('secAPCS.examattend');		//|
}											//|
											//|
	public function exambank() 				//|
    {										//|
	return view('secAPCS.exambank');		//|
}											//|
											//|
	public function payinfo() 				//|
    {										//|
	return view('secAPCS.payinfo');			//|
}											//|
											//|
	public function payment() 				//|
    {										//|
	return view('secAPCS.payment');			//|
}											//|
											//|
	public function proiv() 				//|
    {										//|
	return view('secAPCS.proiv');			//|
}											//|
											//|
	public function refference() 			//|
    {										//|
	return view('secAPCS.refference');		//|
}											//|
											//|
	public function rubric() 				//|
    {										//|
	return view('secAPCS.rubric');			//|
}											//|
											//|
	public function setiv() 				//|
    {										//|
	return view('secAPCS.setiv');			//|
}											//|
											//|
	public function syllibus() 				//|
    {										//|
	return view('secAPCS.syllibus');		//|
}											//|
											//|
//___________________________________________|


public function create() 				//|
    {										//|
	return view('announce.create');			//|
}		

public function store() 				//|
    {										//|
	return view('announce.store');			//|
}										//|
											//|
	public function show() 				//|
    {										//|
	return view('announce.show');		//|
}	

public function create1() 				//|
    {										//|
	return view('syllabus.create');			//|
}		

public function store1() 				//|
    {										//|
	return view('syllabus.store');			//|
}										//|
											//|
	public function show1() 				//|
    {										//|
	return view('syllabus.show');		//|
}	

public function create2() 				//|
    {										//|
	return view('refference.create');			//|
}		

public function store2() 				//|
    {										//|
	return view('refference.store');			//|
}										//|
											//|
	public function show2() 				//|
    {										//|
	return view('refference.show');		//|
}	

public function create3() 				//|
    {										//|
	return view('schedule.create');			//|
}		

public function store3() 				//|
    {										//|
	return view('schedule.store');			//|
}										//|
											//|
	public function show3() 				//|
    {										//|
	return view('schedule.show');		//|
}	
public function iets_syllabus()
    {
		$useraction = UserAction::all();
		$useresult = Test::all();
		$user_actions = new UserAction;
		$user_actions->user_id = Auth::id();
		$user_actions->action = "created";
		$user_actions->action_model = "syllabus";
		$user_actions->action_id = "1";
		//$user_actions->status = 'complete';
		$user_actions->save();
		$ietssyllabus = IetsSyllabus::take(1)->latest()->get();
                
                $category = "iets";
                $master = (new MasterLayoutController())->getApplicant('iets');
             
        return view('iets.iets_syllabus', ['master' => $master,'category' => $category,'ietssyllabus' => $ietssyllabus,'useraction'=>$useraction],compact('ietssyllabus','useraction','useresult'));  
    }
    
    public function aplicant_iets_syllabus($payment_id)
    {
              
               
                $payment = Payment::find($payment_id);
                $category =  $payment->payment_for;
        
        
		$useraction = UserAction::all();
		$useresult = Test::all();
		$user_actions = new UserAction;
		$user_actions->user_id = Auth::id();
		$user_actions->action = "created";
		$user_actions->action_model = "syllabus";
		$user_actions->action_id = "1";
		//$user_actions->status = 'complete';
		$user_actions->save();
		$ietssyllabus = IetsSyllabus::take(1)->latest()->get();
                
               
                $master = (new MasterLayoutController())->getApplicant($category);
             
        return view('iets.iets_syllabus', ['master' => $master,'category' => $category,'ietssyllabus' => $ietssyllabus,'useraction'=>$useraction],compact('payment','examCandidate','ietssyllabus','useraction','useresult'));  
    }
	
	
	public function iets_profile()
    {
        return view('iets.iets_profile');
    }
	public function iets_examquestion()
    {
        return view('iets.iets_examquestion');
    }
		 public function iets_exam()
    {
		$iets_examschedule = examschedule::all();
        return view('iets.iets_exam',['iets_examschedule' =>$iets_examschedule]);
    }
	
	 public function iets_pcer()
    {

		$useraction = UserAction::all();
		$useresult = Test::all();
    	$user_actions = new UserAction;
		$user_actions->user_id = Auth::id();
		$user_actions->action = "created";
		$user_actions->action_model = "iets_pcer";
		$user_actions->action_id = "1";
		//$user_actions->status = 'complete';
		$user_actions->save();
		  $eiaassignment = IetsAssignment::take(1)->latest()->get();
		  return view('iets.iets_pcer', ['eiaassignment' => $eiaassignment],compact('eiaassignment','useraction','useresult'));    
    
    }
	
	 public function iets_iv()
    {
    	$useresult = Test::all();
		$useraction = UserAction::all();
		$iets_interview = interview::all();
		
		return view('iets.iets_iv',['iets_interview' => $iets_interview,'useraction'=>$useraction,'useresult'=>$useresult],compact('iets_interview','useraction','useresult'));  
       // return view('iets_iv');
    }
	
	public function iets_certificate()
    {
        return view('iets.iets_certificate');
    }
    public function eia_cert()
    {
        return view('eia_cert.eia_cert');
    }
	public function iets_reference($payment_id)
    {
            
                $payment = Payment::find($payment_id);
                $category =  $payment->payment_for;
                
                $masterCtrl = new MasterLayoutController;
                $master = $masterCtrl->getApplicant($category);
            
            
		$user_actions = new UserAction;
		$useresult = Test::all();
		$user_actions->user_id = Auth::id();
		$user_actions->action = "created";
		$user_actions->action_model = "reference";
		$user_actions->action_id = "1";
		//$user_actions->status = 'complete';
		$user_actions->save();
		$ietsrefference = IetsRefference::take(1)->latest()->get();
		return view('iets.iets_reference', ['ietsrefference' => $ietsrefference],compact('payment','examCandidate','category','ietsrefference','useresult','master'));  
        
       // return view('iets.iets_reference');
    }
	
	public function iets_cert()
    {
    	$useresult = Test::all();
    	$useraction = UserAction::all();
    	 $user=EiaCert::all();
        return view('iets.iets_cert',compact('useresult','useraction','user'));
    }
	
	public function iets_cpd()
    {
        return view('iets.iets_cpd');
    }
	
	public function apcs_cert()
    {
    	$useresult = Test::all();
    	$useraction = UserAction::all();
        return view('apcs.apcs_cert');
    }
	public function apcs_home()
    {
        return view('apcs.apcs_home');
    }
	/*public function apcs_iv()
    {
		//$iets_interview = iets_interview::take(1)->get();
		$iets_interview = iets_interview::all();
        return view('apcs.apcs_iv',['iets_interview' => $iets_interview]);
    }*/
	public function apcs_certificate()
    {
        return view('apcs.apcs_certificate');
    }
	public function apcs_reference($payment_id)
    {
          $payment = Payment::find($payment_id);
                $category =  $payment->payment_for;   
                
            
    	$useresult = Test::all();
    	$useraction = UserAction::all();
    	$user_actions = new UserAction;
		$user_actions->user_id = Auth::id();
		$user_actions->action = "created";
		$user_actions->action_model = "reference";
		$user_actions->action_id = "1";
		//$user_actions->status = 'complete';
		$user_actions->save();
		 $refference = Refference::take(1)->latest()->get();
		return view('apcs.apcs_reference', ['refference' => $refference],compact('payment','category','refference','useresult','useraction'));  
    }
	
	public function apcs_exam()
    {
        return view('apcs.apcs_exam');
    }
	
    
    public function apcs_pcer()
    {
       
		// $assignment = Assignment::all();
		$useraction = UserAction::all();
		$useresult = Test::all();
    	$user_actions = new UserAction;
		$user_actions->user_id = Auth::id();
		$user_actions->action = "created";
		$user_actions->action_model = "iets_pcer";
		$user_actions->action_id = "1";
		//$user_actions->status = 'complete';
		$user_actions->save();
		 $assignment = assignment::take(1)->latest()->get();
                 
                
        return view('apcs.apcs_pcer', compact('assignment','useraction','useresult'));
        //return view('apcs.apcs_pcer');
    }
	public function apcs_examquestion()
    {
		   // Retrieve a piece of data from the session...
    $value = session('key');

    // Specifying a default value...
    $value = session('key', 'default');

    // Store a piece of data in the session...
    session(['key' => 'value']);
        return view('apcs.apcs_examquestion');
    }
	public function iets_renewcert()
    {
        return view('iets.iets_renewcert');
    }
	
	public function iets_applyrenew()
    {
        return view('iets.iets_applyrenew');
    }
	
	public function iets_preapproved()
    {
        return view('iets.iets_preapproved');
    }
	public function apcs_syllabus($payment_id)
    {
        
                $payment = Payment::find($payment_id);
                $category =  $payment->payment_for;

		$useraction = UserAction::all();
		$useresult = Test::all();
		$user_actions = new UserAction;
		$user_actions->user_id = Auth::id();
		$user_actions->action = "created";
		$user_actions->action_model = "syllabus";
		$user_actions->action_id = "1";
		//$user_actions->status = 'complete';
		$user_actions->save();
		$syllabi = Syllabus::take(1)->latest()->get();
            return view('apcs.apcs_syllabus', ['syllabi' => $syllabi],compact('category','payment','syllabi','useraction','useresult'));  
        
    }
	
	public function apcs_profile()
    {
        return view('apcs.apcs_profile');
    }
	
	public function apcs_renewcert()
    {
        return view('apcs.apcs_renewcert');
    }
	public function apcs_cpd()
    {
        return view('apcs.apcs_cpd');
    }
	
	public function sme()
    {
        return view('sme.sme');
    }
	public function pcersme()
    {
    	
        $assignupload = Uploads::where('category','=','iets');
        $ietsassignapp = IetsAssignApp::all();
        return view('sme.pcersme',compact('assignupload','ietsassignapp'));
    }
	public function eia_sme()
    {
        return view('sme.eia_sme');
    }
	
	public function eia_assign_sme()
    {
        return view('sme.eia_assign_sme');
    }
	
	public function iets_examresult()
    {
        return view('iets.iets_examresult');
    }
	
	public function iets_ivstatus2()
    {
        return view('iets.iets_ivstatus2');
    }
	public function iets_ivstatus()
    {
        return view('iets.iets_ivstatus');
    }
	public function apcsme()
    {
    	
        return view('sme.apcsme');
    }
	
	public function apcspcersme()
    {
    	      $assignupload = Uploads::where('category','=','apcs');
        $apcsassignapp = AssignApp::all();
        return view('sme.apcspcersme',compact('assignupload','apcsassignapp'));
       // return view('sme.apcspcersme');
    }
	
	public function general()
    {
    	 $assignupload = Uploads::where('category','=','eia');
        $eiaassignapp = EiaAssignApp::all();
        return view('sme.general',compact('assignupload','eiaassignapp'));
       // return view('sme.apcspcersme');
        //return view('sme.general');
    }
	
	public function specific()
    {
    	$assignupload = Uploads::where('category','=','eia');
        $eiaassignapp = EiaAssignApp::all();
        return view('sme.specific',compact('assignupload','eiaassignapp'));
       // return view('sme.specific');
    }
	
	public function apcsupload()
    {
        return view('apcs.apcsupload');
    }
	
	public function templatecert()
    {
   		 $user=EiaCert::all();
        return view('templatecert',['user' => $user],compact('user'));
    }

    public function templatecertapcs()
    {
        return view('templatecertapcs');
    }

    public function templatecerteia()
    {
        return view('templatecerteia');
    }
	
	

}
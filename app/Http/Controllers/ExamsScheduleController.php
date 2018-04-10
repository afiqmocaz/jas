<?php

namespace App\Http\Controllers;
use App;
use Illuminate\Http\Request;
use App\EiaSchedule;
use App\ExamCandidate;
use App\QuizModul;
use App\Schedule;
use App\QuizSession;
use App\EiaVenue;
use Session;
use Auth;
use DB;
use App\Http\Controllers\MasterLayoutController;
use Carbon\Carbon;
use App\Payment;
use App\Http\Controllers\TestsController;
use App\EiaApplicant;
use App\IetsApplicant;
use App\Applicant;
use App\ietsSectionE;
use App\IetsAppe;
use App\apcsSectionF;
use App\ApcsAppf;
class ExamsScheduleController extends Controller
{
  
   //Nadiyxshinku89@gmail.com
   //ExamCandidate status
   //created - untuk ambil exam
   //expired - exam time expired tanpa applicant mengambil exam
   //passed  - applicant lulus exam
   //fail    - applicant gagal exam

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
       
        $this->validate($request, array(
            'schedule_id' => 'required'
        ));
        
        $exist = ExamCandidate::where('user_id', '=', Auth::id())
                         ->where('schedule_id','=',$request->schedule_id)
                         ->get();
        
       
        if (count($exist) > 0) {
            return "You have already make the confirmation for the exam";
        } else {
            $examCandidate = new ExamCandidate;
            $examCandidate->user_id = Auth::id();
            $examCandidate->schedule_id = $request->input('schedule_id');
            $examCandidate->seat_available = '1';
            $examCandidate->payment_id = $request->payment_id;
            $examCandidate->save();

            return back();
        }
    }
    
    

    /**
     * Display the specified resource.
     *
     * @param  \App\iets_examschedule  $iets_examschedule
     * @return \Illuminate\Http\Response
     */
    public function show($paymentId) {
        $tokenExam = 2;
        $remaining=0+(ExamCandidate::where('payment_id','=',$paymentId)->count());
        $retakeToken = $tokenExam - (ExamCandidate::where('payment_id','=',$paymentId)->count()-1);
        $results = DB::select(DB::raw('SELECT CURTIME() AS end_time'));
        $currentTimeTemp = $results[0]->end_time;
        $currentTime =  preg_replace("/[^0-9]/","",substr($currentTimeTemp, 0, 5));
        
        
        $payment = Payment::find($paymentId);
        $category = $payment->payment_for;
     
        if((int)$payment->user_id !== (int)Auth::user()->id){
            return "blocked";
        }
    
        $extendLayout = (new MasterLayoutController)->getApplicant($category);
          
        
        $examCandidate = (new ExamController())->getExamCandidate($paymentId);
        
        
        $type = array();
        
        if(empty($examCandidate)){
            $type[] = 'Main Comprehensive Exam';
        }else{
            $type[] = 'Repeat Comprehensive Exam';
        }
        
        $alreadyTake = ExamCandidate::where('user_id','=',Auth::user()->id)->get()->pluck('schedule_id');
        $modulList = QuizModul::all();
        $tempData = Schedule::with(['examCandidates','examtitle'])
                ->whereIn('typeofexam',$type)
                ->whereNotIn('id',$alreadyTake)
                ->where('category', '=', $category)
                ->where('date','>=', date('Y-m-d'))
                ->get();
         
        
        
        $examScheduleList = array();
      

        foreach ($tempData as $data) {
           
            $bilExamCandidate = count($data->examCandidates);
            $numberOfSeat = $data->seat;

            $availableSeat = $numberOfSeat - $bilExamCandidate;
            
            $scheduleStart = preg_replace("/[^0-9]/","",$data->start);
            $currDateTime = preg_replace("/[^0-9]/","",$currentTime);
            
            if ($availableSeat > 0 && count($examScheduleList) <= 1) { // condition for 2 choice only for available seat
                if($data->date > date('Y-m-d')){
                     $examScheduleList[] = $data;
                }else if($data->date == date('Y-m-d')){
                     
                     if($scheduleStart >= $currDateTime){
                       
                         $examScheduleList[] = $data;
                     }
                }
            }
          
        }
        
        //end check
        
        $chooseSchedule = 0;
        
        if(empty($examCandidate) || $examCandidate->status ==='failed'){
            $chooseSchedule = 1;
        }
              
        if($chooseSchedule === 1){
            
            
            return view('examschedules.choose_schedule_view', ['examScheduleList' => $examScheduleList], compact('category','retakeToken','examCandidateCount','examuser', 'modulList','extendLayout','useresult','paymentToken','examCandidate','payment','tokenExam','remaining'))->withschedule($examScheduleList);
        }
        
        $takeExam = 0;
        
        $examScheduleCount = count($examCandidate->examSchedules);
        
        
        
        if($examScheduleCount > 0){
             $examSchedule = $examCandidate->examSchedules[$examScheduleCount-1];
             
             $time = strtotime($examSchedule->date.' '.$examSchedule->start);
             $startExamTime = date('m/d/Y h:i A',$time);
             
             
              return view('examschedules.examconfirm', compact(
                    'category',
                    'examSchedule',
                    'extendLayout',
                    'startExamTime',
                    'examCandidate',
                    'payment'  
                     
                     ));
             
        }
       
        
        
        return count($examCandidate->examSchedules);
        
        
       
      
        }
        
        
        
        

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\iets_examschedule  $iets_examschedule
     * @return \Illuminate\Http\Response
     */
    public function edit(apcs_examschedule $apcs_examschedule)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\iets_examschedule  $iets_examschedule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, apcs_examschedule $apcs_examschedule)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\iets_examschedule  $iets_examschedule
     * @return \Illuminate\Http\Response
     */
    public function destroy(apcs_examschedule $apcs_examschedule)
    {
        //
    }
   public function NewRegistration($paymentId)
    {
        $payment = Payment::find($paymentId);
        // return $payment->payment_for;
        if($payment->payment_for==="iets"){
        $ietsApplicant = IetsApplicant::where('user_id','=',Auth::id())->first(); 
        $ietsApplicant->status="ReRegister";
        $ietsApplicant->save();
        $examCandidate=ExamCandidate::where('payment_id','=',$paymentId);
        $examCandidate->delete();
        $payment = Payment::find($paymentId);
        $payment->delete();
        $ietsSectionE = ietsSectionE::where('user_id',Auth::id());
                $ietsSectionE-> delete();
                $ietsappe = IetsAppe::where('user_id',Auth::id());
                 if(!empty($ietsappe)){$ietsappe->delete();}
                $ietsSectionE-> delete();
        }
        else if($payment->payment_for==="apcs")
        {
                $apcsApplicant = Applicant::where('user_id','=',Auth::id())->first(); 
                $apcsApplicant->status="ReRegister";
                $apcsApplicant->save();
                $examCandidate=ExamCandidate::where('payment_id','=',$paymentId);
                $examCandidate->delete();
                $payment = Payment::find($paymentId);
                $payment->delete();
                $apcsSectionF = apcsSectionF::where('user_id',Auth::id());
                $apcsSectionF-> delete();
                $apcsappf = ApcsAppf::where('user_id',Auth::id());
                 if(!empty($apcsappf)){$apcsappf->delete();}
                $apcsSectionF-> delete();
        }

         return redirect("/home");
    }
}


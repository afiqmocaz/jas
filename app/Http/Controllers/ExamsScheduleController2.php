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

            return redirect("examschedules/" . $request->category);
        }
    }
    
    

    /**
     * Display the specified resource.
     *
     * @param  \App\iets_examschedule  $iets_examschedule
     * @return \Illuminate\Http\Response
     */
    public function show($category) {
        
        $results = DB::select(DB::raw('SELECT CURTIME() AS end_time'));
        $currentTimeTemp = $results[0]->end_time;
        $currentTime =  preg_replace("/[^0-9]/","",substr($currentTimeTemp, 0, 5));
    
        $extendLayout = (new MasterLayoutController)->getApplicant($category);
          
         $examCandidateFilter = (new ExamController())->getExamCandidate($category);
        
        $type = array();
        
        if(empty($examCandidateFilter)){
            $type[] = 'Main Comprehensive Exam';
        }else{
            $type[] = 'Repeat Comprehensive Exam';
        }
    
        $modulList = QuizModul::all();
        $tempData = Schedule::with(['examCandidates','examtitle'])
                ->whereIn('typeofexam',$type)
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
       
        $examCandidate = DB::table('exam_candidates')
            ->join('schedules', 'exam_candidates.schedule_id', '=', 'schedules.id')
            ->where('exam_candidates.user_id','=',Auth::user()->id)
            ->whereIn('status',['created','attended']) 
            ->where('schedules.category','=',$category)->get(); 
        
       
        
        $examCandidate = ExamCandidate::where('schedule_id','=',$examCandidate->schedule_id)->get();
        
        
      
        if(count($examCandidate) > 0){
      
        if (!empty($examCandidate) && !empty($examCandidate->examSchedules) && ($examCandidate->status ==='created' || $examCandidate->status ==='attended')) {
            
            
            $examSchedule = Schedule::find($examCandidate->schedule_id);
            $examDateS = strtotime($examSchedule->date);
            $examDate = date("Y-m-d",$examDateS);
            $startTime = preg_replace("/[^0-9]/","",$examSchedule->start);
            $endTime = preg_replace("/[^0-9]/","",$examSchedule->end);
           
            $isExamTime = ($currentTime >= $startTime && $currentTime <=$endTime);
            //check exam time
            $dateExam = preg_replace("/[^0-9]/","",$examDate);
            $dateToday = preg_replace("/[^0-9]/","",date('Y-m-d'));
            
            $testCtrl = new TestsController;
         
            $endExamSession = ExamCandidate::
                 where('user_id','=',Auth::user()->id)
               ->where('schedule_id','=',$examSchedule->id)
               ->first();
            
            
            $endExamSession->status = 'failed';
           
            if($dateToday > $dateExam){
                 $endExamSession->update();
            }
         
            
          
            if($dateToday == $dateExam){
               
                if($currentTime > $endTime){
                     $endExamSession->update();
                }
                
                 
             
                if(json_encode($isExamTime) === 'true'){
                     return redirect('take_exam/'.$examSchedule->id);
                }
            }
          
             $time = strtotime($examSchedule->date.' '.$examSchedule->start);
             $startExamTime = date('m/d/Y h:i A',$time);
            
             return view('examschedules.examconfirm', compact(
                    'category',
                    'examSchedule',
                    'useresult',
                    'extendLayout',
                    'startExamTime',
                    'examCandidate'
                     
                     ));
        }
        
        }
 
       $examCandidate = (new ExamController())->getExamCandidate($category);
       
      
       $payment = Payment::with('payInfo')->where('payment_for','=',$category)->where('status','=','Approved')->where('user_id','=',Auth::user()->id)->orderBy('id', 'desc')->first();
       $paymentToken = 0;
       if(!empty($payment)){
          $paymentToken = count(ExamCandidate::where('payment_id','=',$payment->id)->get());
       
       }
        
       return view('examschedules.choose_schedule_view', ['examScheduleList' => $examScheduleList], compact('category','examuser', 'modulList','extendLayout','useresult','paymentToken','examCandidate','payment'))->withschedule($examScheduleList);
      
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

    
}


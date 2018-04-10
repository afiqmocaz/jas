<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\IetsSchedule;
use App\IetsRepeatExam;
//use App\EiaExamTitle;
use App\IetsVenue;
use Session;
use Auth;
use DB;
use App\UserAction;
use App\Test;


class RepeatExamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $useresult=Test::all();
        $useraction=UserAction::all();
     $eia_examschedule = IetsSchedule::where('typeofexam', '=', 'Repeat Comprehensive Exam')->take(1)->get();
     $ietsuserexam=IetsRepeatExam::all();
      $venue =IetsVenue::all();
      $examuser=\DB::table('exam_candidates')
            ->select('schedule_id', \DB::raw('count(user_id)'))
            ->groupBy('schedule_id')
            ->get();
      //$examschedule = $iets_examschedule->examschedule;
      //$examuser=ExamCandidate::count();
       // return view('examschedules.index', compact('eiaschedule', 'eiaexamtitles', 'eiavenues', 'examuser'));
        if (IetsRepeatExam::where('user_id', '=', Auth::id())->exists()){

         return view('iets_repeatexam.repeatexam',compact('examuser','ietsuserexam','venue','eia_examschedule','examschedule','useresult','useraction'));

        }
        
           /* $trytest=Test::where('user_id','=',Auth::id()->where('result','<=',79))->get();
            if($trytest->result <=79){
            return view('iets.iets_syllabus');
            }*/
        return view('iets_repeatexam.index',['eia_examschedule' => $eia_examschedule,'ietsuserexam'=>$ietsuserexam,'useraction'=>$useraction,'useresult'=>$useresult],compact('examuser','ietsuserexam','useraction','useresult'))->withschedule($eia_examschedule);
         } 
            
    //$examuser=UserExamDetails::count('user_id')->groupBy('schedule_id');
//$examuser=UserExamDetails::groupBy('schedule_id')->count('user_id');
         //$iets_examschedule = iets_examschedule::all();
        
        
        
        
    //$examuser=UserExamDetails::count();
    
    /*$count=App\iets_examschedule::where(['exam_seatavailable'=>0])->count();*/
        
        
    
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { //iets_examschedule
        //
        /*$schedule = new iets_examschedule;
        $schedule->exam_date = Input::get('exam_date');
    $schedule->exam_time = Input::get('exam_time');
    $schedule->exam_venue = Input::get('exam_venue');
    $schedule->exam_seatavailable = Input::get('exam_seatavailable');
    $schedule->save();
dd( Input::all() );
    return Redirect::back();*/
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         
 $useresult=Test::all();
         $this->validate($request, array(
            'schedule_id' => 'required'
            ));
            
            if (IetsRepeatExam::where('user_id', '=', Auth::id())->exists()) {
            $examuser1=DB::table('eia_schedules')
            ->whereExists(function ($query) {
                $query->select(DB::raw('user_id'))
                      ->from('exam_candidates')
                      ->whereRaw('schedules.id = exam_candidates.schedule_id');
            })->get();
            
        return response($examuser, 422);
        //return response('You have already make the confirmation for the exam', 422);
    }
        else{
    UserAction::create([
                'user_id'     => Auth::id(),
                'action'     => 'confirmed',
                'action_model' => 'iets_examschedule',
                'action_id'   => '1',
            ]);

       $ietsuserexam = new IetsRepeatExam;
        $ietsuserexam->user_id = Auth::id();
        $ietsuserexam->schedule_id = $request->input('schedule_id');
        $ietsuserexam->seat_available='1';
        $ietsuserexam->save();
        /*return response('You have already make the confirmation', 422);
        return view('iets_schedules.index',['eia_examschedule' => $eia_examschedule,'ietsuserexam'=>$ietsuserexam],compact('examuser1','ietsuserexam'));*/
        return redirect() -> route(('iets_repeatexam.index'));
    
        }
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\iets_examschedule  $iets_examschedule
     * @return \Illuminate\Http\Response
     */
    public function show(apcs_examschedule $apcs_examschedule)
    {
        //
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
    /*public function iets_exam(){
        /*$examuser=UserExamDetails::count();
         $iets_examschedule = iets_examschedule::all();
        if(($iets_examschedule->last()->exam_seatavailable - $examuser) ==1){
         $ietsuserexam=UserExamDetails::where(
    ['schedule_id', '=', $iets_examschedule->last()->id],
    ['user_id', '=', Auth::id()]);
        }
        else{
            //$nextUserID = iets_examschedule::where('id', '>', $currentUser->id)->min('id');
            return response("hai");
        }
        
     $iets_examschedule = Schedule::take(1)->get();
     $ietsuserexam=new UserExamDetails;
//$examuser = DB::table('ietsuserexam')->select(DB::raw('count(*) user_id'))->groupBy('schedule_id')->get();

            
    //$examuser=UserExamDetails::count('user_id')->groupBy('schedule_id');
$examuser=UserExamDetails::groupBy('schedule_id')->count('user_id');
         //$iets_examschedule = iets_examschedule::all();
        if (UserExamDetails::where('user_id', '=', Auth::id())->exists()){
            if(UserExamDetails::where('schedule_id', '=',$iets_examschedule->id )){
         return view('iets.iets_examconfirm',['iets_examschedule' => $iets_examschedule,'ietsuserexam'=>$ietsuserexam],compact('examuser','ietsuserexam'));
            }
        }
        
        
    //$examuser=UserExamDetails::count();
    
    /*$count=App\iets_examschedule::where(['exam_seatavailable'=>0])->count();
        
        return view('iets.iets_exam',['iets_examschedule' => $iets_examschedule,'ietsuserexam'=>$ietsuserexam],compact('examuser','ietsuserexam'));
    
    
    }*/
    /*public function confirm(){
        
         $this->validate($request, array(
            'schedule_id' => 'required'
            ));
            
            if (UserExamDetails::where('user_id', '=', Auth::id())->exists()) {
            $examuser1=DB::table('schedule')
            ->whereExists(function ($query) {
                $query->select(DB::raw('user_id'))
                      ->from('ietsuserexam')
                      ->whereRaw('schedule.id =ietsuserexam.schedule_id');
            })->get();
$examuser=$examuser1->count();
        return response($examuser, 422);
        //return response('You have already make the confirmation for the exam', 422);
    }
        else{
        //$examuser=ExamCandidate
       $ietsuserexam = new UserExamDetails;
        $ietsuserexam->user_id = Auth::id();
        $ietsuserexam->schedule_id = $request->input('schedule_id');
        $ietsuserexam->seat_available='1';
        $ietsuserexam->save();
        return response('You have already make the confirmation', 422);
       return view('iets.iets_exam',['iets_examschedule' => $iets_examschedule,'ietsuserexam'=>$ietsuserexam],compact('examuser','ietsuserexam')); 
    
    /*if (UserExamDetails::where('user_id', '=', Auth::id())->exists()) {
        return response('You have already make the confirmation', 422);
        
    }
    
    else{
        
        //$examuser=UserExamDetails::count();
        //$examuser=DB::table('ietsuserexam')->groupBy('schedule_id')->count();
//$examuser=DB::table('ietsuserexam')->count(DB::raw('DISTINCT schedule_id'));
        //$examuser=UserExamDetails::count('user_id')->groupBy('schedule_id');
//$examuser=UserExamDetails::groupBy('schedule_id')->count('user_id');
        //$ietsuserexam=new UserExamDetails;
        /*$iets_examschedule = Schedule::all();
        foreach($iets_examschedule as &$iets_examschedule){
        $ietsuserexam=new UserExamDetails;
        if($ietsuserexam->count() < $iets_examschedule->seat_available){
        $ietsuser2->user_id = Auth::id();
        $ietsuser2->schedule_id = $iets_examschedule->id;
        $ietsuser2->seat_available=$iets_examschedule->seat;
        $ietsuser2->save();
        
        }}*/
        
    /*  $ietsuserexam=UserExamDetails::where(
    ['schedule_id', '=', $iets_examschedule->id],
    ['user_id', '=', Auth::id()]);
            
return response('You have already make the confirmation', 422);
        return view('iets.iets_exam',['iets_examschedule' => $iets_examschedule,'ietsuserexam'=>$ietsuserexam],compact('examuser','ietsuserexam')); 
    }
    }*/
    
    
}


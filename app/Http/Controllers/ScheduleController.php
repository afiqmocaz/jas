<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Schedule;
use App\ExamTitle;
use App\Exam;
use App\Venue;
use Session;
use App\Http\Controllers\MasterLayoutController;
use App\ExamCandidate;
use App\User;
use DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\JasvSystem;
class ScheduleController extends Controller
{

    
    public function show($category)
    {
        $disableCancel = 0;
        $masterCtrl = new MasterLayoutController;
        $master = $masterCtrl->getSec($category);
        
        $scheduleB = Schedule::with('examCandidates');
        $scheduleB->where('category','=',$category);
        
        $type = array();
        $type[] = 'Main Comprehensive Exam';
        $type[] = 'Repeat Comprehensive Exam';
        
        $scheduleB->whereIn('typeofexam',$type);
        $scheduleB->orderBy('date', 'DESC')->get();
        $schedule = $scheduleB->orderBy('start', 'DESC')->get();
        
        $examtitles = ExamTitle::all();
        $exam = Exam::count();
        $venues = Venue::all();
           
        return view('schedule.schedule_view', compact('master','schedule','category', 'examtitles','exam', 'venues','disableCancel'));
    }
    
    public function showTime($category,$time)
    {
        $disableCancel = 0;
        $masterCtrl = new MasterLayoutController;
        $master = $masterCtrl->getSec($category);
        
        $results = DB::select(DB::raw('SELECT CURTIME() AS end_time'));
        $currentTimeTemp = $results[0]->end_time;
        $currentTime =  preg_replace("/[^0-9]/","",substr($currentTimeTemp, 0, 5));
        
        $schedule = [];
        $type = array();
        $type[] = 'Main Comprehensive Exam';
        $type[] = 'Repeat Comprehensive Exam';
        
        
        if($time === "available"){
            
            $disableCancel = 1;
            
            $tempData = Schedule::with('examCandidates')
                ->whereIn('typeofexam',$type)
                ->where('category', '=', $category)
                ->where('date','>=', date('Y-m-d'))
                ->get();
     
            foreach ($tempData as $data) {

                    $scheduleStart = preg_replace("/[^0-9]/","",$data->start);
                    $currDateTime = preg_replace("/[^0-9]/","",$currentTime);
                        if($data->date > date('Y-m-d')){
                            $schedule[] = $data;
                        }else if($data->date == date('Y-m-d')){
                             if($scheduleStart >= $currDateTime){
                                $schedule[] = $data;
                       }

                }
                }
        }else if($time === "ended"){
            $tempData = Schedule::with('examCandidates')
                ->whereIn('typeofexam',$type)
                ->where('category', '=', $category)
                ->where('date','<=', date('Y-m-d'))
                ->get();
     
            foreach ($tempData as $data) {

                    $scheduleEnd = preg_replace("/[^0-9]/","",$data->end);
                    $currDateTime = preg_replace("/[^0-9]/","",$currentTime);
                        if($data->date < date('Y-m-d')){
                             $schedule[] = $data;   
                        }else if($data->date == date('Y-m-d')){

                             if($scheduleEnd <= $currDateTime){
                                $schedule[] = $data;
                             }

                }
                }
        }
        
        $examtitles = ExamTitle::all();
        $exam = Exam::count();
        $venues = Venue::all();
        return view('schedule.schedule_view', compact('master','schedule','category', 'examtitles','exam', 'venues','disableCancel'));
    }
    
    public function store(Request $request)
    {
        
        
      
        $this->validate($request, array(

            'typeofexam' => 'required',
            'examtitle_id' => 'required|integer',
            'date' => 'required',
            'start' => 'required',
            'end' => 'required',
            'venue_id' => 'required|integer',
            'address' => 'required',
            'state' => 'required',
            'seat' => 'required'

            ));

        //store in the database

        $schedule = new Schedule;
        $schedule->category = $request->category;
        $schedule->typeofexam = $request->typeofexam;
        $schedule->examtitle_id = $request->examtitle_id;
        $schedule->date = $request->date;
        $schedule->start = $request->start;
        $schedule->end = $request->end;
        $schedule->venue_id = $request->venue_id;
        $schedule->address = $request->address;
        $schedule->state = $request->state;
        $schedule->seat = $request->seat;

        $schedule -> save();

        Session::flash('success', 'The exam schedule has been added!');

        // $examtitles = new ExamTitle;
        // $examtitles->examtitle = $request->examtitles;

        // $schedule->save();

        return redirect('/schedule/'.$request->category);
    }

    
    

    public function edit($id)
    {
        // find the post in the database and save as a var
        $schedule = Schedule::find($id);
        $examtitles = ExamTitle::all();
        $cats = array();
        foreach ($examtitles as $cat) {
            $cats[$cat->id] = $cat->examtitle;
        }
        $venues = Venue::all();
        $catvs = array();
        foreach ($venues as $catv) {
            $catvs[$catv->id] = $catv->venue;
        }
        
        $masterCtrl = new MasterLayoutController;
        $master = $masterCtrl->getSec($schedule->category);
        
        $data = array();
        $data['master'] = $master;
        $data['category'] = $schedule->category;
        
        return view('schedule.edit')
                ->withschedule($schedule)
                ->withexamtitles($cats)
                ->withvenues($catvs)
                ->with($data);
               
    }
    
    public function remind(Request $request){
        
        $ecList = ExamCandidate::where('schedule_id','=',$request->id)->get();
                
        $schedule = Schedule::find($request->id);
        
        foreach ($ecList as $value) {
           $user = User::find($value->user_id);
           $data = array();
          
           
           $data[] = "Please be noted";
           $data[] = "Exam Schedule for ".  strtoupper($schedule->category).' consultant';
           $data[] = "Type : ".$schedule->typeofexam;
           $data[] = "Date : ".$schedule->date;
           $data[] = "Time : ".$schedule->start." - ".$schedule->end;
           $data[] = "Address : ".$schedule->address.", ".$schedule->state;
       
           
           $data['name'] = $user->name;
           $data['textList'] = $data;
           Mail::to($user)->send(new JasvSystem($data));
        }
        
        return back();
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, array(

            'typeofexam' => 'required',
            'examtitle_id' => 'required|integer',
            'date' => 'required',
            'start' => 'required',
            'end' => 'required',
            'venue_id' => 'required|integer',
            'address' => 'required',
            'state' => 'required',
            'seat' => 'required'

            ));

        //store in the database
        $schedule = Schedule::find($id);

        $schedule->typeofexam = $request->input('typeofexam');
        $schedule->examtitle_id = $request->input('examtitle_id');
        $schedule->date = $request->input('date');
        $schedule->start = $request->input('start');
        $schedule->end = $request->input('end');
        $schedule->venue_id = $request->input('venue_id');
        $schedule->address = $request->input('address');
        $schedule->state = $request->input('state');
        $schedule->seat = $request->input('seat');

        $schedule -> save();

        Session::flash('success', 'The exam schedule has been updated!');

        return redirect("/schedule/".$schedule->category);
    }

   
    public function destroy($id)
    {
       
        $ecList = ExamCandidate::where('schedule_id','=',$id)->get();
                
        $schedule = Schedule::find($id);
        
        foreach ($ecList as $value) {
           $user = User::find($value->user_id);
           $data = array();
          
           
           $data[] = "Please be noted";
           $data[] = "Exam Schedule for ".  strtoupper($schedule->category).' has been canceled';
           $data[] = "Type : ".$schedule->typeofexam;
           $data[] = "Date : ".$schedule->date;
           $data[] = "Time : ".$schedule->start." - ".$schedule->end;
           $data[] = "We are sorry for inconvenience";
           
           $data['name'] = $user->name;
           $data['textList'] = $data;
           Mail::to($user)->send(new JasvSystem($data));
        }
        
        $schedule = Schedule::find($id);
        $schedule->delete();
        
        Session::flash('message', 'The exam schedule has been canceled!');
        return back();
    }
    
    
    public function viewAttendant($scheduleId){
        $join = array();
        $join[] = "examtitle";
        $join[] = "venue";
        $schedule = Schedule::with($join)->find($scheduleId);
        
        $masterCtrl = new MasterLayoutController;
        $master = $masterCtrl->getSec($schedule->category);
        
        $data = array();
        $data['master'] = $master;
        $data['category'] = $schedule->category;
        $data['schedule'] = $schedule;
       
        return view('schedule.attendant_view')
                ->with($data);
    }
    
    public function setExamCandidateStatus(Request $req){
        
        $ob = ExamCandidate::find($req->id);
        $ob->status = $req->status;
        $ob->save();
       
        return redirect('schedule_attendant/'.$ob->schedule_id);
    }
    
    public function findAttendant(Request $req){
        $join = array();
        $join[] = 'user';
        $builder = ExamCandidate::with($join);
        
        if(!empty($req['id'])){
            $builder->where('id','=', $req['id']);
        }
        if(!empty($req['schedule_id'])){
            $builder->where('schedule_id','=', $req['schedule_id']);
        }
        
        $res = new \stdClass();
        $res->data = $builder->get();
        return json_encode($res);
    }
    
}

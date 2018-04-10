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
class ScheduleController extends Controller
{

    public function index()
    {
        $masterCtrl = new MasterLayoutController;
        $master = $masterCtrl->getSec($category);
        
        $schedule = Schedule::all();
        $examtitles = ExamTitle::all();
        $exam = Exam::count();
        $venues = Venue::all();
        
        return view('schedule.schedule_view', compact('master','schedule', 'examtitles','exam', 'venues'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('schedule.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($category)
    {
        
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
        return view('schedule.schedule_view', compact('master','schedule','category', 'examtitles','exam', 'venues'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
        $schedule = Schedule::find($id);

        $schedule->delete();

        Session::flash('success', 'The exam schedule has been deleted!');
        return redirect()->route('schedule.schedule_view');
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

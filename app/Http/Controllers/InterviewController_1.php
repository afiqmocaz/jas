<?php

namespace App\Http\Controllers;
use Auth;
use App\Http\Controllers\MasterLayoutController;
use Illuminate\Http\Request;
use App\ExamCandidate;
use stdClass;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\ListMasterController;

use App\User;
use App\Venue;
use App\IvSchedule;
use App\Cert;

class InterviewController extends Controller
{
   
    
    public function viewApplicant($category) {

        $user = User::find(Auth::user()->id);
        $examCtrl = new ExamController();
        $examCandidate = $examCtrl->getExamCandidate($category);
        
        if(empty($examCandidate)){
            return redirect('examschedules/'.$category);
        }
        

        $extendLayout = (new MasterLayoutController)->getApplicant($category);

        $data = array();
        $data['examCandidate'] = $examCandidate;
        $data['category'] = $category;
        $data['master'] = $extendLayout;
        
      
        return view('applicant.view_interview')->with($data);
    }

    public function view($category){
      
       $venues = Venue::all()->pluck('venue', 'id');
       $extendLayout = (new MasterLayoutController)->getSec($category);
       
       $data = array();
   
       $data['category'] = $category;
       $data['master'] = $extendLayout;
       $data['venues'] = $venues;
               
       $data['listIvSFS'] = (new ListMasterController())->listInterviewStatusForSecretariat();
       
       return view('secretariat.view_interview')->with($data);
       
   }
   
   public function find(Request $req) {

        $builder = ExamCandidate::with(['user', 'examSchedules','ivSchedule.venue']);

        $builder->whereHas('examSchedules', function($q) use ($req) {
            if(!empty($req['category'])){
                 $q->where('category', '=', $req['category']);
            }
        });
        $builder->where('status_assigment', 'passed');
        $res = new \stdClass();
        $res->data = $builder->get();
        return json_encode($res);
    }
    
    public function assign(Request $req) {

        $res = new stdClass();
        $res->status = 'success';
        $textError = ' required';

        
        
        if (empty($req->title)) {
            $res->status = 'error';
            $error[] = "Title of Interview" . $textError;
        }
        if (empty($req->date)) {
            $res->status = 'error';
            $error[] = "date" . $textError;
        }
        if (empty($req->time)) {
            $res->status = 'error';
            $error[] = "time" . $textError;
        }
         if (empty($req->address)) {
            $res->status = 'error';
            $error[] = "address" . $textError;
        }
         if (empty($req->state)) {
            $res->status = 'error';
            $error[] = "state" . $textError;
        }
        
        
        $status = $res->status;
        if ($status === 'error') {
            $res->data = $error;
        } else {
            $ecS = IvSchedule::where('exam_candidate', '=', $req->exam_candidate);
            $ecS->delete();

            $ivSchedule = new IvSchedule($req->except('_token'));
            $ivSchedule->save();
            
            $examCandidate = ExamCandidate::find($req->exam_candidate);
            $examCandidate->status_interview = 'assigned';
            $examCandidate->update();
            
            $res->data = json_encode($ivSchedule);
        }
        
        return json_encode($res);
    }
    
    public function setStatus(Request $req){
        
         $examCandidate = ExamCandidate::with('examSchedules')->find($req->exam_candidate);
         $examCandidate->status_interview = 'assigned';
         $examCandidate->update();
         
         return $examCandidate;
       
    }
    
    public function applicantSetStatus(Request $req){
        
         $examCandidate = ExamCandidate::with('examSchedules')->find($req->id);
         $examCandidate->status_interview = $req->status_interview;
         $examCandidate->update();
         
         return redirect('/interview_applicant/'.$examCandidate->exam_schedules[0]->category);
       
    }
    
     public function  secretariatSetStatus(Request $req){
         
         $examCandidate = ExamCandidate::with('examSchedules')->find($req->id);
         
         $examCandidate->status_interview = $req->status_interview;
         $examCandidate->update();
         
      
         
         if($examCandidate->status_interview === "passed"){
             $cert = new Cert();
             $cert->user_id = $examCandidate->user_id;
             $cert->exam_candidate_id = $examCandidate->id;
             $cert->category = $req->category;
             $cert->save();
         }
        
         return redirect('/interview/'.$examCandidate->examSchedules[0]->category);
       
    }
    
   


}

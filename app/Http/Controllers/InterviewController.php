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
use Illuminate\Support\Facades\Mail;
use App\Mail\JasvSystem;
use App\Mail\AssignInterview;
use App\Payment;

class InterviewController extends Controller
{
   
    
    public function viewApplicant($examCandidateId) {

        $user = User::find(Auth::user()->id);
        $examCandidate = ExamCandidate::find($examCandidateId);
        $payment = Payment::find($examCandidate->payment_id);
        $category =  $payment->payment_for;
        
        if(empty($examCandidate)){
            return redirect('examschedules/'.$category);
        }
        
        if((int)$payment->user_id !== (int)Auth::user()->id){
            return "blocked";
        }
        

        $extendLayout = (new MasterLayoutController)->getApplicant($category);

        $data = array();
        $data['examCandidate'] = $examCandidate;
        $data['category'] = $category;
        $data['master'] = $extendLayout;
        $data['payment'] = $payment;
      
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
        
        if(!empty($req['status_interview'])){
                $builder->where('status_interview', '=', $req['status_interview']);
        }

   
        $builder->where('status_assigment', 'passed');
   
        $res = new \stdClass();
          if(!empty($req['idIv'])){
            $idIv=$req['idIv'];
             $builder->whereHas('ivSchedule', function ($query) use($idIv) {
    $query->where('id', '=', $idIv);
});
              $res->data = $builder->first();
        return json_encode($res);
        }
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
                                    
            //aisyah@grtech.com.my
            //send email to inform candidate to attend interview
            $user=User::find($examCandidate->user_id);
            
            $dataS = IvSchedule::with('venue')->find($ivSchedule->id);
            //return $dataS;
            $send = array();
            $send[]="Please be informed that you are required to attend interview session for the 
            EIA Consultant Registration.";
            $send[]="Details as the followings:";
            $send[] = $dataS->title;
            $send[] = 'Date : '.$dataS->date;
            $send[] = 'Time : '.$dataS->time;
            $send[] = 'Vanue : '.$dataS->venue->venue;
            $send[] = 'Address : '.$dataS->address.','.$dataS->state;
            
            $send[] = 'Please log in to the system and acknowledge the interview schedule.';
            
            $data['name'] = $user->name;
            $data['textList'] = $send;
            Mail::to($user)->send(new JasvSystem($data));
            
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
        
         return back();
       
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
             
             
//             //aisyah@grtech.com.my
//            //send email to inform candidate has passed the interview
//            $user=User::find($examCandidate->user_id);
//            Mail::to($user)->send(new PassInterview ($user));
             
             
         }
         
        $textList[] = "Please informed";
        if ($examCandidate->status_interview === "passed") {
            $textList[] = 'Congratulation, have passed the interview for '.strtoupper($req->category).' consultant';
        } else if ($examCandidate->status_interview === "failed") {
            $textList[] = 'We are sorry you have failed the interview for '.strtoupper($req->category).' consultant';
        }
        $user = User::find($examCandidate->user_id);
        $data = array();
        $data['name'] = $user->name;
        $data['textList'] = $textList;
        
        Mail::to($user)->send(new JasvSystem($data));

        return redirect('/interview/'.$examCandidate->examSchedules[0]->category);
       
    }
    
   


}

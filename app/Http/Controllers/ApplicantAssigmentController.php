<?php

namespace App\Http\Controllers;

use App\Uploads;
use App\Http\Controllers\MasterLayoutController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Assignment; //apcs
use App\EiaAssignment; //EIA
use App\IetsAssignment; //IETS
use Validator;
use Response;
use Redirect;
use Session;
use Auth;
use App\User;
use DB;
use App\Test;
use Carbon\Carbon;
use App\ExamCandidate;
use App\Http\Controllers\ExamController;
use App\Payment;

class ApplicantAssigmentController extends Controller {
    
    public function view($examCandidateId) {
      
        $examCandidate = ExamCandidate::find($examCandidateId);
        $payment = Payment::find($examCandidate->payment_id);
        $category =  $payment->payment_for;
        
        if((int)$payment->user_id !== (int)Auth::user()->id){
            return "blocked";
        }
     
        $masterCtrl = new MasterLayoutController;
        $master = $masterCtrl->getApplicant($category);
        
        if(empty($examCandidate)){
            return redirect('examschedules/'.$category);
        }
        
        $dateExam = $examCandidate->date;
        
            $join = array();
            $join[] = 'rubrics';
            //$join[] = 'percentage';

            $uploadB = Uploads::with($join);
            $uploadB->where('exam_candidate_id','=',$examCandidate->id)
                    ->where('upload_type',"main_upload")
                    ->whereNull('deleted_at');
            $upload = $uploadB->get();
            
            $uploadS = Uploads::with($join)->where('exam_candidate_id','=',$examCandidate->id)->where('upload_type',"spec_upload")
            ->whereNull('deleted_at')->get();
            $uploadAS = Uploads::with($join)->where('exam_candidate_id','=',$examCandidate->id)->where('upload_type',"addspec_upload")
            ->whereNull('deleted_at')->get();
            
            if(empty($examCandidate->question_id)){
                
                $questionId = 0;
                if($category === 'eia'){
                    $questionId = EiaAssignment::inRandomOrder()->first()->id;
                }
                if($category === 'apcs'){
                    $questionId = Assignment::all()->first()->id;
                }
                if($category === 'iets'){
                    $questionId = IetsAssignment::all()->first()->id;
                }
                
                $examCandidate->question_id = $questionId;
                $examCandidate->update();
                
            }


            $uploadAdditional = Uploads::with($join);
                        $uploadAdditional->where('exam_candidate_id','=',$examCandidate->id)
                                ->where('upload_type',"additional_upload")
                                ->whereNull('deleted_at');
                        $uploadAdditional = $uploadAdditional->get();


            $eiaAssigment = EiaAssignment::inRandomOrder()->first();
            $apcsAssigment = Assignment::all()->first();
            $ietsAssigment = IetsAssignment::all()->first();

            
            $examDate = Carbon::parse($dateExam);
        $eiaAssigment = array();
        $apcsAssigment = array();
        $ietsAssigment = array();
      
        if($category === 'eia'){
           $eiaAssigment = EiaAssignment::find($examCandidate->question_id); 
            
           $time = strtotime($examDate->addDays((int)$eiaAssigment->duration));
        }else if($category === 'apcs'){
            $apcsAssigment = Assignment::find($examCandidate->question_id);  
            
           $time = strtotime($examDate->addDays((int)$apcsAssigment->duration));
        }else if($category === 'iets'){
             $ietsAssigment = IetsAssignment::find($examCandidate->question_id);  
            
            $time = strtotime($examDate->addDays((int)$ietsAssigment->duration));
        }
        
       $todayTime = strtotime(date('Y-m-d')); 
       
       $isExpired = 0;
       
       if($todayTime > $time){
           $isExpired = 1;
       }
      
       
       $finishAssigmentTime = date('m/d/Y h:i A',$time);
      
       
        $title = 'Assignment for Pollution Control Engineering Report(PCER)';
        
        $allowUpload = 1;
        
        $maxUpload = 10;
        
         if($upload->count() > $maxUpload ){
              $allowUpload = 0;
          }
        
       
        $data = array();
        $data['category'] = $category;
        $data['master'] = $master;
        $data['upload'] = $upload;
        $data['uploadAdditional'] = $uploadAdditional;
        
        $data['apcsAssigment'] = $apcsAssigment;
        $data['eiaAssigment'] = $eiaAssigment;
        $data['ietsAssigment'] = $ietsAssigment;
        $data['title'] = $title;
        $data['allowUpload'] = $allowUpload;
        $data['finishAssigmentTime'] = $finishAssigmentTime;
        $data['isExpired'] = $isExpired;
        $data['examCandidate'] = $examCandidate;
        $data['payment'] = $payment;
        $data['maxUpload'] = $maxUpload;
        $data['uploadS']=$uploadS; 
        $data['uploadAS']=$uploadAS;          
        return view('applicant_assigment.view_assigment')->with($data);
    }
    
      public function upload(Request $request) {
        
        // $files = Input::file('images');
        // getting all of the post data
        $files = Input::file('images');
        // Making counting of uploaded images
        $file_count = count($files);
        $file_count = 10;
        //aisyah@grtech.com.my
        //added to handle submission without attaching any file
        if (!Input::hasFile('images'))
            return Redirect::to('applicant_assigment/'.$request->category);

        // start count how many uploaded
        $uploadcount = 0;
        
        foreach ($files as $file) {
            $rules = array('file' => 'required|mimes:pdf|max:10240'); //'required|mimes:pdf'
            $validator = Validator::make(array('file' => $file), $rules);
            if ($validator->passes()) {
                $destinationPath = 'uploads'; // upload folder in public directory
                $extension = $file->getClientOriginalExtension();
                $uniqueFileName = $request->category.'_'.Auth::user()->id.'_'.date('Y').date('m').date('d').'_'.date('h').'_'.date('m').'_'.date('s').'.'.$extension;
          
                
                $filename = $file->getClientOriginalName();
                $upload_success = $file->move($destinationPath, $uniqueFileName);
                $uploadcount ++;

                // save into database
               
                $entry = new Uploads();
                $entry->user_id = Auth::id();
                $entry->mime = $file->getClientMimeType();
                $entry->original_filename = $filename;
                $entry->sizefile = $file->getClientSize();
                   
                $entry->filename = $uniqueFileName;
                $entry->category = $request->category;
                $entry->question = $request->question;

                //aisyah@grtech.com.my
                //save candidate exam id
               
                $entry->exam_candidate_id = $request->examCandidateId;
                $entry->save();
            }
        }

        if ($uploadcount == $file_count) {
            Session::flash('Success', 'The syllabus has been successfully added!');
            return back();
        } else {
            Session::flash('Unsuccessful', 'The file upload is not pdf file or the size is too big. Please try again.');
           return back();
        }
    }
    
    
    public function remove(Request $request) {
        
        $upload = Uploads::find($request->id);
        $upload->delete();
        return back();
    }
    
    public function find(Request $req){
        
        $join = array();
        $join[] = 'user';
        //aisyah@grtech.com.my
        //added assigned panel user table relationship
        $join[] = 'panel';
        $join[] = 'rubrics';
        $join[] = 'rubrics';
        $join[] = 'examCandidate';
        $join[] = 'additionalFile';
        $join[] = 'addspecFile';
        
        $builder = Uploads::with($join);
        
//        if(!empty($req['category'])){
//            $builder->where('category','=', $req['category']);
//        }
//        
         if(!empty($req['assign_panel'])){
            $builder->where('assign_panel','=', $req['assign_panel']);
        }
              
        $res = new \stdClass();
        $res->data = $builder->get();
        return json_encode($res);
    }
    

}

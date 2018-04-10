<?php

namespace App\Http\Controllers;

use App\Uploads;
use App\Http\Controllers\MasterLayoutController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Validator;
use Response;
use Redirect;
use Session;
use Auth;
use App\User;
use DB;
use Illuminate\Support\Facades\Mail;
use App\ExamCandidate;
use stdClass;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\ListMasterController;
use App\Mail\PassInterview;
use App\Mail\JasvSystem;
use App\Mail\SendComment;

class SecAssignAppController extends Controller {

    public function view($category) {

        $masterCtrl = new MasterLayoutController;
        $master = $masterCtrl->getSec($category);

        $smeRoleId = 0;
        if($category === 'eia'){
            $smeRoleId = 13;
        }else if($category === 'iets'){
            $smeRoleId = 14;
        }else if($category === 'apcs'){
            $smeRoleId = 12;
        }
        
        $sme = User::join("role_user", "role_user.user_id", "=", "users.id")->where("role_user.role_id", '=', $smeRoleId)->pluck('name', 'id');

        $data = array();
        $data['category'] = $category;
        $data['sme'] = $sme;
        $data['master'] = $master;
        $data['list'] = (new ListMasterController())->listInterviewStatusForSecretariat();
        return view('secretariat.view_applicant_assignment')->with($data);
    }

    public function find(Request $req) {

        $builder = ExamCandidate::with('user');
        $builder->whereHas('uploads', function($q) use ($req) {
            $q->where('category', '=', $req['category']);
        });
        $builder->with(['uploads' => function($q) use ($req) {
                $q->with(['rubrics', 'panel']);
                $q->where('category', '=', $req['category']);
            }]);

                $res = new \stdClass();
                $res->data = $builder->get();
                return json_encode($res);
            }

            //aisyah@grtech.com.my
            //panel assignment for EIA,APCS,IETS
            public function assign(Request $request) {
                $uploadId = $request->input('id');
                $panelId = $request->input('panel_id');

                $assignPanel = Uploads::find($uploadId);
                $assignPanel->assign_panel = $panelId;
                $assignPanel->save();

                return back();
            }

            //aisyah@grtech.com.my
            //assignment status for EIA,APCS,IETS
            public function setStatus(Request $request) {
                $examId = $request->input('id');
                $status = $request->input('status');

                $setStatus = ExamCandidate::find($examId);
                $setStatus->status_assigment = $status;
                $setStatus->save();
                
                
                if($setStatus->status_assigment === 'failed'){
                    $textList[] = "You have failed the assigment";
                }else if($setStatus->status_assigment === 'passed'){
                    $textList[] = "Congratulation, your application for 
EIA Consultant Registration has passed assignment stage.";
                    $textList[]="Please wait for an interview schedule.The interview will be scheduled by the secretariat.";
                }
                $user = User::find($setStatus->user_id);
                $data = array();
                $data['name'] = $user->name;
                $data['textList'] = $textList;
                
                Mail::to($user)->send(new JasvSystem($data));

                return back();
            }





            //faridi2u [at] gmail.com
            //send email to 
            public function sendComment(Request $request) {

                $upload_record = Uploads::find($request->upload_id2);
                $user = User::find($upload_record->user_id);
                
                $textList[] = "Please be informed that we request that you perform the following action as per requested by SME \n\n\n\n\n\n\n";
                $textList[] = $request->comment_text;
                
                $data = array();
                $data['name'] = $user->name;
                $data['textList'] = $textList;
                
                Mail::to($user)->send(new SendComment($data));

                return back();
            }

        }
        
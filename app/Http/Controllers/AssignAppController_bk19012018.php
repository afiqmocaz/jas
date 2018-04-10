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

class AssignAppController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $user = User::all();
        $assignapp = AssignApp::all();
        $assignupload = APCSUpload::all();
        
         $sme = User::join("role_user","role_user.user_id","=","users.id")->where("role_user.role_id",'=',12)->pluck('name');
        return view('assignapp.create', compact('user','assignapp','assignupload','sme'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $assignapp = new AssignApp;
        $assignapp->applicantname = $request->input('appname');
        $assignapp->IC = $request->input('appic');
        $assignapp->upload = $request->input('fileupload');
        $assignapp->panel = $request->input('panel');
        $assignapp->softdate = $request->input('softdate');
        $assignapp->harddate = $request->input('harddate');
        $assignapp->user_id = Auth::id();
        $assignapp -> save();

        return redirect() -> route(('assignapp.create'),$assignapp->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
    
    //Nadiyxshinkku89@gmail.com
    //secratiate assigment for EIA,APCS,IETS
     public function view($category)
     {
        $masterCtrl = new MasterLayoutController;
        $master = $masterCtrl->getSec($category);
        
        $isUserSme = User::whereHas('roles', function($q){
                 $q->whereIn('role_id',[12,13,14]);
         })->where('id', '=', Auth::user()->id)->get();
        
        if(count($isUserSme) > 0){
            $data = array();
            $data['category'] = $category;
            //$data['master'] = 'layouts.app5';
            $data['master'] = $master; // azhari mustapa, azhari@nafa.my, 017-2235411, 15/1/2018
           
            return view('secretariat.view_assigment')->with($data);
        }else{
            return redirect('secretariat_assign_app/'.$category);
        }
      
     }

     //aisyah@grtech.com.my
     //panel assignment for EIA,APCS,IETS
     public function assign(Request $request){
        $uploadId=$request->input('upload_id');
        $panelId=$request->input('panel_id');

        $assignPanel = Uploads::find($uploadId);
        $assignPanel->assign_panel=$panelId;
        $assignPanel->save();

        return back();

     }

     //aisyah@grtech.com.my
     // assignment status for EIA,APCS,IETS
     public function setStatus(Request $request){
        $uploadId=$request->input('upload_id');
        $status=$request->input('status');

        $setStatus = Uploads::find($uploadId);
        $setStatus->status=$status;
        $setStatus->save();

        return back();

     }
     
     
      public function setHardCopyDate(Request $request){
      
        $setStatus = Uploads::find($request->input('upload_id'));
        $setStatus->date_hardcopy=$request->input('date_hardcopy');
        $setStatus->save();

        return back();

     }



     public function SetSMEComment(Request $request){
      
        $setStatus = Uploads::find($request->input('upload_id'));
        $setStatus->sme_request_text=$request->input('text_smecomment');
        $setStatus->save();

        return back();

     }
    
}

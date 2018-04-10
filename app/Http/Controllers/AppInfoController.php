<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Mail\Mailer;
use App\AppInfo;
use App\apcsSectionA;
use App\Applicant;
use App\User;
use Session;
use Mail;
use App\Mail\Approve;
use Auth;
use Illuminate\Support\Facades\Input;
use App\Mail\JasvSystem;

class AppInfoController extends Controller
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

    public function apcsapprove(Request $request)
    {
         $appinfo1 = AppInfo::find($request->user_id);
         $apcsSectionA = apcsSectionA::find($request->user_id);
    Mail::send('emails.appapprove', array('appinfo1'=> $appinfo1), function ($message) use ($apcsSectionA)
        {
            $message->from('nafauser49@gmail.com', 'Jabatan Alam Sekitar');
            $message->to($apcsSectionA->email)->subject('New Registration');
          

            $message->subject('Pre-Qualification Registration of Applicant Information');

        });
        Session::flash('success', 'The approval has been send to the applicant Email.');
        return redirect()-> route('applicant.create');
    }

    public function apcsdecline(Request $request)
    {
      
       
        $apcsSectionA = apcsSectionA::find($request->user_id);
        
                      $appinfo = AppInfo::find($request->user_id);
        
    Mail::send('emails.appdecline', array('appinfo'=> $appinfo), function ($message) use ($apcsSectionA)
        {

            $message->to($apcsSectionA->email)->subject('New Registration');

            $message->subject('Pre-Qualification Registration of Applicant Information');

        });
        Session::flash('success', 'The declination has been send to the applicant Email.');
        //return redirect()->back();
        return redirect() -> route(('applicant.create'),['appinfo'=>$appinfo]);
    }


    public function create()
    {
        $apcsSectionA = apcsSectionA::all();
        //$user = user::all();
        return view('appinfo.create', compact('apcsSectionA', 'user'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $appinfo = new AppInfo;

        $appinfo->comment = $request->comment;

        $appinfo -> save();

        Session::flash('success', 'The comment has been added!');

        return redirect() -> route(('applicant.create'),$appinfo->id);
    }

   
    
     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $appinfo = AppInfo::all();
        return view('appinfo.show', compact('appinfo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $master = (new MasterLayoutController)->getSec('apcs');
       
        $applicant = Applicant::find($id);
        $user = User::find($applicant->user_id);
        return view('appinfo.edit',compact('applicant','master'))->withuser($user);
    }

    public function update(Request $request, $id)
    {
        
        
         $this->validate($request, array(
            'comment' => 'required',
            'status' => 'required',
            ));
        
        $applicant = Applicant::find($id);
        
        $appinfo = AppInfo::where('user_id','=',$applicant->user->id)->first();
  if(empty($appinfo)){
      $appinfo = new AppInfo;

         $appinfo->comment = $request->comment;
        $appinfo->status = $request->status;
       $appinfo->email=Auth::user()->email;

        $appinfo -> save();

  }
        $appinfo->comment = $request->comment;
        $appinfo->status = $request->status;
        $applicant->comment = $request->comment;
        $applicant->status = $request->status;

        $appinfo -> save();
        $applicant -> save();

        Session::flash('success', 'The comment has been added!');
        
        $textList[] = "Pre-Qualification Registration of Applicant Information for APCS Consultant.";
        $textList[] = "";
       
        
        $user = User::find($applicant->user_id);
        $data = array();
        $data['name'] = $user->name.' ('.$user->nric.')';
        
        if($request->status === "Approved"){
           
            
            $textList[] = "Your application has been approved, Therefore, you can proceed to the next process which is payment.";
             $textList[] = "";
            $textList[] = "The amount of fee that you need to pay is RM 3,500.00. You can make the payment via cash or cheque. Cash payment can be made at EiMAS Office and cheque payment should be made payable to 'Pengarah Institut Alam Sekitar Malaysia'.";
             $textList[] = "";
            $textList[] = "Please print out this email and attach together with your payment";
             $textList[] = "";
            $textList[] = "#Please upload your payment receipt to the system.";
        }else{
            $textList[] = "Your application has been declined";
            
            $count = 1;
            if(!empty($request->reason1)){
                $textList[] = $count.'. '.$request->reason1;
                $count++;
            }
            if(!empty($request->reason2)){
                 $textList[] = $count.'. '.$request->reason2;
                  $count++;
            }
            if(!empty($request->reason3)){
                 $textList[] = $count.'. '.$request->reason3;
                  $count++;
            }
            
        }
       
        //$textList[] = "Comment : ".$request->comment;
        $data['textList'] = $textList;
        
        Mail::to($user)->send(new JasvSystem($data));
       
        return redirect('/applicant/create');
    }
  
}

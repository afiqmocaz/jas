<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EiaAppInfo;
use App\EiaApplicant;
use App\eiaSectionA;
use App\User;
use App\Mail\Approve;
use Mail;
use Session;
use Illuminate\Support\Facades\Input;
use App\Mail\JasvSystem;


class EiaAppInfoController extends Controller
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
        $eiaSectionA = eiaSectionA::all();
        return view('eiaappinfo.create', compact('eiaSectionA'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $eiaappinfo = new EiaAppInfo;

        $eiaappinfo->comment = $request->comment;

        $eiaappinfo -> save();

        Session::flash('success', 'The comment has been added!');

        return redirect() -> route(('eiaapplicant.create'),$eiaappinfo->id);
    }

    public function approve(Request $request)
    {
        $appinfo1 = EiaAppInfo::find($request->user_id);
       $eiaSectionA = eiaSectionA::find($request->user_id);
     
       Mail::send('emails.appapprove', array('appinfo1'=> $appinfo1), function ($message ) use ($eiaSectionA)
        {


            $message->to($eiaSectionA->email)->subject('New Registration');


            $message->subject('Pre-Qualification Registration of Applicant Information');

        });
        Session::flash('success', 'The approval has been send to the applicant Email.');
        return redirect()->route('eiaapplicant.create');
    }

    public function decline(Request $request)
    {
        $appinfo = EiaAppInfo::find($request->user_id);
         $eiaSectionA = eiaSectionA::find($request->user_id);
    Mail::send('emails.appdecline', array('appinfo'=> $appinfo), function ($message) use ($eiaSectionA)
        {

            

            $message->to($eiaSectionA->email)->subject('New Registration');


            $message->subject('Pre-Qualification Registration of Applicant Information');

        });
        Session::flash('success', 'The declination has been send to the applicant Email.');
          return redirect()->route('eiaapplicant.create');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $eiaappinfo = EiaAppInfo::all();
        return view('eiaappinfo.show', compact('eiaappinfo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $master = (new MasterLayoutController)->getSec('eia');
        $eiaApplicant = EiaApplicant::find($id);
        $user = User::find($eiaApplicant->user_id);
        return view('eiaappinfo.edit',compact('eiaApplicant','master'))->withuser($user);
    }

    public function update(Request $request, $id)
    {
        
        
         
         $this->validate($request, array(
            'comment' => 'required',
            'status' => 'required',
            ));
        $eiaapplicant = EiaApplicant::find($id);
        
        $eiaappinfo = EiaAppInfo::where('user_id','=',$eiaapplicant->user->id)->first();
     
        $eiaappinfo->comment = $request->comment;
        $eiaappinfo->status = $request->status;
        $eiaapplicant->comment = $request->comment;
        $eiaapplicant->status = $request->status;

        $eiaappinfo -> save();
        $eiaapplicant -> save();

        Session::flash('success', 'The comment has been added!');
        
        $textList[] = "Pre-Qualification Registration of Applicant Information for EIA Consultant.";
        $textList[] = "";
       
        
        $user = User::find($eiaapplicant->user_id);
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
       
        return redirect('/eiaapplicant/create');
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
}
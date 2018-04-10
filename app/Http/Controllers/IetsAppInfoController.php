<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\IetsAppInfo;
use App\IetsApplicant;
use App\ietsSectionA;
use App\User;
use App\Mail\Approve;
use Mail;
use Session;
use Illuminate\Support\Facades\Input;
use App\Mail\JasvSystem;

class IetsAppInfoController extends Controller
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
        $ietsSectionA = ietsSectionA::all();
        return view('ietsappinfo.create', compact('ietsSectionA'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ietsappinfo = new IetsAppInfo;

        $ietsappinfo->comment = $request->comment;

        $ietsappinfo -> save();

        Session::flash('success', 'The comment has been added!');

        return redirect() -> route(('ietsapplicant.create'),$ietsappinfo->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $ietsappinfo = IetsAppInfo::all();
        return view('ietsappinfo.show', compact('ietsappinfo'));
    }

    public function ietsapprove(Request $request)
    {
        $appinfo1 = IetsAppInfo::where('user_id','=',$request->user_id)->first();
        $ietsSectionA = ietsSectionA::where('user_id','=',$request->user_id)->first();
        
     
        Mail::send('emails.appapprove', array('appinfo1'=> $appinfo1), function ($message) use ($ietsSectionA)
        {

            $message->to($ietsSectionA->email)->subject('New Registration');


            $message->subject('Pre-Qualification Registration of Applicant Information');

        });
        Session::flash('success', 'The approval has been send to the applicant Email.');
         return redirect() -> route('ietsapplicant.create');
    }

    public function ietsdecline(Request $request)
    {
        $appinfo = IetsAppInfo::find($request->user_id);
        $ietsSectionA = ietsSectionA::find($request->user_id);
    Mail::send('emails.appdecline', array('appinfo'=> $appinfo), function ($message) use ($ietsSectionA)
        {

            $message->to($ietsSectionA->email)->subject('New Registration');

            $message->subject('Pre-Qualification Registration of Applicant Information');

        });
        Session::flash('success', 'The declination has been send to the applicant Email.');
        return redirect() -> route('ietsapplicant.create');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $master = (new MasterLayoutController)->getSec('iets');
        
        $ietsApplicant = IetsApplicant::find($id);
        $user = User::find($ietsApplicant->user_id);
        return view('ietsappinfo.edit',compact('ietsApplicant','master'))->withuser($user);
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
       
         $this->validate($request, array(
            'comment' => 'required',
            'status' => 'required',
            ));
        
        $ietsapplicant = IetsApplicant::find($id);
        
        $ietsappinfo = IetsAppInfo::where('user_id','=',$ietsapplicant->user->id)->first();
     
        $ietsappinfo->comment = $request->comment;
        $ietsappinfo->status = $request->status;
        $ietsapplicant->comment = $request->comment;
        $ietsapplicant->status = $request->status;

        $ietsappinfo -> save();
        $ietsapplicant -> save();

        Session::flash('success', 'The comment has been added!');
        
        $textList[] = "Pre-Qualification Registration of Applicant Information for IETS Consultant.";
        $textList[] = "";
       $sectionList[]="";
        
        $user = User::find($ietsapplicant->user_id);
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
                $sectionList[]='A';
            }
            if(!empty($request->reason2)){
                 $textList[] = $count.'. '.$request->reason2;
                  $count++;
                  $sectionList[]='B';
            }
            if(!empty($request->reason3)){
                 $textList[] = $count.'. '.$request->reason3;
                  $count++;
                  $sectionList[]='C';
            }$text="";
            foreach($sectionList as $section){
                $text=$text.$section. " " ;
            }

            $ietsapplicantDec = IetsApplicant::find($id);
            $ietsapplicantDec->section=$text;
            
            $ietsapplicantDec->save();
        }
       
        //$textList[] = "Comment : ".$request->comment;
        $data['textList'] = $textList;
        
        Mail::to($user)->send(new JasvSystem($data));
       
        return redirect('/ietsapplicant/create');

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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PayInfo;
use App\Payment;
use App\User;
use Mail;
use App\Mail\Approve;
use Session;
use Auth;
use Illuminate\Support\Facades\Input;
use App\Cert;
use App\Mail\JasvSystem;
class PayInfoController extends Controller
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
        $payinfo = PayInfo::all();
        return view('payinfo.create', compact('payinfo', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    public function payapprove(Request $request)
    {
      Mail::send('emails.payapprove', [], function ($message)
        {

            $message->from('nafauser49@gmail.com', 'Jabatan Alam Sekitar');

            $message->to('syakirwahab5@gmail.com')->subject('New Registration');

            $message->to('nazifasmohdhussein@gmail.com')->subject('New Registration');
            $message->to('noorhazirahassan@gmail.com')->subject('New Registration');

            $message->subject('Pre-Qualification Registration of Applicant Information');

        });
        Session::flash('success', 'The approval has been send to the applicant Email.');
        return redirect()->back();
    }

    public function paydecline(Request $request)
    {
    Mail::send('emails.paydecline', [], function ($message)
        {

            $message->from('nafauser49@gmail.com', 'Jabatan Alam Sekitar');

            $message->to('syakirwahab5@gmail.com')->subject('New Registration');

            $message->to('nazifasmohdhussein@gmail.com')->subject('New Registration');
            $message->to('noorhazirahassan@gmail.com')->subject('New Registration');

            $message->subject('Pre-Qualification Registration of Applicant Information');

        });
        Session::flash('success', 'The approval has been send to the applicant Email.');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::all();
        $payinfo = PayInfo::all();
        return view('payinfo.show', compact('payinfo', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function approve(Request $request)
    {
    // Laravel validation
    
        $user = $this->create($request->all());
        // After creating the user send an email with the random token generated in the create method above
        $email = new Approve(new User());
        Mail::to($user->email)->send($email);
        
        Session::flash('message', 'We have sent you a verification email.Please check your email and verify it.');
        return redirect('ietspayment/show');
    
}

    public function edit($paymentId)
    {
      
        $title = "Payment Information ";
        
        $payment = Payment::find($paymentId);
        $payinfo = PayInfo::where('payment_id','=',$paymentId)->first();
        $user = User::find($payment->user_id);
        $array = array_merge($user->toArray(), $payinfo->toArray());
        
        $masterCtrl = new MasterLayoutController;
        $category = $payment->payment_for;
        
        if($payment->type === 'renewal_cert'){
             $cert = Cert::find($payment->payment_for);
             
             $category = $payment->payment_for;
             
             $master = $masterCtrl->getSec($category);
             
             $title = "Renewal Payment Infomation";
             
        }else{
             $master = $masterCtrl->getSec($category);
        }
        
       
        $data['master'] = $master;
        $data['type'] = $payment->type;
        $data['category'] = $category;
        $data['payment_for'] = $payment->payment_for;
        
        
        
        return view('payinfo.edit')->witharray($array)->withpayinfo($payinfo)->withuser($user)->with($data);
    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $paymentId)
    {
       
       
        $payment = Payment::find($paymentId);
        $payinfo = PayInfo::where('payment_id','=',$paymentId)->first();
        
        $userId =  $payment->user_id;
        $user = User::find($userId);
        
        
        if($request->status === 'Approved'){
             
       
            $data = array();
            $data['name'] = $user->name;
            $textList[] = "Your payment application for ".  strtoupper($payment->payment_for)." Consultant Registration has been approved.";
            $textList[]="You may login to the system and complete the certification program.";
            $textList[]="You are required to complete the program within 6 months.";
            $data['textList'] = $textList;
            Mail::to($user)->send(new JasvSystem($data));
        }else 
        if($request->status === 'Declined'){
            
            
            $textList[] = "Payment is not successfull";
       
            $data = array();
            $data['name'] = $user->name;
            $textList[] = "Your payment for ".  strtoupper($payment->payment_for)." Pre-Qualification Registration of Applicant Information has been declined for the following reason,";
            $textList[] = $request->remark;
            $data['textList'] = $textList;
        
            Mail::to($user)->send(new JasvSystem($data));
            $payment->remark = $request->remark;
        }

        $payinfo->status = $request->status;
        $payment->status = $request->status;

        $payinfo -> save();
        $payment -> save();

        Session::flash('success', 'The comment has been added!');

        return redirect('/paymentview/'.$payment->payment_for);
       
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
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EiaPayInfo;
use App\EiaPayment;
use App\User;
use Session;
use App\Mail\Approve;
use Mail;
use App\eiaSectionA;
use Illuminate\Support\Facades\Input;

class EiaPayInfoController extends Controller
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
       // $user = User::all();
        $eiapayinfo = EiaPayInfo::all();
        return view('eiapayinfo.create', compact('eiapayinfo', 'user'));
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

         $user = User::find($request->user_id);
     
       Mail::send('emails.payapprove', [], function ($message) use ($user)
        {

            $message->from('nafauser49@gmail.com', 'Jabatan Alam Sekitar');

            $message->to($user->email)->subject('New Registration');


            $message->subject('Pre-Qualification Registration Payment');

        });
        Session::flash('success', 'The approval has been send to the applicant Email.');
        return redirect() -> route('eiaapplicant.create');
    }

    public function paydecline(Request $request)
    {
        $eiaSectionA = eiaSectionA::find($request->user_id);
    Mail::send('emails.paydecline', [], function ($message) use ($eiaSectionA)
        {

             $message->from('nafauser49@gmail.com', 'Jabatan Alam Sekitar');

            $message->to($eiaSectionA->email)->subject('New Registration');


            $message->subject('Pre-Qualification Registration Payment');

        });
        Session::flash('success', 'The declination has been send to the applicant Email.');
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
        $eiapayinfo = EiaPayInfo::all();
        return view('eiapayinfo.show', compact('eiapayinfo', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($user_id)
    {
        $eiapayinfo = EiaPayInfo::where('user_id','=',$user_id)->first();
        $user = User::find($user_id);


        $array = array_merge($user->toArray(), $eiapayinfo->toArray());

        return view('eiapayinfo.edit')->witharray($array)->witheiapayinfo($eiapayinfo)->withuser($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $user_id)
    {
        $eiapayinfo = EiaPayInfo::where('user_id','=',$user_id)->first();
        $eiapayment = EiaPayment::where('user_id','=',$user_id)->first();

        $eiapayinfo->status = $request->status;
       // $eiapayment->status = $request->status;

        $eiapayinfo -> save();
       // $eiapayment -> save();

        Session::flash('success', 'The comment has been added!');

        //check which submit was clicked on
        if(Input::get('approve')) {
            return redirect() -> route(('payapprove'),$eiapayinfo->id);
        } elseif(Input::get('decline')) {
            return redirect() -> route(('paydecline'),$eiapayinfo->id);
        }
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

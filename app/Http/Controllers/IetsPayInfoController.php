<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\IetsPayInfo;
use App\IetsPayment;
use App\User;
use App\Mail\Approve;
use Mail;
use Session;
use DB;
use Illuminate\Support\Facades\Input;

class IetsPayInfoController extends Controller
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
        $ietspayinfo = IetsPayInfo::all();


        return view('ietspayinfo.create', compact('ietspayinfo', 'user'));
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
        $ietsSectionA = ietsSectionA::find($request->user_id);
    Mail::send('emails.payapprove', [], function ($message) use ($ietsSectionA)
        {

           $message->from('nafauser49@gmail.com', 'Jabatan Alam Sekitar');

            $message->to($ietsSectionA->email)->subject('New Registration');


            $message->subject('Pre-Qualification Registration of Applicant Information');

        });
        Session::flash('success', 'The approval has been send to the applicant Email.');
        return redirect()->back();
    }

    public function paydecline(Request $request)
    {
        $ietsSectionA = ietsSectionA::find($request->user_id);
    Mail::send('emails.paydecline', [], function ($message) use ($ietsSectionA)
        {

             $message->from('nafauser49@gmail.com', 'Jabatan Alam Sekitar');

            $message->to($ietsSectionA->email)->subject('Pre-Registration Payment');


            $message->subject('Pre-Qualification Registration Payment');


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
        $ietspayinfo = IetsPayInfo::all();
        return view('ietspayinfo.show', compact('ietspayinfo', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($user_id)
    {
        $ietspayinfo = IetsPayInfo::where('user_id','=',$user_id)->first();
        $user = User::find($user_id);

        $array = array_merge($user->toArray(), $ietspayinfo->toArray());

        return view('ietspayinfo.edit')->witharray($array)->withietspayinfo($ietspayinfo)->withuser($user);
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
        $ietspayinfo = IetsPayInfo::where('user_id','=',$user_id)->first();
        $ietspayment = ietsPayment::where('user_id','=',$user_id)->first();
        $ietspayinfo->status = $request->status;
        $ietspayment->status = $request->status;

        $ietspayinfo -> save();
        $ietspayment -> save();

        Session::flash('success', 'The comment has been added!');


        //check which submit was clicked on
        if(Input::get('approve')) {
            return redirect() -> route(('payapprove'),$ietspayinfo->id);
        } elseif(Input::get('decline')) {
            return redirect() -> route(('paydecline'),$ietspayinfo->id);
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

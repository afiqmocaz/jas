<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SMEaddinfo;
use Session;
use App\User;
use Mail;
use Auth;
use App\ietsSectionA;
class SMEaddinfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
		$smeaddinfo= SMEaddinfo::all();
		
			return view('reqaddinfo.create',['smeaddinfo' => $smeaddinfo]);
		
     // return view('reqaddinfo.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
			$smeaddinfo= SMEaddinfo::all();
		return view('reqaddinfo.create',['smeaddinfo' => $smeaddinfo]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, array(

            'reqaddinfo' => 'required'
            

            ));

        //store in the database

        $smeaddinfo = new SMEaddinfo;
        $smeaddinfo->reqaddinfo = $request->input('reqaddinfo');
		$smeaddinfo->user_id=Auth::user()->id;

        $ietsSectionA = ietsSectionA::find($request->user_id);
		 Mail::send('emails.appapprove', [], function ($message ) use ($ietsSectionA)
        {

            $message->from('nafauser49@gmail.com', 'Jabatan Alam Sekitar');

            $message->to('$eiaSectionA->email')->subject('New Registration');


            $message->subject('Pre-Qualification Registration of Applicant Information');

        });
        $smeaddinfo -> save();

        Session::flash('success', 'The exam schedule has been added!');
		return redirect() -> route(('reqaddinfo.create'),$smeaddinfo->id);
		//return view('reqaddinfo.create');
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
		 $smeaddinfo = SMEaddinfo::all();
        
        return view('reqaddinfo.index', compact('smeaddinfo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
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
       
        // return redirect() -> route(('smeaddinfo.show'),$smeaddinfo->id);
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
	
	public function sendEmailReminder()
    {
        $users = User::all();
		$users->user_id=Auth::id();
		
        Mail::send('emails.try', ['users' => $users], function ($m) use ($users) {
            $m->from($users->email, 'Your Application');

            $m->to('nazifasmohdhussein@gmail.com')->subject('Request Additional Information');
        });
    }
}

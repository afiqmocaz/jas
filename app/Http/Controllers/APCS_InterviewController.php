<?php

namespace App\Http\Controllers;

use App\apcs_interview;
use Illuminate\Http\Request;
use App\iets_interview;
use App\Confirmedietsiv;
use Auth;
use DB;
class APCS_InterviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
		//return view('iets_iv');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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

    /**
     * Display the specified resource.
     *
     * @param  \App\iets_interview  $iets_interview
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
		
		// $iets_interview = interview::all();
		
		//return view('show',['iets_interview' => $iets_interview]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\iets_interview  $iets_interview
     * @return \Illuminate\Http\Response
     */
    public function edit(apcs_interview $apcs_interview)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\iets_interview  $iets_interview
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, apcs_interview $apcs_interview)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\iets_interview  $iets_interview
     * @return \Illuminate\Http\Response
     */
    public function destroy(apcs_interview $apcs_interview)
    {
        //
    }
	
	public function apcs_iv(){
		$iets_interview = iets_interview::all();
		//$iets_confirmediv=Confirmedietsiv::all();
		if (iets_interview::where('id_user', '=', Auth::id())->exists()){
		// return view('iets.iets_examconfirm',['iets_examschedule' => $iets_examschedule],compact('examuser'));
			return view('apcs.apcs_ivconfirmed',['iets_interview' => $iets_interview,'iets_confirmediv' => $iets_confirmediv],compact('iets_confirmediv'));
		return view('apcs.apcs_ivconfirmed',['iets_interview' => $iets_interview]);
		
		}
		else
		{
			return response ('not available yet');
		}
	}
	
	public function iv_confirm(){
				//$iets_confirmediv=new Confirmedietsiv;
			if (Confirmedietsiv::where('user_id', '=', Auth::id())->exists()) {
		return response('You have already make the confirmation', 422);
	}
	
	else{
			$iets_interview = iets_interview::take(1)->get();
		//$examuser=UserExamDetails::count();
		/*$iets_confirmediv=new Confirmedietsiv;
		$iets_interview = iets_interview::all();
		$iets_confirmediv->user_id = Auth::id();
		$iets_confirmediv->user_name = $iets_interview->first()->name;
		$iets_confirmediv->date_iv = $iets_interview->first()->iv_date;
		$iets_confirmediv->time_iv=$iets_interview->first()->iv_time;
		$iets_confirmediv->venue_iv=$iets_interview->first()->iv_venue;
		$iets_confirmediv->save();
		$iets_confirmediv = DB::table('iets_confirmediv')
    ->where('user_id', '=', Auth::user()->id)
	->where('user_name', '=', $iets_interview->first()->name)
	->where('date_iv', '=', $iets_interview->first()->iv_date)
	->where('time_iv', '=', $iets_interview->first()->iv_time)
	->where('venue_iv', '=', $iets_interview->first()->iv_venue)
    ->exists();*/
	
	return response ('has been confirmed');
	//return view('iets.iets_iv',['iets_interview' => $iets_interview, 'iets_confirmediv' =>$iets_confirmediv]);
	/*if(is_null($iets_confirmediv)){
		print_r("id is existed");
	}
	print_r("not exists yet");*/
	
		/*$iets_confirmediv=Confirmedietsiv::where(
    ['user_id', '=', Auth::id()],
	['user_name', '=', $iets_interview->last()->name],
	['date_iv', '=',  $iets_interview->last()->iv_date],
	['time_iv', '=',  $iets_interview->last()->iv_time],
	['venue_iv', '=' ,$iets_interview->last()->iv_venue]);*/
		
	}
		}
	
}

	
	


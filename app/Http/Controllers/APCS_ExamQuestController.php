<?php

namespace App\Http\Controllers;

use App\apcs_question;
use Illuminate\Http\Request;

class APCS_ExamQuestController extends Controller
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
     * @param  \App\apcs_question  $apcs_question
     * @return \Illuminate\Http\Response
     */
    public function show(apcs_question $apcs_question)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\apcs_question  $apcs_question
     * @return \Illuminate\Http\Response
     */
    public function edit(apcs_question $apcs_question)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\apcs_question  $apcs_question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, apcs_question $apcs_question)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\apcs_question  $apcs_question
     * @return \Illuminate\Http\Response
     */
    public function destroy(apcs_question $apcs_question)
    {
        //
    }
	
	public function apcs_examquestion(){
		$apcs_question = apcs_question::inRandomOrder()->paginate(5);
			 
		 //$iets_question = iets_question::inRandomOrder()->get();
		 //$iets_question = iets_question::paginate(2);

		
		return view('apcs.apcs_examquestion',['apcs_question' => $apcs_question]);
	}
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AssignmentQuestions;
use Auth;
use App\EIAUpload;
use App\EiaAssignment;
use App\eiaSectionE;
use DB;

class StartAssignmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $question=AssignmentQuestions::all();
        $upload=EIAUpload::all();

        $eiaassignment = EiaAssignment::where('type','General Question')->take(1)->get();

        $sassignment = EiaAssignment::all();

        $special=eiaSectionE::all();

        if (AssignmentQuestions::where('user_id', '=', Auth::id())->exists()){
            return view('pages.upload.index',['upload'=>$upload]);
        }


        
        if(eiaSectionE::where('user_id','=', Auth::id())){
        $assignment_question=DB::table('eia_assignments')->select('question')
        ->whereExists(function ($query){
            $query->select(DB::raw('question'))
                  ->from('eia_section_es')
                  ->whereRaw('eia_assignments.specialized = eia_section_es.first_specialize');
        })->value('question');
    }
    else{
        $assignment_question="no data";
    }
       
        return view('startassignments.index', compact('question','upload','eiaassignment','sassignment','special','assignment_question'));
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
}

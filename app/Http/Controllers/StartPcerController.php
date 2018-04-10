<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\IetsAssignment;
use App\Uploads;
use App\IetsAssignmentPcer;
use Auth;
use App\Test;
use App\UserAction;

class StartPcerController extends Controller
{
     public function index()
    {

         $useresult = Test::all();
        $upload=Uploads::all();

        $eiaassignment = IetsAssignment::take(1)->latest()->get();

        

      

          if (IetsAssignmentPcer::where('user_id', '=', Auth::id())->exists()){
       // if(AssignmentQuestions::where('user_id','=',Auth::id()->exists())){
           return view('iets.iets_pcer',['upload'=>$upload,'eiaassignment'=>$eiaassignment,'useresult'=>$useresult]);
        }


        
       

        

        return view('startpcer.index', compact('question','upload','eiaassignment','sassignment','special','assignment_question','useresult'));
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
        $upload=Uploads::all();
        $useraction = UserAction::all();
        $useresult = Test::all();
        $user_actions = new UserAction;
        $user_actions->user_id = Auth::id();
        $user_actions->action = "created";
        $user_actions->action_model = "iets_pcer";
        $user_actions->action_id = "1";
        //$user_actions->status = 'complete';
        $user_actions->save();
          $eiaassignment = IetsAssignment::take(1)->latest()->get();
            $ietsassignment=IetsAssignmentPcer::all();
        if (IetsAssignmentPcer::where('user_id', '=', Auth::id())->exists()){
       // if(AssignmentQuestions::where('user_id','=',Auth::id()->exists())){
           return view('iets.iets_pcer',['upload'=>$upload,'eiaassignment'=>$eiaassignment,'useresult'=>$useresult]);
        }

        else{
        $eiaassignment = new IetsAssignmentPcer;

        $eiaassignment->user_id = Auth::id();
        $eiaassignment->pcer_id = $request->input('pcer_id');
    
        $eiaassignment -> save();

      
        return view('iets.iets_pcer',compact('eiaassignment','useresult'));
    }
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

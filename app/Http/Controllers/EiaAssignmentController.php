<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EiaAssignment;
use Session;
use App\Http\Controllers\MasterLayoutController;

class EiaAssignmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $eiaassignment = EiaAssignment::all();
        return view('eiaassignment.show', compact('eiaassignment'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('eiaassignment.create');
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

            'type' => 'required',
            'question' => 'required',
            'duration' => 'required'

            ));

        //store in the database
        $eiaassignment = new EiaAssignment;

        $eiaassignment->type = $request->type;
        $eiaassignment->specialized = $request->specialized;
        $eiaassignment->question = $request->question;
        $eiaassignment->duration = $request->duration;

        $eiaassignment -> save();

        Session::flash('success', 'The assignment has been added!');

        return redirect() -> route(('eiaassignment.show'),$eiaassignment->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = 'eia';
        $masterCtrl = new MasterLayoutController;
        $master = $masterCtrl->getSec($category);
        $eiaassignment = EiaAssignment::all();
        return view('eiaassignment.show', compact('eiaassignment','master'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // find the post in the database and save as a var
        $category = 'eia';
        $masterCtrl = new MasterLayoutController;
        $master = $masterCtrl->getSec($category);
        $eiaassignment = EiaAssignment::find($id);
        //return the view and pass in the var we previously created
        return view('eiaassignment.edit', compact('master'))->witheiaassignment($eiaassignment);
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

            'type' => 'required',
            'question' => 'required',
            'duration' => 'required'

            ));

        //store in the database
        $eiaassignment = EiaAssignment::find($id);

        $eiaassignment->type = $request->type;
        $eiaassignment->specialized = $request->specialized;
        $eiaassignment->question = $request->question;
        $eiaassignment->duration = $request->duration;

        $eiaassignment -> save();

        Session::flash('success', 'The assignment has been updated!');

        return redirect() -> route(('eiaassignment.show'),$eiaassignment->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $eiaassignment = EiaAssignment::find($id);

        $eiaassignment->delete();

        Session::flash('success', 'The assignment has been deleted!');
        return redirect() -> route(('eiaassignment.show'),$eiaassignment->id);
    }
}

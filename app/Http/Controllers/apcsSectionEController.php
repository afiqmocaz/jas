<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\apcsSectionE;
use App\ApcsAppe;
use Session;
use Auth;

class apcsSectionEController extends Controller
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

        $apcsSectionE = apcsSectionE::where('user_id',Auth::id())->get();
        
            if(apcsSectionE::where('user_id', '=',Auth::id())->exists()){
                return view('apcsSectionE.show', compact('apcsSectionE'));
            }
return view('apcsSectionE.create', compact('apcsSectionE'));
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
               'starttrainning' => 'required|before:endtraining', 
            'endtraining' => 'required|before:tomorrow',
            'seminarname' => 'required', 
            'venue' => 'required'));

        $apcsappe = new ApcsAppe;

        $apcsSectionE = new apcsSectionE;
        $apcsSectionE->starttrainning = $request->starttrainning;
        $apcsSectionE->endtraining = $request->endtraining;
        $apcsSectionE->seminarname = $request->seminarname;
        $apcsSectionE->venue = $request->venue;
        $apcsSectionE->user_id = Auth::id();
        $apcsSectionE->applicant_id = $request->applicant_id;
        // $apcsSectionE->name = $request->name;
        $apcsappe->user_id = Auth::id();

        $apcsappe->starttrainning = $request->starttrainning;
        $apcsappe->endtraining = $request->endtraining;
        $apcsappe->seminarname = $request->seminarname;
        $apcsappe->venue = $request->venue;
        $apcsappe->applicant_id = $request->applicant_id;
        // $apcsappe->name = $request->name;

        $apcsSectionE->save();
        $apcsappe->save();

        Session::flash('success', 'The post sucessfull');

        //redirect to another page

        return redirect()->route('apcsSectionE.show', $apcsSectionE->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $apcsSectionE = apcsSectionE::where('user_id',Auth::id())->get();
        //from session
        return view('apcsSectionE.show', compact('apcsSectionE'));
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
        $apcsSectionE = apcsSectionE::find($id);

        //return the view and pass in the var we previously created
        return view('apcsSectionE.edit', compact('apcsSectionE'));
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
                'starttrainning' => 'required|before:endtraining', 
            'endtraining' => 'required|before:tomorrow',
            'seminarname' => 'required',
             'venue' => 'required'));

        $apcsSectionE = apcsSectionE::find($id);
        $apcsSectionE->starttrainning = $request->starttrainning;
        $apcsSectionE->endtraining = $request->endtraining;
        $apcsSectionE->seminarname = $request->seminarname;
        $apcsSectionE->venue = $request->venue;
        $apcsSectionE->user_id = Auth::id();
        $apcsSectionE->applicant_id = $request->applicant_id;
        // $apcsSectionE->name = $request->name;

        $apcsappe = ApcsAppe::find($id);
        $apcsappe->starttrainning = $request->starttrainning;
        $apcsappe->endtraining = $request->endtraining;
        $apcsappe->seminarname = $request->seminarname;
        $apcsappe->venue = $request->venue;
        $apcsappe->user_id = Auth::id();
        $apcsappe->applicant_id = $request->applicant_id;
        // $apcsappe->name = $request->name;

        $apcsappe->save();

        $apcsSectionE->save();

        Session::flash('success', 'The post sucessfull');

        //redirect to another page

        return redirect()->route('apcsSectionE.show', $apcsSectionE->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $apcsSectionE = apcsSectionE::find($id);
        $apcsappe = ApcsAppe::find($id);
        $apcsappe->delete();
        $apcsSectionE->delete();
        Session::flash('success', 'The announcement was successfully deleted!');        
        return redirect()->route('apcsSectionE.show', $apcsSectionE->id);
    }
}

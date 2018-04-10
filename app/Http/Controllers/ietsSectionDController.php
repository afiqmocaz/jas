<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ietsSectionD;
use App\IetsAppd;
use App\EiaAppd;
use Session;
use Auth;

class ietsSectionDController extends Controller
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
         $ietsSectionD = ietsSectionD::where('user_id',Auth::id())->get();
        
            if(ietsSectionD::where('user_id', '=',Auth::id())->exists()){
                return view('ietsSectionD.show', compact('ietsSectionD'));
            }

        return view('ietsSectionD.create');
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

        $ietsSectionD = new ietsSectionD;
        $ietsappd = new IetsAppd;

        $ietsSectionD->starttrainning = $request->starttrainning;
        $ietsSectionD->endtraining = $request->endtraining;
        $ietsSectionD->seminarname = $request->seminarname;
        $ietsSectionD->venue = $request->venue;
        $ietsSectionD->user_id = Auth::id();
        $ietsSectionD->applicant_id = $request->applicant_id;

        $ietsappd->starttrainning = $request->starttrainning;
        $ietsappd->endtraining = $request->endtraining;
        $ietsappd->seminarname = $request->seminarname;
        $ietsappd->venue = $request->venue;
        $ietsappd->user_id = Auth::id();
        $ietsappd->applicant_id = $request->applicant_id;

        $ietsSectionD->save();

        $ietsappd->save();

        Session::flash('success', 'The post sucessfull');

        //redirect to another page

        return redirect()->route('ietsSectionD.show', $ietsSectionD->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ietsSectionD = ietsSectionD::where('user_id',Auth::id())->get();
        //from session
        return view('ietsSectionD.show', compact('ietsSectionD'));
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
        $ietsSectionD = ietsSectionD::find($id);

        //return the view and pass in the var we previously created
        return view('ietsSectionD.edit', compact('ietsSectionD'));
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

        $ietsSectionD = ietsSectionD::find($id);
        $ietsSectionD->starttrainning = $request->starttrainning;
        $ietsSectionD->endtraining = $request->endtraining;
        $ietsSectionD->seminarname = $request->seminarname;
        $ietsSectionD->venue = $request->venue;

        $ietsappd = IetsAppd::find($id);
        $ietsappd->starttrainning = $request->starttrainning;
        $ietsappd->endtraining = $request->endtraining;
        $ietsappd->seminarname = $request->seminarname;
        $ietsappd->venue = $request->venue;

        $ietsappd->save();

        $ietsSectionD->save();

        Session::flash('success', 'The post sucessfull');

        //redirect to another page

        return redirect()->route('ietsSectionD.show', $ietsSectionD->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ietsSectionD = ietsSectionD::find($id);
        $ietsappd = IetsAppd::find($id);
        $ietsappd->delete();
        $ietsSectionD->delete();
        Session::flash('success', 'The announcement was successfully deleted!');        
        return redirect()->route('ietsSectionD.show', $ietsSectionD->id);
    }
}

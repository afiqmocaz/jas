<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\IetsIvSchedule;
use App\IetsProIv;
use App\IetsVenue;
use Session;
use Auth;

class IetsIvScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ietsivschedule = IetsIvSchedule::all();
        $ietsvenues = IetsVenue::all();
        return view('ietsivschedule.show', compact('ietsivschedule', 'ietsvenues'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ietsivschedule.create');
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

            'title' => 'required',
            'date' => 'required',
            'time' => 'required',
            'ietsvenue_id' => 'required|integer',
            'address' => 'required',
            'state' => 'required'

            ));

        //store in the database
        $ietsivschedule = new IetsIvSchedule;
        $ietsproiv = new IetsProIv;

        $ietsivschedule->title = $request->title;
        $ietsivschedule->date = $request->date;
        $ietsivschedule->time = $request->time;
        $ietsivschedule->ietsvenue_id = $request->ietsvenue_id;
        $ietsivschedule->address = $request->address;
        $ietsivschedule->state = $request->state;

        $ietsproiv->date = $request->date;
        $ietsproiv->user_id = Auth::id();

        $ietsivschedule -> save();

        $ietsproiv -> save();

        Session::flash('success', 'The interview schedule has been added!');

        return redirect() -> route(('ietsivschedule.show'),$ietsivschedule->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ietsivschedule = IetsIvSchedule::all();
        $ietsvenues = IetsVenue::all();
        return view('ietsivschedule.show', compact('ietsivschedule', 'ietsvenues'));
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
        $ietsivschedule = IetsIvSchedule::find($id);
        $ietsvenues = IetsVenue::all();
        $catvs = array();
        foreach ($ietsvenues as $catv) {
            $catvs[$catv->id] = $catv->ietsvenue;
        }

        //return the view and pass in the var we previously created
        return view('ietsivschedule.edit')->withietsivschedule($ietsivschedule)->withietsvenues($catvs);
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
        // Validate the data 

         $this->validate($request, array(

            'title' => 'required',
            'date' => 'required',
            'time' => 'required',
            'ietsvenue_id' => 'required|integer',
            'address' => 'required',
            'state' => 'required'

            ));

        // Save the data to the database

         $ietsivschedule = IetsIvSchedule::find($user_id);
         $ietsproiv = IetsProIv::find($user_id);

         $ietsivschedule->title = $request->input('title');
         $ietsivschedule->date = $request->input('date');
         $ietsivschedule->time = $request->input('time');
         $ietsivschedule->ietsvenue_id = $request->input('ietsvenue_id');
         $ietsivschedule->address = $request->input('address');
         $ietsivschedule->state = $request->input('state');

         $ietsproiv->date = $request->date;

         $ietsivschedule -> save();
         $ietsproiv -> save();

        // Set flash data with success message

         Session::flash('success', 'The interview schedule has been updated!');

        // Redirect with flash data to show form

         return redirect() -> route(('ietsproiv.create'),$ietsivschedule->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($user_id)
    {
        $ietsivschedule = IetsIvSchedule::find($id);
        $ietsproiv = IetsProIv::find($user_id);

        $ietsivschedule->delete();
        $ietsproiv -> delete();

        Session::flash('success', 'The interview schedule has been deleted!');
        return redirect()->route('ietsivschedule.edit');
    }
}

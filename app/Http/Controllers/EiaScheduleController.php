<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EiaSchedule;
use App\EiaExamTitle;
use App\EiaVenue;
use App\EiaExam;
use Session;

class EiaScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $eiaschedule = EiaSchedule::all();
        $eiaexamtitles = EiaExamTitle::all();
        $eiaexam = EiaExam::count();
        $eiavenues = EiaVenues::all();
        return view('eiaschedule.show', compact('eiaschedule' , 'eiaexamtitles', 'eiavenues', 'eiaexam'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('eiaschedule.create');
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

            'typeofexam' => 'required',
            'eiaexamtitle_id' => 'required|integer',
            'date' => 'required|after:"yesterday"',
            'start' => 'required',
            'end' => 'required|after:start',
            'eiavenue_id' => 'required|integer',
            'address' => 'required',
            'state' => 'required',
            'seat' => 'required'

            ));

        //store in the database
        $eiaschedule = new EiaSchedule;

        $eiaschedule->typeofexam = $request->typeofexam;
        $eiaschedule->eiaexamtitle_id = $request->eiaexamtitle_id;
        $eiaschedule->date = $request->date;
        $eiaschedule->start = $request->start;
        $eiaschedule->end = $request->end;
        $eiaschedule->eiavenue_id = $request->eiavenue_id;
        $eiaschedule->address = $request->address;
        $eiaschedule->state = $request->state;
        $eiaschedule->seat = $request->seat;

        $eiaschedule -> save();

        Session::flash('success', 'The exam schedule has been added!');

        return redirect() -> route(('eiaschedule.show'),$eiaschedule->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $eiaschedule = EiaSchedule::all();
        $eiaexamtitles = EiaExamTitle::all();
        $eiaexam = EiaExam::count();
        $eiavenues = EiaVenue::all();
        return view('eiaschedule.show', compact('eiaschedule', 'eiaexamtitles', 'eiavenues','eiaexam'));
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
        $eiaschedule = EiaSchedule::find($id);
        $eiaexamtitles = EiaExamTitle::all();
        $cats = array();
        foreach ($eiaexamtitles as $cat) {
            $cats[$cat->id] = $cat->eiaexamtitle;
        }
        $eiavenues = EiaVenue::all();
        $catsv = array();
        foreach ($eiavenues as $cat) {
            $catsv[$cat->id] = $cat->eiavenue;
        }
        //return the view and pass in the var we previously created
        return view('eiaschedule.edit')->witheiaschedule($eiaschedule)->witheiaexamtitles($cats)->witheiavenues($catsv);
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

            'typeofexam' => 'required',
            'eiaexamtitle_id' => 'required|integer',
            'date' => 'required',
            'start' => 'required',
            'end' => 'required',
            'eiavenue_id' => 'required|integer',
            'address' => 'required',
            'state' => 'required',
            'seat' => 'required'

            ));

        //store in the database
        $eiaschedule = EiaSchedule::find($id);

        $eiaschedule->typeofexam = $request->input('typeofexam');
        $eiaschedule->eiaexamtitle_id = $request->input('eiaexamtitle_id');
        $eiaschedule->date = $request->input('date');
        $eiaschedule->start = $request->input('start');
        $eiaschedule->end = $request->input('end');
        $eiaschedule->eiavenue_id = $request->input('eiavenue_id');
        $eiaschedule->address = $request->input('address');
        $eiaschedule->state = $request->input('state');
        $eiaschedule->seat = $request->input('seat');

        $eiaschedule -> save();

        Session::flash('success', 'The exam schedule has been updated!');

        return redirect() -> route(('eiaschedule.show'),$eiaschedule->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $eiaschedule = EiaSchedule::find($id);

        $eiaschedule->delete();

        Session::flash('success', 'The exam schedule has been deleted!');
        return redirect()->route('eiaschedule.index');
    }
}

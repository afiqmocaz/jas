<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\IetsSchedule;
use App\IetsExamTitle;
use App\IetsExam;
use App\IetsVenue;
use Session;

class IetsScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ietsschedule = IetsSchedule::all();
        $ietsexamtitles = IetsExamTitle::all();
         $ietsexam = IetsExam::count();
        $ietsvenues = IetsVenue::all();
        return view('ietsschedule.show', compact('ietsschedule', 'ietsexamtitles', 'ietsvenues', 'ietsexam'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ietsschedule.create');
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
            'ietsexamtitle_id' => 'required|integer',
            'date' => 'required|after:"yesterday"',
            'start' => 'required',
            'end' => 'required|after:start',
            'ietsvenue_id' => 'required|integer',
            'address' => 'required',
            'state' => 'required',
            'seat' => 'required'

            ));

        //store in the database
        $ietsschedule = new IetsSchedule;

        $ietsschedule->typeofexam = $request->typeofexam;
        $ietsschedule->ietsexamtitle_id = $request->ietsexamtitle_id;
        $ietsschedule->date = $request->date;
        $ietsschedule->start = $request->start;
        $ietsschedule->end = $request->end;
        $ietsschedule->ietsvenue_id = $request->ietsvenue_id;
        $ietsschedule->address = $request->address;
        $ietsschedule->state = $request->state;
        $ietsschedule->seat = $request->seat;

        $ietsschedule -> save();

        Session::flash('success', 'The exam schedule has been added!');

        return redirect() -> route(('ietsschedule.show'),$ietsschedule->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ietsschedule = IetsSchedule::all();
        $ietsexamtitles = IetsExamTitle::all();
        $ietsexam = IetsExam::count();
        $ietsvenues = IetsVenue::all();
        return view('ietsschedule.show', compact('ietsschedule', 'ietsexamtitles', 'ietsvenues', 'ietsexam'));
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
        $ietsschedule = IetsSchedule::find($id);
        $ietsexamtitles = IetsExamTitle::all();
        $cats = array();
        foreach ($ietsexamtitles as $cat) {
            $cats[$cat->id] = $cat->ietsexamtitle;
        }
        $ietsvenues = IetsVenue::all();
        $catsv = array();
        foreach ($ietsvenues as $cat) {
            $catsv[$cat->id] = $cat->ietsvenue;
        }
        //return the view and pass in the var we previously created
        return view('ietsschedule.edit')->withietsschedule($ietsschedule)->withietsexamtitles($cats)->withietsvenues($catsv);
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
            'ietsexamtitle_id' => 'required|integer',
            'date' => 'required',
            'start' => 'required',
            'end' => 'required',
            'ietsvenue_id' => 'required|integer',
            'address' => 'required',
            'state' => 'required',
            'seat' => 'required'

            ));
         $validator = Validator::make(Input::all(), $rules);
    if ($validator->fails()) {
        return redirect()->back()
            ->withErrors($validator);
    }

        //store in the database
        $ietsschedule = IetsSchedule::find($id);

        $ietsschedule->typeofexam = $request->input('typeofexam');
        $ietsschedule->ietsexamtitle_id = $request->input('ietsexamtitle_id');
        $ietsschedule->date = $request->input('date');
        $ietsschedule->start = $request->input('start');
        $ietsschedule->end = $request->input('end');
        $ietsschedule->ietsvenue_id = $request->input('ietsvenue_id');
        $ietsschedule->address = $request->input('address');
        $ietsschedule->state = $request->input('state');
        $ietsschedule->seat = $request->input('seat');

        $ietsschedule -> save();

        Session::flash('success', 'The exam schedule has been updated!');

        return redirect() -> route(('ietsschedule.show'),$ietsschedule->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ietsschedule = IetsSchedule::find($id);

        $ietsschedule->delete();

        Session::flash('success', 'The exam schedule has been deleted!');
        return redirect() -> route(('ietsschedule.show'),$ietsschedule->id);
    }
}

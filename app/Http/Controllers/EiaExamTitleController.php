<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EiaExamTitle;

class EiaExamTitleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $eiaexamtitles = EiaExamTitle::all();

        return view('eiaexamtitle.index')->witheiaexamtitles($eiaexamtitles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $eiaexamtitles = new EiaExamTitle;

        $eiaexamtitles->eiaexamtitle = $request->eiaexamtitle;
        $eiaexamtitles->save();

        return redirect()->route('eiaexamtitle.index');
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
        $eiaexamtitles = EiaExamTitle::find($id);

        $eiaexamtitles->delete();

        return redirect()->route('eiaexamtitle.index');
    }
}

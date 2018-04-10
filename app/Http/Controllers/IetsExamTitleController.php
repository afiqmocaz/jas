<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\IetsExamTitle;

class IetsExamTitleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ietsexamtitles = IetsExamTitle::all();

        return view('ietsexamtitle.index')->withietsexamtitles($ietsexamtitles);
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
        $ietsexamtitles = new IetsExamTitle;

        $ietsexamtitles->ietsexamtitle = $request->ietsexamtitle;
        $ietsexamtitles->save();

        return redirect()->route('ietsexamtitle.index');
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
        $ietsexamtitles = IetsExamTitle::find($id);

        $ietsexamtitles->delete();

        return redirect()->route('ietsexamtitle.index');
    }
}

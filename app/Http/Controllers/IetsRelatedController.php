<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\IetsRelated;

class IetsRelatedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ietsrelates = IetsRelated::all();

        return view('ietsrelated.index')->withietsrelates($ietsrelates);
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
        $ietsrelates = new IetsRelated;

        $ietsrelates->ietsrelated = $request->ietsrelated;
        $ietsrelates->save();

        return redirect()->route('ietsrelated.index');
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
        $ietsrelates = IetsRelated::find($id);

        $ietsrelates->delete();

        return redirect()->route('ietsrelated.index');
    }
}

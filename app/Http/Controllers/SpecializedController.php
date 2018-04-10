<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Specialized;

class SpecializedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $specializes = Specialized::all();

        return view('specialized.index')->withspecializes($specializes);
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
        $specializes = new Specialized;

        $specializes->specialized = $request->specialized;
        $specializes->save();

        return redirect()->route('specialized.index');
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
    public function edit(Request $request,$id)
    {
       
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
        return $id;
          $specializes = Specialized::find($id);

        $specializes->specialized = $request->specialized;
        $specializes->save();

        return redirect()->route('specialized.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $specializes = Specialized::find($id);

        $specializes->delete();

        return redirect()->route('specialized.index');
    }
}

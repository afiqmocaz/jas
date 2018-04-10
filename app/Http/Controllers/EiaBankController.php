<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EiaBank;
use Session;

class EiaBankController extends Controller
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
        return view('eiabank.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $eiabank = new EiaBank;

        $eiabank->fileToUpload = $request->fileToUpload;
        $eiabank->type = $request->type;
        $eiabank->question = $request->question;
        $eiabank->i = $request->i;
        $eiabank->ii = $request->ii;
        $eiabank->iii = $request->iii;
        $eiabank->iv = $request->iv;
        $eiabank->a = $request->a;
        $eiabank->b = $request->b;
        $eiabank->c = $request->c;
        $eiabank->d = $request->d;
        $eiabank->correct = $request->correct;
        $eiabank->related = $request->related;
        $eiabank->level = $request->level;

        $eiabank -> save();

        Session::flash('success', 'The question has been added to the question bank!');

        return redirect() -> route(('eiabank.show'),$eiabank->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $eiabank = EiaBank::all();
        return view('eiabank.show', compact('eiabank'));
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
        //
    }
}

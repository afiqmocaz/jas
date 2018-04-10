<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\IetsBank;
use Session;

class IetsBankController extends Controller
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
        return view('ietsbank.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ietsbank = new IetsBank;

        $ietsbank->fileToUpload = $request->fileToUpload;
        $ietsbank->type = $request->type;
        $ietsbank->question = $request->question;
        $ietsbank->i = $request->i;
        $ietsbank->ii = $request->ii;
        $ietsbank->iii = $request->iii;
        $ietsbank->iv = $request->iv;
        $ietsbank->a = $request->a;
        $ietsbank->b = $request->b;
        $ietsbank->c = $request->c;
        $ietsbank->d = $request->d;
        $ietsbank->correct = $request->correct;
        $ietsbank->related = $request->related;
        $ietsbank->level = $request->level;

        $ietsbank -> save();

        Session::flash('success', 'The question has been added to the question bank!');

        return redirect() -> route(('ietsbank.show'),$ietsbank->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ietsbank = IetsBank::all();
        return view('ietsbank.show', compact('ietsbank'));
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

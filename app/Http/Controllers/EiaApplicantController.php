<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EiaApplicant;
use App\eiaSectionA;
use App\EiaAppa;
use App\User;
use Session;
use App\Http\Controllers\MasterLayoutController;

class EiaApplicantController extends Controller
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
        $category = 'eia';
        $link = 'eia';
        $master = (new MasterLayoutController)->getSec($category);
         
        return view('eiaapplicant.create', compact('master','category','link'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $eiaapplicant = new EiaApplicant;
        $eiaapplicant->comment = $request->comment;
        $eiaapplicant->status = $request->status;
        
        return redirect() -> route(('eiaapplicant.show'),$eiaapplicant->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $eiaSectionA = eiaSectionA::all();
        $eiaapplicant = EiaApplicant::all();
        $user = User::all();
        return view('eiaapplicant.show', compact('eiaSectionA', 'eiaapplicant', 'user'));
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

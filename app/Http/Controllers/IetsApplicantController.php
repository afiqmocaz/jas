<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\IetsApplicant;
use App\ietsSectionA;
use App\IetsAppa;
use App\User;
use Session;

class IetsApplicantController extends Controller
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
        $category = 'iets';
        $link = 'iets';
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
        $ietsapplicant = new IetsApplicant;
        $ietsapplicant->comment = $request->comment;
        $ietsapplicant->status = $request->status;
        
        return redirect() -> route(('ietsapplicant.show'),$ietsapplicant->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ietsSectionA = ietsSectionA::all();
        $ietsapplicant = IetsApplicant::all();
        $user = User::all();
        return view('ietsapplicant.show', compact('ietsSectionA', 'ietsapplicant', 'user'));
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

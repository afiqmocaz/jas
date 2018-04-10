<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\IetsRubric;
use App\User;
use Session;
use Auth;

class IetsRubricController extends Controller
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
        return view('ietsrubric.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        // find the post in the database and save as a var
        $user = User::find($id);
        //return the view and pass in the var we previously created
        return view('ietsrubric.edit')->withuser($user);
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
        $ietsrubric = IetsRubric::find($id);

        $ietsrubric->criteria = $request->criteria;
        $ietsrubric->percentage = $request->percentage;
        $ietsrubric->user_id = Auth::id();

        $ietsrubric -> save();

        Session::flash('success', 'The comment has been added!');

        return redirect() -> route(('ietsrubric.edit'),$ietsrubric->id);
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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EiaAssignApp;
use App\User;
use Auth;
use Session;
use App\EIAUpload;
use DB;

class EiaAssignAppController extends Controller
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
        $user = User::all();
        $assignupload = EIAUpload::all();
        $eiaassignapp = EiaAssignApp::all();

        $sme = User::join("role_user","role_user.user_id","=","users.id")->where("role_user.role_id",'=',13)->first();
        
        if(!empty($sme)){
            $sme = $sme->name;
        }
        
        return view('eiaassignapp.create', compact('user','eiaassignapp','assignupload','sme'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $eiaassignapp = new EiaAssignApp;
         $eiaassignapp->applicantname = $request->input('appname');
        $eiaassignapp->IC = $request->input('appic');
        $eiaassignapp->upload = $request->input('fileupload');
        $eiaassignapp->panel = $request->input('panel');
        $eiaassignapp->softdate = $request->input('softdate');
        $eiaassignapp->harddate = $request->input('harddate');
        $eiaassignapp->user_id = Auth::id();
        $eiaassignapp -> save();

        return redirect() -> route(('eiaassignapp.create'),$eiaassignapp->id);
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
        //
    }
}

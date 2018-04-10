<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\IetsAssignApp;
use App\User;
use Session;
use Auth;
use App\Uploads;
use DB;

class IetsAssignAppController extends Controller
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
        $assignupload = Uploads::all();
        $ietsassignapp = IetsAssignApp::all();

         /*$sme = DB::table('users')
            ->join('roles', 'users.name', '=', 'roles.name')
            ->join('role_user', 'users.id', '=', 'role_user.user_id')
            ->select('users.name')
            ->get();*/
       //$sme = User::where('role_user.id'=2)->pluck('name','id')->;

       $sme = User::join("role_user","role_user.user_id","=","users.id")->where("role_user.role_id",'=',14)->pluck('name');
            
        return view('ietsassignapp.create', compact('user', 'ietsassignapp','assignupload','sme'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        
        $ietsassignapp = new IetsAssignApp;
        $ietsassignapp->applicantname = $request->input('appname');
        $ietsassignapp->IC = $request->input('appic');
        $ietsassignapp->upload = $request->input('fileupload');
        $ietsassignapp->panel = $request->input('panel');
        $ietsassignapp->softdate = $request->input('softdate');
        $ietsassignapp->harddate = $request->input('harddate');
        $ietsassignapp->user_id = Auth::id();

        $ietsassignapp -> save();

        return redirect() -> route(('ietsassignapp.create'),$ietsassignapp->id);
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

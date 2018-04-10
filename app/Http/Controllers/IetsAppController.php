<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\IetsAppa;
use App\IetsAppb;
use App\IetsAppc;
use App\IetsAppd;
use App\IetsAppe;
use App\User;
use Auth;
use DB;

class IetsAppController extends Controller
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
        $ietsappa = IetsAppa::all();
        $ietsappb = IetsAppb::all();
        $ietsappc = IetsAppc::all();
        $ietsappd = IetsAppd::all();
        $ietsappe = IetsAppe::all();
        $user = User::all();
        return view('ietsapp.create', compact('ietsappa', 'ietsappb','ietsappc','ietsappd','ietsappe', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //store in the database
        $ietsapp= new IetsApp;

        return redirect() -> route(('ietsapp.show'),$ietsapp->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ietsappa = IetsAppa::all();
        $ietsappb = IetsAppb::all();
        $ietsappc = IetsAppc::all();
        $ietsappd = IetsAppd::all();
        $ietsappe = IetsAppe::all();
        $user = User::all();
        return view('ietsapp.show', compact('ietsappa', 'ietsappb','ietsappc','ietsappd','ietsappe', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($user_id)
    {
        // find the post in the database and save as a var
        $ietsappa = IetsAppa::where('user_id','=',$user_id)->first();
        $ietsappb = IetsAppb::where('user_id','=',$user_id)->first();
        $ietsappc = IetsAppc::where('user_id','=',$user_id)->get();
        $ietsappd = IetsAppd::where('user_id','=',$user_id)->first();
        $ietsappe = IetsAppe::where('user_id','=',$user_id)->first();
        $user = User::find($user_id);

         if($ietsappa == NULL && $ietsappb == NULL && $ietsappc == NULL && $ietsappd == NULL && $ietsappe == NULL){
        $array = array_merge($user->toArray());
        }
        
        elseif($ietsappb == NULL && $ietsappc == NULL && $ietsappd == NULL && $ietsappe == NULL){
        $array = array_merge($user->toArray(), $ietsappa->toArray());
        }
        elseif($ietsappb == NULL && $ietsappc == NULL && $ietsappd == NULL && $ietsappe == NULL && $ietsappa == NULL){
        $array = array_merge($user->toArray());
        }
        elseif($ietsappa == NULL && $ietsappc == NULL && $ietsappd == NULL && $ietsappe == NULL){
        $array = array_merge($user->toArray(), $ietsappb->toArray());
        }
        elseif($ietsappb == NULL && $ietsappa == NULL && $ietsappd == NULL && $ietsappe == NULL){
        $array = array_merge($user->toArray(), $ietsappc->toArray());
        }
        elseif($ietsappb == NULL && $ietsappc == NULL && $ietsappa == NULL && $ietsappe == NULL){
        $array = array_merge($user->toArray(), $ietsappd->toArray());
        }
        elseif($ietsappb == NULL && $ietsappc == NULL && $ietsappd == NULL && $ietsappa == NULL){
        $array = array_merge($user->toArray(), $ietsappe->toArray());
        }
        elseif($ietsappb == NULL && $ietsappc == NULL && $ietsappd == NULL && $ietsappe == NULL && $ietsappa == NULL){
        $array = array_merge($user->toArray());
        }
        
        elseif($ietsappc == NULL && $ietsappd == NULL && $ietsappe == NULL){
        $array = array_merge($user->toArray(), $ietsappa->toArray(), $ietsappb->toArray());
        }
        elseif($ietsappc == NULL && $ietsappd == NULL && $ietsappa == NULL && $ietsappb == NULL){
        $array = array_merge($user->toArray(), $ietsappe->toArray());
        }
        elseif($ietsappc == NULL && $ietsappa == NULL && $ietsappe == NULL && $ietsappb == NULL){
        $array = array_merge($user->toArray(), $ietsappd->toArray());
        }
        elseif($ietsappc == NULL && $ietsappa == NULL && $ietsappb == NULL){
        $array = array_merge($user->toArray(), $ietsappd->toArray(), $ietsappe->toArray());
        }
        elseif($ietsappa == NULL && $ietsappd == NULL && $ietsappe == NULL && $ietsappb == NULL){
        $array = array_merge($user->toArray(), $ietsappc->toArray());
        }
        elseif($ietsappa == NULL && $ietsappd == NULL && $ietsappb == NULL){
        $array = array_merge($user->toArray(), $ietsappc->toArray(), $ietsappe->toArray());
        }
        elseif($ietsappa == NULL && $ietsappb == NULL && $ietsappe == NULL){
        $array = array_merge($user->toArray(), $ietsappc->toArray(), $ietsappd->toArray());
        }
        elseif($ietsappc == NULL && $ietsappd == NULL && $ietsappe == NULL && $ietsappb == NULL){
        $array = array_merge($user->toArray(), $ietsappa->toArray());
        }
        elseif($ietsappb == NULL && $ietsappd == NULL && $ietsappe == NULL){
        $array = array_merge($user->toArray(), $ietsappa->toArray(), $ietsappc->toArray());
        }
        elseif($ietsappc == NULL && $ietsappb == NULL && $ietsappe == NULL){
        $array = array_merge($user->toArray(), $ietsappa->toArray(), $ietsappd->toArray());
        }
        elseif($ietsappc == NULL && $ietsappd == NULL && $ietsappe == NULL && $ietsappa == NULL){
        $array = array_merge($user->toArray(), $ietsappb->toArray());
        }
        elseif($ietsappa == NULL && $ietsappd == NULL && $ietsappe == NULL){
        $array = array_merge($user->toArray(), $ietsappc->toArray(), $ietsappb->toArray());
        }
        
        elseif($ietsappd == NULL && $ietsappe == NULL){
        $array = array_merge($user->toArray(), $ietsappa->toArray(), $ietsappb->toArray(), $ietsappc->toArray());
        }
        elseif($ietsappa == NULL && $ietsappb == NULL && $ietsappc == NULL){
        $array = array_merge($user->toArray(), $ietsappd->toArray(), $ietsappe->toArray());
        }
        elseif($ietsappd == NULL && $ietsappa == NULL && $ietsappb == NULL){
        $array = array_merge($user->toArray(), $ietsappe->toArray(), $ietsappc->toArray());
        }
        elseif($ietsappa == NULL && $ietsappe == NULL && $ietsappb == NULL){
        $array = array_merge($user->toArray(), $ietsappd->toArray(), $ietsappc->toArray());
        }
        elseif($ietsappa == NULL && $ietsappb == NULL){
        $array = array_merge($user->toArray(), $ietsappd->toArray(), $ietsappd->toArray(), $ietsappc->toArray());
        }
        elseif($ietsappd == NULL && $ietsappb == NULL && $ietsappc == NULL){
        $array = array_merge($user->toArray(), $ietsappa->toArray(), $ietsappe->toArray());
        }
        elseif($ietsappb == NULL && $ietsappe == NULL && $ietsappc == NULL){
        $array = array_merge($user->toArray(), $ietsappa->toArray(), $ietsappd->toArray());
        }
        elseif($ietsappb == NULL && $ietsappc == NULL){
        $array = array_merge($user->toArray(), $ietsappa->toArray(), $ietsappd->toArray(), $ietsappe->toArray());
        }
        elseif($ietsappd == NULL && $ietsappe == NULL && $ietsappc == NULL){
        $array = array_merge($user->toArray(), $ietsappa->toArray(), $ietsappb->toArray());
        }
        elseif($ietsappd == NULL && $ietsappc == NULL){
        $array = array_merge($user->toArray(), $ietsappa->toArray(), $ietsappb->toArray(), $ietsappe->toArray());
        }
        elseif($ietsappd == NULL && $ietsappa == NULL && $ietsappc == NULL){
        $array = array_merge($user->toArray(), $ietsappe->toArray(), $ietsappb->toArray());
        }
        elseif($ietsappd == NULL && $ietsappe == NULL && $ietsappa == NULL){
        $array = array_merge($user->toArray(), $ietsappb->toArray(), $ietsappc->toArray());
        }
        elseif($ietsappa == NULL && $ietsappe == NULL){
        $array = array_merge($user->toArray(), $ietsappd->toArray(), $ietsappb->toArray(), $ietsappc->toArray());
        }
        elseif($ietsappa == NULL && $ietsappe == NULL && $ietsappc == NULL){
        $array = array_merge($user->toArray(), $ietsappd->toArray(), $ietsappb->toArray());
        }
        elseif($ietsappd == NULL && $ietsappa == NULL){
        $array = array_merge($user->toArray(), $ietsappe->toArray(), $ietsappb->toArray(), $ietsappc->toArray());
        }
        elseif($ietsappa == NULL && $ietsappc == NULL){
        $array = array_merge($user->toArray(), $ietsappd->toArray(), $ietsappb->toArray(), $ietsappe->toArray());
        }
        
        elseif($ietsappe == NULL){
        $array = array_merge($user->toArray(), $ietsappa->toArray(), $ietsappb->toArray(), $ietsappc->toArray(), $ietsappd->toArray());
        }
        elseif($ietsappe == NULL && $ietsappd == NULL){
        $array = array_merge($user->toArray(), $ietsappa->toArray(), $ietsappb->toArray(), $ietsappc->toArray());
        }
        elseif($ietsappc == NULL && $ietsappd == NULL){
        $array = array_merge($user->toArray(), $ietsappa->toArray(), $ietsappb->toArray(), $ietsappe->toArray());
        }
        elseif($ietsappb == NULL && $ietsappc == NULL){
        $array = array_merge($user->toArray(), $ietsappa->toArray(), $ietsappe->toArray(), $ietsappd->toArray());
        }
        elseif($ietsappa == NULL && $ietsappb == NULL){
        $array = array_merge($user->toArray(), $ietsappe->toArray(), $ietsappc->toArray(), $ietsappd->toArray());
        }
        elseif($ietsappa == NULL && $ietsappc == NULL){
        $array = array_merge($user->toArray(), $ietsappe->toArray(), $ietsappb->toArray(), $ietsappd->toArray());
        }
        elseif($ietsappa == NULL && $ietsappd == NULL){
        $array = array_merge($user->toArray(), $ietsappe->toArray(), $ietsappb->toArray(), $ietsappc->toArray());
        }
        elseif($ietsappe == NULL && $ietsappa == NULL){
        $array = array_merge($user->toArray(), $ietsappb->toArray(), $ietsappc->toArray(), $ietsappd->toArray());
        }
        elseif($ietsappa == NULL){
        $array = array_merge($user->toArray(), $ietsappe->toArray(), $ietsappb->toArray(), $ietsappc->toArray(), $ietsappd->toArray());
        }
        elseif($ietsappb == NULL && $ietsappd == NULL){
        $array = array_merge($user->toArray(), $ietsappa->toArray(), $ietsappe->toArray(), $ietsappc->toArray());
        }
        elseif($ietsappe == NULL && $ietsappb == NULL){
        $array = array_merge($user->toArray(), $ietsappa->toArray(), $ietsappc->toArray(), $ietsappd->toArray());
        }
        elseif($ietsappb == NULL){
        $array = array_merge($user->toArray(), $ietsappa->toArray(), $ietsappe->toArray(), $ietsappc->toArray(), $ietsappd->toArray());
        }
        elseif($ietsappe == NULL && $ietsappc == NULL){
        $array = array_merge($user->toArray(), $ietsappa->toArray(), $ietsappb->toArray(), $ietsappd->toArray());
        }
        elseif($ietsappc == NULL){
        $array = array_merge($user->toArray(), $ietsappa->toArray(), $ietsappb->toArray(), $ietsappe->toArray(), $ietsappd->toArray());
        }
        elseif($ietsappd == NULL){
        $array = array_merge($user->toArray(), $ietsappa->toArray(), $ietsappb->toArray(), $ietsappc->toArray(), $ietsappe->toArray());
        }
        
        elseif($ietsappe == NULL){
        $array = array_merge($user->toArray(), $ietsappa->toArray(), $ietsappb->toArray(), $ietsappc->toArray(), $ietsappd->toArray());
        }
        elseif($ietsappd == NULL){
        $array = array_merge($user->toArray(), $ietsappa->toArray(), $ietsappb->toArray(), $ietsappc->toArray(), $ietsappe->toArray());
        }
        elseif($ietsappc == NULL){
        $array = array_merge($user->toArray(), $ietsappa->toArray(), $ietsappb->toArray(), $ietsappd->toArray(), $ietsappe->toArray());
        }
        elseif($ietsappb == NULL){
        $array = array_merge($user->toArray(), $ietsappa->toArray(), $ietsappc->toArray(), $ietsappd->toArray(), $ietsappe->toArray());
        }
        elseif($ietsappa == NULL){
        $array = array_merge($user->toArray(), $ietsappb->toArray(), $ietsappc->toArray(), $ietsappd->toArray(), $ietsappe->toArray());
        }
        else{
        $array = array_merge($user->toArray(), $ietsappa->toArray(), $ietsappb->toArray(), $ietsappc->toArray(), $ietsappd->toArray(), $ietsappe->toArray());
        }
        // return Response::json($array);
        //return the view and pass in the var we previously created
        return view('ietsapp.edit')->witharray($array)->withietsappa($ietsappa)->withietsappb($ietsappb)->withietsappc($ietsappc)->withietsappd($ietsappd)->withietsappe($ietsappe)->withuser($user);
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
       return $request->all();
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

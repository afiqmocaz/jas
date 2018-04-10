<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EiaAppa;
use App\EiaAppb;
use App\EiaAppbs;
use App\EiaAppc;
use App\EiaAppd;
use App\EiaAppe;
use App\EiaAppf;
use App\User;
use Auth;
use DB;

class EiaAppController extends Controller
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
        $eiaappa = EiaAppa::all();
        $eiaappb = EiaAppbs::all();
        $eiaappc = EiaAppc::all();
        $eiaappd = EiaAppd::all();
        $eiaappe = EiaAppe::all();
        $eiaappf = EiaAppf::all();
        $user = User::all();
        return view('eiaapp.create', compact('eiaappa', 'eiaappb','eiaappc','eiaappd','eiaappe','eiaappf', 'user'));
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
        $eiaapp= new EiaApp;

        return redirect() -> route(('eiaapp.show'),$eiaapp->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($user_id)
    {
        $eiaappa = EiaAppa::all();
        $eiaappb = EiaAppbs::all();
        $eiaappc = EiaAppc::all();
        $eiaappd = EiaAppd::all();
        $eiaappe = EiaAppe::all();
        $eiaappf = EiaAppf::all();
        $user = User::all();
        return view('eiaapp.show', compact('eiaappa', 'eiaappb','eiaappc','eiaappd','eiaappe','eiaappf', 'user'));
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
        $eiaappa = EiaAppa::where('user_id','=',$user_id)->first();
        $eiaappb = EiaAppbs::where('user_id','=',$user_id)->get();
        $eiaappc = EiaAppc::where('user_id','=',$user_id)->get();
        $eiaappd = EiaAppd::where('user_id','=',$user_id)->get();
        $eiaappe = EiaAppe::where('user_id','=',$user_id)->first();
        $eiaappf = EiaAppf::where('user_id','=',$user_id)->first();
        $user = User::find($user_id);


        if($eiaappa == NULL && $eiaappb == NULL && $eiaappc == NULL && $eiaappd == NULL && $eiaappe == NULL && $eiaappf == NULL){
        $array = array_merge($user->toArray());
        }
        
        elseif($eiaappb == NULL && $eiaappc == NULL && $eiaappd == NULL && $eiaappe == NULL && $eiaappf == NULL){
        $array = array_merge($user->toArray(), $eiaappa->toArray());
        }
        elseif($eiaappb == NULL && $eiaappc == NULL && $eiaappd == NULL && $eiaappe == NULL && $eiaappa == NULL){
        $array = array_merge($user->toArray(), $eiaappf->toArray());
        }
        elseif($eiaappa == NULL && $eiaappc == NULL && $eiaappd == NULL && $eiaappe == NULL && $eiaappf == NULL){
        $array = array_merge($user->toArray(), $eiaappb->toArray());
        }
        elseif($eiaappb == NULL && $eiaappa == NULL && $eiaappd == NULL && $eiaappe == NULL && $eiaappf == NULL){
        $array = array_merge($user->toArray(), $eiaappc->toArray());
        }
        elseif($eiaappb == NULL && $eiaappc == NULL && $eiaappa == NULL && $eiaappe == NULL && $eiaappf == NULL){
        $array = array_merge($user->toArray(), $eiaappd->toArray());
        }
        elseif($eiaappb == NULL && $eiaappc == NULL && $eiaappd == NULL && $eiaappa == NULL && $eiaappf == NULL){
        $array = array_merge($user->toArray(), $eiaappe->toArray());
        }
        elseif($eiaappb == NULL && $eiaappc == NULL && $eiaappd == NULL && $eiaappe == NULL && $eiaappa == NULL){
        $array = array_merge($user->toArray(), $eiaappf->toArray());
        }
        
        elseif($eiaappc == NULL && $eiaappd == NULL && $eiaappe == NULL && $eiaappf == NULL){
        $array = array_merge($user->toArray(), $eiaappa->toArray(), $eiaappb->toArray());
        }
        elseif($eiaappc == NULL && $eiaappd == NULL && $eiaappa == NULL && $eiaappb == NULL){
        $array = array_merge($user->toArray(), $eiaappe->toArray(), $eiaappf->toArray());
        }
        elseif($eiaappc == NULL && $eiaappa == NULL && $eiaappe == NULL && $eiaappb == NULL){
        $array = array_merge($user->toArray(), $eiaappd->toArray(), $eiaappf->toArray());
        }
        elseif($eiaappc == NULL && $eiaappa == NULL && $eiaappb == NULL && $eiaappf == NULL){
        $array = array_merge($user->toArray(), $eiaappd->toArray(), $eiaappe->toArray());
        }
        elseif($eiaappa == NULL && $eiaappd == NULL && $eiaappe == NULL && $eiaappb == NULL){
        $array = array_merge($user->toArray(), $eiaappc->toArray(), $eiaappf->toArray());
        }
        elseif($eiaappa == NULL && $eiaappd == NULL && $eiaappb == NULL && $eiaappf == NULL){
        $array = array_merge($user->toArray(), $eiaappc->toArray(), $eiaappe->toArray());
        }
        elseif($eiaappa == NULL && $eiaappb == NULL && $eiaappe == NULL && $eiaappf == NULL){
        $array = array_merge($user->toArray(), $eiaappc->toArray(), $eiaappd->toArray());
        }
        elseif($eiaappc == NULL && $eiaappd == NULL && $eiaappe == NULL && $eiaappb == NULL){
        $array = array_merge($user->toArray(), $eiaappa->toArray(), $eiaappf->toArray());
        }
        elseif($eiaappb == NULL && $eiaappd == NULL && $eiaappe == NULL && $eiaappf == NULL){
        $array = array_merge($user->toArray(), $eiaappa->toArray(), $eiaappc->toArray());
        }
        elseif($eiaappc == NULL && $eiaappb == NULL && $eiaappe == NULL && $eiaappf == NULL){
        $array = array_merge($user->toArray(), $eiaappa->toArray(), $eiaappd->toArray());
        }
        elseif($eiaappc == NULL && $eiaappd == NULL && $eiaappe == NULL && $eiaappa == NULL){
        $array = array_merge($user->toArray(), $eiaappf->toArray(), $eiaappb->toArray());
        }
        elseif($eiaappa == NULL && $eiaappd == NULL && $eiaappe == NULL && $eiaappf == NULL){
        $array = array_merge($user->toArray(), $eiaappc->toArray(), $eiaappb->toArray());
        }
        
        elseif($eiaappd == NULL && $eiaappe == NULL && $eiaappf == NULL){
        $array = array_merge($user->toArray(), $eiaappa->toArray(), $eiaappb->toArray(), $eiaappc->toArray());
        }
        elseif($eiaappa == NULL && $eiaappb == NULL && $eiaappc == NULL){
        $array = array_merge($user->toArray(), $eiaappd->toArray(), $eiaappe->toArray(), $eiaappf->toArray());
        }
        elseif($eiaappd == NULL && $eiaappa == NULL && $eiaappb == NULL){
        $array = array_merge($user->toArray(), $eiaappe->toArray(), $eiaappf->toArray(), $eiaappc->toArray());
        }
        elseif($eiaappa == NULL && $eiaappe == NULL && $eiaappb == NULL){
        $array = array_merge($user->toArray(), $eiaappd->toArray(), $eiaappf->toArray(), $eiaappc->toArray());
        }
        elseif($eiaappa == NULL && $eiaappb == NULL && $eiaappf == NULL){
        $array = array_merge($user->toArray(), $eiaappd->toArray(), $eiaappd->toArray(), $eiaappc->toArray());
        }
        elseif($eiaappd == NULL && $eiaappb == NULL && $eiaappc == NULL){
        $array = array_merge($user->toArray(), $eiaappa->toArray(), $eiaappe->toArray(), $eiaappf->toArray());
        }
        elseif($eiaappb == NULL && $eiaappe == NULL && $eiaappc == NULL){
        $array = array_merge($user->toArray(), $eiaappa->toArray(), $eiaappd->toArray(), $eiaappf->toArray());
        }
        elseif($eiaappb == NULL && $eiaappc == NULL && $eiaappf == NULL){
        $array = array_merge($user->toArray(), $eiaappa->toArray(), $eiaappd->toArray(), $eiaappe->toArray());
        }
        elseif($eiaappd == NULL && $eiaappe == NULL && $eiaappc == NULL){
        $array = array_merge($user->toArray(), $eiaappa->toArray(), $eiaappb->toArray(), $eiaappf->toArray());
        }
        elseif($eiaappd == NULL && $eiaappc == NULL && $eiaappf == NULL){
        $array = array_merge($user->toArray(), $eiaappa->toArray(), $eiaappb->toArray(), $eiaappe->toArray());
        }
        elseif($eiaappd == NULL && $eiaappa == NULL && $eiaappc == NULL){
        $array = array_merge($user->toArray(), $eiaappe->toArray(), $eiaappb->toArray(), $eiaappf->toArray());
        }
        elseif($eiaappd == NULL && $eiaappe == NULL && $eiaappa == NULL){
        $array = array_merge($user->toArray(), $eiaappf->toArray(), $eiaappb->toArray(), $eiaappc->toArray());
        }
        elseif($eiaappa == NULL && $eiaappe == NULL && $eiaappf == NULL){
        $array = array_merge($user->toArray(), $eiaappd->toArray(), $eiaappb->toArray(), $eiaappc->toArray());
        }
        elseif($eiaappa == NULL && $eiaappe == NULL && $eiaappc == NULL){
        $array = array_merge($user->toArray(), $eiaappd->toArray(), $eiaappb->toArray(), $eiaappf->toArray());
        }
        elseif($eiaappd == NULL && $eiaappa == NULL && $eiaappf == NULL){
        $array = array_merge($user->toArray(), $eiaappe->toArray(), $eiaappb->toArray(), $eiaappc->toArray());
        }
        elseif($eiaappa == NULL && $eiaappc == NULL && $eiaappf == NULL){
        $array = array_merge($user->toArray(), $eiaappd->toArray(), $eiaappb->toArray(), $eiaappe->toArray());
        }
        
        elseif($eiaappe == NULL && $eiaappf == NULL){
        $array = array_merge($user->toArray(), $eiaappa->toArray(), $eiaappb->toArray(), $eiaappc->toArray(), $eiaappd->toArray());
        }
        elseif($eiaappe == NULL && $eiaappd == NULL){
        $array = array_merge($user->toArray(), $eiaappa->toArray(), $eiaappb->toArray(), $eiaappc->toArray(), $eiaappf->toArray());
        }
        elseif($eiaappc == NULL && $eiaappd == NULL){
        $array = array_merge($user->toArray(), $eiaappa->toArray(), $eiaappb->toArray(), $eiaappe->toArray(), $eiaappf->toArray());
        }
        elseif($eiaappb == NULL && $eiaappc == NULL){
        $array = array_merge($user->toArray(), $eiaappa->toArray(), $eiaappe->toArray(), $eiaappf->toArray(), $eiaappd->toArray());
        }
        elseif($eiaappa == NULL && $eiaappb == NULL){
        $array = array_merge($user->toArray(), $eiaappe->toArray(), $eiaappf->toArray(), $eiaappc->toArray(), $eiaappd->toArray());
        }
        elseif($eiaappa == NULL && $eiaappc == NULL){
        $array = array_merge($user->toArray(), $eiaappe->toArray(), $eiaappb->toArray(), $eiaappf->toArray(), $eiaappd->toArray());
        }
        elseif($eiaappa == NULL && $eiaappd == NULL){
        $array = array_merge($user->toArray(), $eiaappe->toArray(), $eiaappb->toArray(), $eiaappc->toArray(), $eiaappf->toArray());
        }
        elseif($eiaappe == NULL && $eiaappa == NULL){
        $array = array_merge($user->toArray(), $eiaappf->toArray(), $eiaappb->toArray(), $eiaappc->toArray(), $eiaappd->toArray());
        }
        elseif($eiaappa == NULL && $eiaappf == NULL){
        $array = array_merge($user->toArray(), $eiaappe->toArray(), $eiaappb->toArray(), $eiaappc->toArray(), $eiaappd->toArray());
        }
        elseif($eiaappb == NULL && $eiaappd == NULL){
        $array = array_merge($user->toArray(), $eiaappa->toArray(), $eiaappe->toArray(), $eiaappc->toArray(), $eiaappf->toArray());
        }
        elseif($eiaappe == NULL && $eiaappb == NULL){
        $array = array_merge($user->toArray(), $eiaappa->toArray(), $eiaappf->toArray(), $eiaappc->toArray(), $eiaappd->toArray());
        }
        elseif($eiaappb == NULL && $eiaappf == NULL){
        $array = array_merge($user->toArray(), $eiaappa->toArray(), $eiaappe->toArray(), $eiaappc->toArray(), $eiaappd->toArray());
        }
        elseif($eiaappe == NULL && $eiaappc == NULL){
        $array = array_merge($user->toArray(), $eiaappa->toArray(), $eiaappb->toArray(), $eiaappf->toArray(), $eiaappd->toArray());
        }
        elseif($eiaappc == NULL && $eiaappf == NULL){
        $array = array_merge($user->toArray(), $eiaappa->toArray(), $eiaappb->toArray(), $eiaappe->toArray(), $eiaappd->toArray());
        }
        elseif($eiaappd == NULL && $eiaappf == NULL){
        $array = array_merge($user->toArray(), $eiaappa->toArray(), $eiaappb->toArray(), $eiaappc->toArray(), $eiaappe->toArray());
        }
        
        elseif($eiaappf == NULL){
        $array = array_merge($user->toArray(), $eiaappa->toArray(), $eiaappb->toArray(), $eiaappc->toArray(), $eiaappd->toArray(), $eiaappe->toArray());
        }
        elseif($eiaappe == NULL){
        $array = array_merge($user->toArray(), $eiaappa->toArray(), $eiaappb->toArray(), $eiaappc->toArray(), $eiaappd->toArray(), $eiaappf->toArray());
        }
        elseif($eiaappd == NULL){
        $array = array_merge($user->toArray(), $eiaappa->toArray(), $eiaappb->toArray(), $eiaappc->toArray(), $eiaappf->toArray(), $eiaappe->toArray());
        }
        elseif($eiaappc == NULL){
        $array = array_merge($user->toArray(), $eiaappa->toArray(), $eiaappb->toArray(), $eiaappf->toArray(), $eiaappd->toArray(), $eiaappe->toArray());
        }
        elseif($eiaappb == NULL){
        $array = array_merge($user->toArray(), $eiaappa->toArray(), $eiaappf->toArray(), $eiaappc->toArray(), $eiaappd->toArray(), $eiaappe->toArray());
        }
        elseif($eiaappa == NULL){
        $array = array_merge($user->toArray(), $eiaappf->toArray(), $eiaappb->toArray(), $eiaappc->toArray(), $eiaappd->toArray(), $eiaappe->toArray());
        }
        else{
        $array = array_merge($user->toArray(), $eiaappa->toArray(), $eiaappb->toArray(), $eiaappc->toArray(), $eiaappd->toArray(), $eiaappe->toArray(), $eiaappf->toArray());
        }
        // return Response::json($array);
        //return the view and pass in the var we previously created
        return view('eiaapp.edit')->witharray($array)->witheiaappa($eiaappa)->witheiaappb($eiaappb)->witheiaappc($eiaappc)->witheiaappd($eiaappd)->witheiaappe($eiaappe)->witheiaappf($eiaappf)->withuser($user);
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

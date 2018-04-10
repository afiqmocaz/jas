<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ApcsAppa;
use App\ApcsAppb;
use App\ApcsAppc;
use App\ApcsAppd;
use App\ApcsAppe;
use App\ApcsAppf;
use App\User;
use Auth;
use DB;


class ApcsAppController extends Controller
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
        $apcsappa = ApcsAppa::all();
        $apcsappb = ApcsAppb::all();
        $apcsappc = ApcsAppc::all();
        $apcsappd = ApcsAppd::all();
        $apcsappe = ApcsAppe::all();
        $apcsappf = ApcsAppf::all();
        $user = User::all();
        return view('apcsapp.create', compact('apcsappa', 'apcsappb','apcsappc','apcsappd','apcsappe','apcsappf', 'user'));
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
        $apcsapp= new ApcsApp;

        return redirect() -> route(('apcsapp.show'),$apcsapp->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($user_id)
    {
       $apcsappa = ApcsAppa::all();
        $apcsappb = ApcsAppb::all();
        $apcsappc = ApcsAppc::all();
        $apcsappd = ApcsAppd::all();
        $apcsappe = ApcsAppe::all();
        $apcsappf = ApcsAppf::all();
        $user = User::all();
        return view('apcsapp.show', compact('apcsappa', 'apcsappb','apcsappc','apcsappd','apcsappe','apcsappf', 'user'));
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
        $apcsappa = ApcsAppa::where('user_id','=',$user_id)->first();
        $apcsappb = ApcsAppb::where('user_id','=',$user_id)->first();
        $apcsappc = ApcsAppc::where('user_id','=',$user_id)->first();
        $apcsappd = ApcsAppd::where('user_id','=',$user_id)->get();
        $apcsappe = ApcsAppe::where('user_id','=',$user_id)->first();
        $apcsappf = ApcsAppf::where('user_id','=',$user_id)->first();
        $user = User::find($user_id);

        if($apcsappa == NULL && $apcsappb == NULL && $apcsappc == NULL && $apcsappd == NULL && $apcsappe == NULL && $apcsappf == NULL){
        $array = array_merge($user->toArray());
        }
        
        elseif($apcsappb == NULL && $apcsappc == NULL && $apcsappd == NULL && $apcsappe == NULL && $apcsappf == NULL){
        $array = array_merge($user->toArray(), $apcsappa->toArray());
        }
        elseif($apcsappb == NULL && $apcsappc == NULL && $apcsappd == NULL && $apcsappe == NULL && $apcsappa == NULL){
        $array = array_merge($user->toArray(), $apcsappf->toArray());
        }
        elseif($apcsappa == NULL && $apcsappc == NULL && $apcsappd == NULL && $apcsappe == NULL && $apcsappf == NULL){
        $array = array_merge($user->toArray(), $apcsappb->toArray());
        }
        elseif($apcsappb == NULL && $apcsappa == NULL && $apcsappd == NULL && $apcsappe == NULL && $apcsappf == NULL){
        $array = array_merge($user->toArray(), $apcsappc->toArray());
        }
        elseif($apcsappb == NULL && $apcsappc == NULL && $apcsappa == NULL && $apcsappe == NULL && $apcsappf == NULL){
        $array = array_merge($user->toArray(), $apcsappd->toArray());
        }
        elseif($apcsappb == NULL && $apcsappc == NULL && $apcsappd == NULL && $apcsappa == NULL && $apcsappf == NULL){
        $array = array_merge($user->toArray(), $apcsappe->toArray());
        }
        elseif($apcsappb == NULL && $apcsappc == NULL && $apcsappd == NULL && $apcsappe == NULL && $apcsappa == NULL){
        $array = array_merge($user->toArray(), $apcsappf->toArray());
        }
        
        elseif($apcsappc == NULL && $apcsappd == NULL && $apcsappe == NULL && $apcsappf == NULL){
        $array = array_merge($user->toArray(), $apcsappa->toArray(), $apcsappb->toArray());
        }
        elseif($apcsappc == NULL && $apcsappd == NULL && $apcsappa == NULL && $apcsappb == NULL){
        $array = array_merge($user->toArray(), $apcsappe->toArray(), $apcsappf->toArray());
        }
        elseif($apcsappc == NULL && $apcsappa == NULL && $apcsappe == NULL && $apcsappb == NULL){
        $array = array_merge($user->toArray(), $apcsappd->toArray(), $apcsappf->toArray());
        }
        elseif($apcsappc == NULL && $apcsappa == NULL && $apcsappb == NULL && $apcsappf == NULL){
        $array = array_merge($user->toArray(), $apcsappd->toArray(), $apcsappe->toArray());
        }
        elseif($apcsappa == NULL && $apcsappd == NULL && $apcsappe == NULL && $apcsappb == NULL){
        $array = array_merge($user->toArray(), $apcsappc->toArray(), $apcsappf->toArray());
        }
        elseif($apcsappa == NULL && $apcsappd == NULL && $apcsappb == NULL && $apcsappf == NULL){
        $array = array_merge($user->toArray(), $apcsappc->toArray(), $apcsappe->toArray());
        }
        elseif($apcsappa == NULL && $apcsappb == NULL && $apcsappe == NULL && $apcsappf == NULL){
        $array = array_merge($user->toArray(), $apcsappc->toArray(), $apcsappd->toArray());
        }
        elseif($apcsappc == NULL && $apcsappd == NULL && $apcsappe == NULL && $apcsappb == NULL){
        $array = array_merge($user->toArray(), $apcsappa->toArray(), $apcsappf->toArray());
        }
        elseif($apcsappb == NULL && $apcsappd == NULL && $apcsappe == NULL && $apcsappf == NULL){
        $array = array_merge($user->toArray(), $apcsappa->toArray(), $apcsappc->toArray());
        }
        elseif($apcsappc == NULL && $apcsappb == NULL && $apcsappe == NULL && $apcsappf == NULL){
        $array = array_merge($user->toArray(), $apcsappa->toArray(), $apcsappd->toArray());
        }
        elseif($apcsappc == NULL && $apcsappd == NULL && $apcsappe == NULL && $apcsappa == NULL){
        $array = array_merge($user->toArray(), $apcsappf->toArray(), $apcsappb->toArray());
        }
        elseif($apcsappa == NULL && $apcsappd == NULL && $apcsappe == NULL && $apcsappf == NULL){
        $array = array_merge($user->toArray(), $apcsappc->toArray(), $apcsappb->toArray());
        }
        
        elseif($apcsappd == NULL && $apcsappe == NULL && $apcsappf == NULL){
        $array = array_merge($user->toArray(), $apcsappa->toArray(), $apcsappb->toArray(), $apcsappc->toArray());
        }
        elseif($apcsappa == NULL && $apcsappb == NULL && $apcsappc == NULL){
        $array = array_merge($user->toArray(), $apcsappd->toArray(), $apcsappe->toArray(), $apcsappf->toArray());
        }
        elseif($apcsappd == NULL && $apcsappa == NULL && $apcsappb == NULL){
        $array = array_merge($user->toArray(), $apcsappe->toArray(), $apcsappf->toArray(), $apcsappc->toArray());
        }
        elseif($apcsappa == NULL && $apcsappe == NULL && $apcsappb == NULL){
        $array = array_merge($user->toArray(), $apcsappd->toArray(), $apcsappf->toArray(), $apcsappc->toArray());
        }
        elseif($apcsappa == NULL && $apcsappb == NULL && $apcsappf == NULL){
        $array = array_merge($user->toArray(), $apcsappd->toArray(), $apcsappd->toArray(), $apcsappc->toArray());
        }
        elseif($apcsappd == NULL && $apcsappb == NULL && $apcsappc == NULL){
        $array = array_merge($user->toArray(), $apcsappa->toArray(), $apcsappe->toArray(), $apcsappf->toArray());
        }
        elseif($apcsappb == NULL && $apcsappe == NULL && $apcsappc == NULL){
        $array = array_merge($user->toArray(), $apcsappa->toArray(), $apcsappd->toArray(), $apcsappf->toArray());
        }
        elseif($apcsappb == NULL && $apcsappc == NULL && $apcsappf == NULL){
        $array = array_merge($user->toArray(), $apcsappa->toArray(), $apcsappd->toArray(), $apcsappe->toArray());
        }
        elseif($apcsappd == NULL && $apcsappe == NULL && $apcsappc == NULL){
        $array = array_merge($user->toArray(), $apcsappa->toArray(), $apcsappb->toArray(), $apcsappf->toArray());
        }
        elseif($apcsappd == NULL && $apcsappc == NULL && $apcsappf == NULL){
        $array = array_merge($user->toArray(), $apcsappa->toArray(), $apcsappb->toArray(), $apcsappe->toArray());
        }
        elseif($apcsappd == NULL && $apcsappa == NULL && $apcsappc == NULL){
        $array = array_merge($user->toArray(), $apcsappe->toArray(), $apcsappb->toArray(), $apcsappf->toArray());
        }
        elseif($apcsappd == NULL && $apcsappe == NULL && $apcsappa == NULL){
        $array = array_merge($user->toArray(), $apcsappf->toArray(), $apcsappb->toArray(), $apcsappc->toArray());
        }
        elseif($apcsappa == NULL && $apcsappe == NULL && $apcsappf == NULL){
        $array = array_merge($user->toArray(), $apcsappd->toArray(), $apcsappb->toArray(), $apcsappc->toArray());
        }
        elseif($apcsappa == NULL && $apcsappe == NULL && $apcsappc == NULL){
        $array = array_merge($user->toArray(), $apcsappd->toArray(), $apcsappb->toArray(), $apcsappf->toArray());
        }
        elseif($apcsappd == NULL && $apcsappa == NULL && $apcsappf == NULL){
        $array = array_merge($user->toArray(), $apcsappe->toArray(), $apcsappb->toArray(), $apcsappc->toArray());
        }
        elseif($apcsappa == NULL && $apcsappc == NULL && $apcsappf == NULL){
        $array = array_merge($user->toArray(), $apcsappd->toArray(), $apcsappb->toArray(), $apcsappe->toArray());
        }
        
        elseif($apcsappe == NULL && $apcsappf == NULL){
        $array = array_merge($user->toArray(), $apcsappa->toArray(), $apcsappb->toArray(), $apcsappc->toArray(), $apcsappd->toArray());
        }
        elseif($apcsappe == NULL && $apcsappd == NULL){
        $array = array_merge($user->toArray(), $apcsappa->toArray(), $apcsappb->toArray(), $apcsappc->toArray(), $apcsappf->toArray());
        }
        elseif($apcsappc == NULL && $apcsappd == NULL){
        $array = array_merge($user->toArray(), $apcsappa->toArray(), $apcsappb->toArray(), $apcsappe->toArray(), $apcsappf->toArray());
        }
        elseif($apcsappb == NULL && $apcsappc == NULL){
        $array = array_merge($user->toArray(), $apcsappa->toArray(), $apcsappe->toArray(), $apcsappf->toArray(), $apcsappd->toArray());
        }
        elseif($apcsappa == NULL && $apcsappb == NULL){
        $array = array_merge($user->toArray(), $apcsappe->toArray(), $apcsappf->toArray(), $apcsappc->toArray(), $apcsappd->toArray());
        }
        elseif($apcsappa == NULL && $apcsappc == NULL){
        $array = array_merge($user->toArray(), $apcsappe->toArray(), $apcsappb->toArray(), $apcsappf->toArray(), $apcsappd->toArray());
        }
        elseif($apcsappa == NULL && $apcsappd == NULL){
        $array = array_merge($user->toArray(), $apcsappe->toArray(), $apcsappb->toArray(), $apcsappc->toArray(), $apcsappf->toArray());
        }
        elseif($apcsappe == NULL && $apcsappa == NULL){
        $array = array_merge($user->toArray(), $apcsappf->toArray(), $apcsappb->toArray(), $apcsappc->toArray(), $apcsappd->toArray());
        }
        elseif($apcsappa == NULL && $apcsappf == NULL){
        $array = array_merge($user->toArray(), $apcsappe->toArray(), $apcsappb->toArray(), $apcsappc->toArray(), $apcsappd->toArray());
        }
        elseif($apcsappb == NULL && $apcsappd == NULL){
        $array = array_merge($user->toArray(), $apcsappa->toArray(), $apcsappe->toArray(), $apcsappc->toArray(), $apcsappf->toArray());
        }
        elseif($apcsappe == NULL && $apcsappb == NULL){
        $array = array_merge($user->toArray(), $apcsappa->toArray(), $apcsappf->toArray(), $apcsappc->toArray(), $apcsappd->toArray());
        }
        elseif($apcsappb == NULL && $apcsappf == NULL){
        $array = array_merge($user->toArray(), $apcsappa->toArray(), $apcsappe->toArray(), $apcsappc->toArray(), $apcsappd->toArray());
        }
        elseif($apcsappe == NULL && $apcsappc == NULL){
        $array = array_merge($user->toArray(), $apcsappa->toArray(), $apcsappb->toArray(), $apcsappf->toArray(), $apcsappd->toArray());
        }
        elseif($apcsappc == NULL && $apcsappf == NULL){
        $array = array_merge($user->toArray(), $apcsappa->toArray(), $apcsappb->toArray(), $apcsappe->toArray(), $apcsappd->toArray());
        }
        elseif($apcsappd == NULL && $apcsappf == NULL){
        $array = array_merge($user->toArray(), $apcsappa->toArray(), $apcsappb->toArray(), $apcsappc->toArray(), $apcsappe->toArray());
        }
        
        elseif($apcsappf == NULL){
        $array = array_merge($user->toArray(), $apcsappa->toArray(), $apcsappb->toArray(), $apcsappc->toArray(), $apcsappd->toArray(), $apcsappe->toArray());
        }
        elseif($apcsappe == NULL){
        $array = array_merge($user->toArray(), $apcsappa->toArray(), $apcsappb->toArray(), $apcsappc->toArray(), $apcsappd->toArray(), $apcsappf->toArray());
        }
        elseif($apcsappd == NULL){
        $array = array_merge($user->toArray(), $apcsappa->toArray(), $apcsappb->toArray(), $apcsappc->toArray(), $apcsappf->toArray(), $apcsappe->toArray());
        }
        elseif($apcsappc == NULL){
        $array = array_merge($user->toArray(), $apcsappa->toArray(), $apcsappb->toArray(), $apcsappf->toArray(), $apcsappd->toArray(), $apcsappe->toArray());
        }
        elseif($apcsappb == NULL){
        $array = array_merge($user->toArray(), $apcsappa->toArray(), $apcsappf->toArray(), $apcsappc->toArray(), $apcsappd->toArray(), $apcsappe->toArray());
        }
        elseif($apcsappa == NULL){
        $array = array_merge($user->toArray(), $apcsappf->toArray(), $apcsappb->toArray(), $apcsappc->toArray(), $apcsappd->toArray(), $apcsappe->toArray());
        }
        else{
        $array = array_merge($user->toArray(), $apcsappa->toArray(), $apcsappb->toArray(), $apcsappc->toArray(), $apcsappd->toArray(), $apcsappe->toArray(), $apcsappf->toArray());
        }
        // return Response::json($array);
        //return the view and pass in the var we previously created
        return view('apcsapp.edit')->witharray($array)->withapcsappa($apcsappa)->withapcsappb($apcsappb)->withapcsappc($apcsappc)->withapcsappd($apcsappd)->withapcsappe($apcsappe)->withapcsappf($apcsappf)->withuser($user);
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

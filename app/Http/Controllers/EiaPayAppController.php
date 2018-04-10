<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EiaPayAppController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //EiaPayInfo

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
         $eiapayment = EiaPayInfo::all();
       $user = User::all();
       return view('eiapayapp.create',compact('eiapayment','user'));
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
        $eiapay = new EiaPayment;
        return redirect()->route(('eiapayapp.show'),$eiapay->id);
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
          $eiapayment = EiaPayInfo::all();
       $user = User::all();
       return view('eiapayapp.show',compact('eiapayment','user'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($user_id)
    {
        //
        $eiapayinfo = EiaPayInfo::all();
        $user = User::all();

        $array = array_merge($user->toArray(), $eiapayinfo->toArray());

        return view('eiapayinfo.edit')->witharray($array)->witheiapayinfo($eiapayinfo)->withuser($user);
    }
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

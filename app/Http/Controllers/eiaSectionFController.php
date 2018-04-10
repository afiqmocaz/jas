<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\eiaSectionF;
use App\EiaAppf;
use Session;
use Auth;
use Mail;

class eiaSectionFController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('eiaSectionF.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $eiaSectionA = eiaSectionF::where('user_id',Auth::id())->get();
        
            if(eiaSectionF::where('user_id', '=',Auth::id())->exists()){
                return view('eiaSectionF.finish', compact('eiaSectionA'));
            }

     else{
        return view('eiaSectionF.create');}
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $eiaSectionF = new eiaSectionF;
        $eiaappf = new EiaAppf;
        // $eiaSectionF->declaration = $request->declaration;
        $eiaSectionF->user_id = Auth::id();
        $eiaSectionF->applicant_id = $request->applicant_id;

        $eiaappf->user_id = Auth::id();
        $eiaappf->applicant_id = $request->applicant_id;

        Mail::send('emails.request', ['eiaappf' => $eiaappf], function ($m) use ($eiaappf) {
           // $m->from($users->email, 'Your Application');
            
            /*$m->to('nazifasmohdhussein@gmail.com')->subject('New Registration');
            $m->to('noorhazirahassan@gmail.com')->subject('New Registration');*/
            $m->to('tedmagoo@gmail.com')->subject('New Registration');
        }); 
        
        
        $eiaSectionF->save();
        $eiaappf->save();

        Session::flash('success', 'The post sucessfull');

        //redirect to another page
        return redirect("/eiaSectionF");
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

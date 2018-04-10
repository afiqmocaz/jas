<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\eiaSectionE;
use App\EiaAppe;
use Validator;
use Session;
use Auth;

class eiaSectionEController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $eiaSectionE = eiaSectionE::where('user_id',Auth::id())->get();
        
            if(eiaSectionE::where('user_id', '=',Auth::id())->exists()){
                return view('eiaSectionE.show', compact('eiaSectionE'));
            }

        return view('eiaSectionE.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, array('first_specialize' => 'required', 'second_specialize' => 'required'));

        $eiaSectionE = new eiaSectionE;
        $eiaappe = new EiaAppe;

        $eiaSectionE->first_specialize = $request->first_specialize;
        $eiaSectionE->second_specialize = $request->second_specialize;
        $eiaSectionE->user_id = Auth::id();
        $eiaSectionE->applicant_id = $request->applicant_id;

        $eiaappe->first_specialize = $request->first_specialize;
        $eiaappe->second_specialize = $request->second_specialize;
        $eiaappe->user_id = Auth::id();
        $eiaappe->applicant_id = $request->applicant_id;
        

        $eiaSectionE->save();
        $eiaappe->save();

        Session::flash('success', 'The post sucessfull');

        //redirect to another page

        return redirect()->route('eiaSectionE.show', $eiaSectionE->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $eiaSectionE = EiaSectionE::where('user_id',Auth::id())->get();
        //from session
        return view('eiaSectionE.show', compact('eiaSectionE'));
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
        $eiaSectionE = EiaSectionE::find($id);

        //return the view and pass in the var we previously created
        return view('eiaSectionE.edit', compact('eiaSectionE'));
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
        $this->validate($request, array('first_specialize' => 'required', 'second_specialize' => 'required'));

        $eiaSectionE = eiaSectionE::find($id);
        $eiaSectionE->first_specialize = $request->first_specialize;
        $eiaSectionE->second_specialize = $request->second_specialize;

        $eiaappe = EiaAppe::find($id);
        $eiaappe->first_specialize = $request->first_specialize;
        $eiaappe->second_specialize = $request->second_specialize;


        $eiaappe->save();

        $eiaSectionE->save();

        Session::flash('success', 'The post sucessfull');

        //redirect to another page

        return redirect()->route('eiaSectionE.show', $eiaSectionE->id);
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

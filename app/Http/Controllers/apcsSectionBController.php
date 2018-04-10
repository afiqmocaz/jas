<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\apcsSectionB;
use App\apcsSpecializeSectionB;
use App\ApcsAppb;
use Validator;
use Response;
use Redirect;
use Session;
use App\Uploads;
use DB;
use Auth;
use App\Specialized;
class apcsSectionBController extends Controller
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
    {   $specializes = Specialized::all();
        $apcsSectionB = apcsSectionB::where('user_id',Auth::id())->get();
        
            if(apcsSectionB::where('user_id', '=',Auth::id())->exists()){
                return view('apcsSectionB.show', compact('apcsSectionB','specializes'));
            }

        return view('apcsSectionB.create',compact('specializes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $this->validate($request, array('specialize' => 'required'));



                //store in database
        $apcsappb = new ApcsAppb;

        $apcsSectionB = new apcsSectionB;
        $apcsSectionB->specialize_0 = $request->specialize_0;
        $apcsSectionB->specialize_1 = $request->specialize_1;
        $apcsSectionB->specialize_2 = $request->specialize_2;
        $apcsSectionB->specialize_3 = $request->specialize_3;
        $apcsSectionB->user_id = Auth::id();
        $apcsSectionB->applicant_id = $request->applicant_id;
        // $apcsSectionB->name = $request->name;

        $apcsappb->specialize_0 = $request->specialize_0;
        $apcsappb->specialize_1 = $request->specialize_1;
        $apcsappb->specialize_2 = $request->specialize_2;
        $apcsappb->specialize_3 = $request->specialize_3;
        $apcsappb->user_id = Auth::id();
        $apcsappb->applicant_id = $request->applicant_id;
        // $apcsappb->name = $request->name;

        $apcsSectionB->save();
        $apcsappb->save();

        Session::flash('success', 'The post sucessfull');

        //redirect to another page

        return redirect()->route('apcsSectionB.show', $apcsSectionB->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $apcsSectionB = apcsSectionB::where('user_id',Auth::id())->get();
       
        //from session
         return view('apcsSectionB.show', compact('apcsSectionB'));
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
        $apcsSectionB = apcsSectionB::find($id);
        $specializes = Specialized::all();
        //return the view and pass in the var we previously created
        return view('apcsSectionB.edit', compact('apcsSectionB','specializes'));
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
        $apcsappb = ApcsAppb::find($id);
        $apcsSectionB = apcsSectionB::find($id);

        $apcsSectionB->specialize_0 = $request->specialize_0;
        $apcsSectionB->specialize_1 = $request->specialize_1;
        $apcsSectionB->specialize_2 = $request->specialize_2;
        $apcsSectionB->specialize_3 = $request->specialize_3;
        $apcsSectionB->user_id = Auth::id();
        $apcsSectionB->applicant_id = $request->applicant_id;
        // $apcsSectionB->name = $request->name;

        $apcsappb->specialize_0 = $request->specialize_0;
        $apcsappb->specialize_1 = $request->specialize_1;
        $apcsappb->specialize_2 = $request->specialize_2;
        $apcsappb->specialize_3 = $request->specialize_3;
        $apcsappb->user_id = Auth::id();
        $apcsappb->applicant_id = $request->applicant_id;
        // $apcsappb->name = $request->name;

         $apcsSectionB->save();

         $apcsappb->save();

        Session::flash('success', 'The post sucessfull');

        //redirect to another page

        return redirect()->route('apcsSectionB.show', $apcsSectionB->id);
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

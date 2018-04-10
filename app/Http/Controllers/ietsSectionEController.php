<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ietsSectionE;
use App\IetsAppe;
use Session;
use Auth;
use Mail;
use App\IetsApplicant;
class ietsSectionEController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('ietsSectionE.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          $ietsSectionE = ietsSectionE::where('user_id',Auth::id())->get();
        $ietsApplicant = IetsApplicant::where('user_id','=',Auth::id())->first();
            if(ietsSectionE::where('user_id', '=',Auth::id())->exists()){
                if($ietsApplicant->status==="Declined"||$ietsApplicant->status==="ReRegister"){
                      if(!empty(ietsSectionE::where('user_id', '=',Auth::id())))
                      {
                        $this->destroy(Auth::id());
                       return view('ietsSectionE.create');}
                    return view('ietsSectionE.create');
                }
                return view('ietsSectionE.finish', compact('ietsSectionE'));
            }

     else{
        return view('ietsSectionE.create');}
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $ietsSectionE = new ietsSectionE;
            $ietsappe = new IetsAppe;

        $ietsSectionE->confession = $request->confession;
        // $ietsSectionE->declaration = $request->declaration;
        $ietsSectionE->user_id = Auth::id();
        $ietsSectionE->applicant_id = $request->applicant_id;
        // $ietsSectionE->name = $request->name;

        $ietsappe->confession = $request->confession;
        // $ietsappe->declaration = $request->declaration;
        $ietsappe->user_id = Auth::id();
        $ietsappe->applicant_id = $request->applicant_id;
        // $ietsappe->name = $request->name;
        $ietsApplicant = IetsApplicant::where('user_id','=',Auth::id())->first();
        $ietsApplicant->status="In Process...";
        $ietsApplicant->section="";
        $ietsApplicant->save();
       
        
        $ietsappe->save();
        
        $ietsSectionE->save();


        //  $mainReg = new mainReg;
        //  $mainReg->status_id = $request->status_id;

        // $mainReg->save();

        Session::flash('success', 'The post sucessfull');

        //redirect to another page
         return redirect("/ietsSectionE");
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
          $ietsSectionE = ietsSectionE::where('user_id',$id);
                $ietsSectionE-> delete();
                $ietsappe = IetsAppe::where('user_id',$id);
                if(!empty($ietsappe))
                {
                    $ietsappe->delete();
                }
                
                $ietsSectionE-> delete();
        Session::flash('success', 'The announcement was successfully deleted!');    
    }
    
}

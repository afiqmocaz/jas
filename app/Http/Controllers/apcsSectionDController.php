<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\apcsSectionD;
use App\ApcsAppd;
use Validator;
use Session;
use Auth;
use DB;

class apcsSectionDController extends Controller
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
         $apcsSectionD = apcsSectionD::where('user_id',Auth::id())->get();
        
            if(apcsSectionD::where('user_id', '=',Auth::id())->exists()){
                 $firtProject = apcsSectionD::where('user_id',Auth::id())->min('projectStart');
          $lastProject = apcsSectionD::where('user_id',Auth::id())->max('projectComplete');
          
          $ts1 = strtotime($firtProject);
          $ts2 = strtotime($lastProject);

          $apcsSectionD2 = ((date('Y', $ts2) - date('Y', $ts1)) * 12) + (date('m', $ts2) - date('m', $ts1))-$this->gap();
          
                return view('apcsSectionD.show', compact('apcsSectionD','apcsSectionD2'));
            }

        return view('apcsSectionD.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, array(
           'projectStart' => 'required|before:projectComplete', 
            'projectComplete' => 'required|before:tomorrow',
            'proposaltitle' => 'required', 
            'clientname' => 'required', 
            'clientaddress' => 'required',
            'supportdoc' => 'required|mimes:pdf|max:10240'));

        $apcsappd = new ApcsAppd;

        $apcsSectionD = new apcsSectionD;
        $apcsSectionD->projectStart = $request->projectStart;
        $apcsSectionD->projectComplete = $request->projectComplete;
        $apcsSectionD->numdays = $request->numdays;
        $apcsSectionD->numMonths = $request->numMonths;
        $apcsSectionD->proposaltitle = $request->proposaltitle;
        $apcsSectionD->clientname = $request->clientname;
        $apcsSectionD->clientaddress = $request->clientaddress;
        $apcsSectionD->user_id = Auth::id();
        $apcsSectionD->applicant_id = $request->applicant_id;
        // $apcsSectionD->name = $request->name;
        $apcsappd->user_id = Auth::id();

        $apcsappd->projectStart = $request->projectStart;
        $apcsappd->projectComplete = $request->projectComplete;
        $apcsappd->numdays = $request->numdays;
        $apcsappd->numMonths = $request->numMonths;
        $apcsappd->proposaltitle = $request->proposaltitle;
        $apcsappd->clientname = $request->clientname;
        $apcsappd->clientaddress = $request->clientaddress;

        $apcsappd->applicant_id = $request->applicant_id;
        // $apcsappd->name = $request->name;

        if ($request->hasFile('supportdoc')){
            $apcsSectionD->supportdoc = $request->input('supportdoc');
            $apcsappd->supportdoc = $request->input('supportdoc');
            $file = $request->file('supportdoc');
            $file2 = $file->getClientOriginalName();
            $filename = $file2; //save image as .png @ etc
            $apcsSectionD->supportdoc = $filename; //save file to which column
             $apcsappd->supportdoc = $filename;
            $request->file('supportdoc')->move(base_path().'/public/uploads/',$filename);
        }


        $apcsSectionD->save();
        $apcsappd->save();

        Session::flash('success', 'The post sucessfull');

        //redirect to another page

        return redirect()->route('apcsSectionD.show', $apcsSectionD->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   public function show($id)
    {
          $apcsSectionD = apcsSectionD::where('user_id',Auth::id())->get();
        //from session
        
        //$apcsSectionD2 = DB::table('apcs_section_ds')->where('user_id',Auth::id())->sum('numMonths');
          $firtProject = apcsSectionD::where('user_id',Auth::id())->min('projectStart');
          $lastProject = apcsSectionD::where('user_id',Auth::id())->max('projectComplete');
          
          $ts1 = strtotime($firtProject);
          $ts2 = strtotime($lastProject);

          $apcsSectionD2 = ((date('Y', $ts2) - date('Y', $ts1)) * 12) + (date('m', $ts2) - date('m', $ts1))-$this->gap();
          
        return view('apcsSectionD.show', compact('apcsSectionD','apcsSectionD2'));
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
        $apcsSectionD = apcsSectionD::find($id);

        //return the view and pass in the var we previously created
        return view('apcsSectionD.edit', compact('apcsSectionD'));
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
        $this->validate($request, array(
              'projectStart' => 'required|before:projectComplete', 
            'projectComplete' => 'required|before:tomorrow',
            'proposaltitle' => 'required', 
            'clientname' => 'required', 
            'clientaddress' => 'required'

            ));

        $apcsSectionD = apcsSectionD::find($id);
        $apcsSectionD->projectStart = $request->projectStart;
        $apcsSectionD->projectComplete = $request->projectComplete;
        $apcsSectionD->numdays = $request->numdays;
        $apcsSectionD->numMonths = $request->numMonths;
        $apcsSectionD->proposaltitle = $request->proposaltitle;
        $apcsSectionD->clientname = $request->clientname;
        $apcsSectionD->clientaddress = $request->clientaddress;
        $apcsSectionD->user_id = Auth::id();
        $apcsSectionD->applicant_id = $request->applicant_id;
        // $apcsSectionD->name = $request->name;
//
//        $apcsappd = ApcsAppd::find($id);
//        $apcsappd->projectStart = $request->projectStart;
//        $apcsappd->projectComplete = $request->projectComplete;
//        $apcsappd->numdays = $request->numdays;
//        $apcsappd->numMonths = $request->numMonths;
//        $apcsappd->proposaltitle = $request->proposaltitle;
//        $apcsappd->clientname = $request->clientname;
//        $apcsappd->clientaddress = $request->clientaddress;
//        $apcsappd->user_id = Auth::id();
//        $apcsappd->applicant_id = $request->applicant_id;
        // $apcsappd->name = $request->name;

        if ($request->hasFile('supportdoc')){
            $apcsSectionD->supportdoc = $request->input('supportdoc');
            //$apcsappd->supportdoc = $request->input('supportdoc');
            $file = $request->file('supportdoc');
            $file2 = $file->getClientOriginalName();
            $filename = $file2;
             //save image as .png @ etc
            $apcsSectionD->supportdoc = $filename; //save file to which column
            // $apcsappd->supportdoc = $filename;
            $request->file('supportdoc')->move(base_path().'/public/uploads/',$filename);
        }


        //$apcsappd->save();

        $apcsSectionD->save();

        Session::flash('success', 'The post sucessfull');

        //redirect to another page

        return redirect()->route('apcsSectionD.show', $apcsSectionD->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $apcsSectionD = apcsSectionD::find($id);
        $apcsappd = ApcsAppd::find($id);
        $apcsappd->delete();
        $apcsSectionD->delete();
        Session::flash('success', 'The announcement was successfully deleted!');        
        return redirect()->route('apcsSectionD.show', $apcsSectionD->id);
    }
     public function gap()
    {
        $date=apcsSectionD::where('user_id',Auth::id())->orderBy('projectStart', 'ASC')->get();
           $num=0;
        for( $i = 0; $i<count($date)-1; $i++ ) {
           if($date[$i]->projectComplete<$date[$i+1]->projectStart)
            {
                $firstProject = $date[$i]->projectComplete;
                $lastsProject = $date[$i+1]->projectStart;
                $tsx = strtotime($firstProject);
                $tsy = strtotime($lastsProject);
                $num=$num +((date('Y', $tsy) - date('Y', $tsx)) * 12) + (date('m', $tsy) - date('m', $tsx));
            }

         }
         return $num;
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\eiaSectionD;
use App\EiaAppd;
use Session;
use Auth;
use DB;
use App\Eia_Envmanexp;
use App\Eia_SecDPosition;
use Storage;
class eiaSectionDController extends Controller
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
        $manexp = Eia_Envmanexp::all();
        $position = Eia_SecDPosition::all();
        // $eiaSectionD = eiaSectionD::where('user_id',Auth::id())->get();
           if(eiaSectionD::where('user_id', '=',Auth::id())->exists()){
             $eiaSectionD = eiaSectionD::where('user_id',Auth::id())->get();
        //from session
        
        //$apcsSectionD2 = DB::table('apcs_section_ds')->where('user_id',Auth::id())->sum('numMonths');
          $firtProject = eiaSectionD::where('user_id',Auth::id())->min('dateStart');
          $lastProject = eiaSectionD::where('user_id',Auth::id())->max('dateEnd');
          
          $ts1 = strtotime($firtProject);
          $ts2 = strtotime($lastProject);

          $eiaSectionD2 = ((date('Y', $ts2) - date('Y', $ts1)) * 12) + (date('m', $ts2) - date('m', $ts1));
  
                return view('eiaSectionD.show',  compact('eiaSectionD','eiaSectionD2','position','manexp'));
            }
        return view('eiaSectionD.create', compact('manexp','position'));
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
            'participate' => 'required', 
            'project_name' => 'required', 
            'position' => 'required', 
            'responsibilities' => 'required', 
            'dateStart' => 'required|before:dateEnd', 
            'dateEnd' => 'required|before:tomorrow',
            'ref_name' => 'required', 
            'ref_address' => 'required', 
            'ref_email' => 'required',
            'ref_position' => 'required',
            'supportdoc' => 'required'
            
            ));

        $eiaSectionD = new eiaSectionD;
        $eiaappd = new EiaAppd;

        $eiaSectionD->participate = $request->participate;
        $eiaSectionD->project_name = $request->project_name;
        $eiaSectionD->position = $request->position;
        $eiaSectionD->responsibilities = $request->responsibilities;
        $eiaSectionD->dateStart = $request->dateStart;
        $eiaSectionD->dateEnd = $request->dateEnd;
        $eiaSectionD->numdays = $request->numdays;
        $eiaSectionD->numMonths = $request->numMonths;
        $eiaSectionD->ref_name = $request->ref_name;
        $eiaSectionD->ref_address = $request->ref_address;
        $eiaSectionD->ref_email = $request->ref_email;
        $eiaSectionD->user_id = Auth::id();
        $eiaSectionD->applicant_id = $request->applicant_id;
        $eiaSectionD->ref_position = $request->ref_position;

        $eiaappd->participate = $request->participate;
        $eiaappd->project_name = $request->project_name;
        $eiaappd->position = $request->position;
        $eiaappd->responsibilities = $request->responsibilities;
        $eiaappd->dateStart = $request->dateStart;
        $eiaappd->dateEnd = $request->dateEnd;
        $eiaappd->numdays = $request->numdays;
        $eiaappd->numMonths = $request->numMonths;
        $eiaappd->ref_name = $request->ref_name;
        $eiaappd->ref_address = $request->ref_address;
        $eiaappd->ref_email = $request->ref_email;
        $eiaappd->user_id = Auth::id();
        $eiaappd->applicant_id = $request->applicant_id;
        $eiaappd->ref_position = $request->ref_position;

 //save file
    

 if ($request->hasFile('supportdoc')){
            $eiaSectionD->supportdoc = $request->input('supportdoc');
            // $eiaappb->supportdoc = $request->input('supportdoc');
            $file = $request->file('supportdoc');
            $file2 = $file->getClientOriginalName();
            $filename = $file2; //save image as .png @ etc
            $eiaSectionD->supportdoc = $filename; //save file to which column
             // $eiaappb->supportdoc = $filename;
            $request->file('supportdoc')->move(base_path().'/public/uploads/',$filename);
        }

        $eiaSectionD->save();
        $eiaappd->save();

        Session::flash('success', 'The data has been saved.');

        //redirect to another page

        return redirect()->route('eiaSectionD.show', $eiaSectionD->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function show($id)
    {
            $manexp = Eia_Envmanexp::all();
        $position = Eia_SecDPosition::all();
          $eiaSectionD = eiaSectionD::where('user_id',Auth::id())->get();
        //from session
        
        //$apcsSectionD2 = DB::table('apcs_section_ds')->where('user_id',Auth::id())->sum('numMonths');
          $firtProject = eiaSectionD::where('user_id',Auth::id())->min('dateStart');
          $lastProject = eiaSectionD::where('user_id',Auth::id())->max('dateEnd');
          
          $ts1 = strtotime($firtProject);
          $ts2 = strtotime($lastProject);

          $eiaSectionD2 = ((date('Y', $ts2) - date('Y', $ts1)) * 12) + (date('m', $ts2) - date('m', $ts1));
          
        return view('eiaSectionD.show', compact('eiaSectionD','eiaSectionD2','position','manexp'));
        
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
        $eiaSectionD = eiaSectionD::find($id);
 $manexp = Eia_Envmanexp::all();
        $position = Eia_SecDPosition::all();
        //return the view and pass in the var we previously created
        return view('eiaSectionD.edit', compact('eiaSectionD','position','manexp'));
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
            'participate' => 'required', 
            'project_name' => 'required', 
            'position' => 'required', 
            'responsibilities' => 'required', 
            'dateStart' => 'required|before:dateEnd', 
            'dateEnd' => 'required|before:tomorrow',
            'ref_name' => 'required', 
            'ref_address' => 'required', 
            'ref_email' => 'required'));

        $eiaSectionD = eiaSectionD::find($id);
        $eiaSectionD->participate = $request->participate;
        $eiaSectionD->project_name = $request->project_name;
        $eiaSectionD->position = $request->position;
        $eiaSectionD->responsibilities = $request->responsibilities;
        $eiaSectionD->dateStart = $request->dateStart;
        $eiaSectionD->dateEnd = $request->dateEnd;
        $eiaSectionD->numdays = $request->numdays;
        $eiaSectionD->numMonths = $request->numMonths;
        $eiaSectionD->ref_name = $request->ref_name;
        $eiaSectionD->ref_address = $request->ref_address;
        $eiaSectionD->ref_email = $request->ref_email;

        $eiaappd = EiaAppd::find($id);
        if(!empty($eiaapd)){
        $eiaappd->participate = $request->participate;
        $eiaappd->project_name = $request->project_name;
        $eiaappd->position = $request->position;
        $eiaappd->responsibilities = $request->responsibilities;
        $eiaappd->dateStart = $request->dateStart;
        $eiaappd->dateEnd = $request->dateEnd;
        $eiaappd->numdays = $request->numdays;
        $eiaappd->numMonths = $request->numMonths;
        $eiaappd->ref_name = $request->ref_name;
        $eiaappd->ref_address = $request->ref_address;
        $eiaappd->ref_email = $request->ref_email;
        $eiaappd->save();
}
          if ($request->hasFile('supportdoc')){
            $eiaSectionD->supportdoc = $request->input('supportdoc');
            // $ietsappc->supportdoc = $request->input('supportdoc');
            $file = $request->file('supportdoc');
             $file2 = $file->getClientOriginalName();
            $filename = $file2; //save image as .png @ etc
            $eiaSectionD->supportdoc = $filename; //save file to which column
             // $ietsappc->supportdoc = $filename;
            $request->file('supportdoc')->move(base_path().'/public/uploads/',$filename);
            $oldFilename=$eiaSectionD->supportdoc;
            Storage::delete($oldFilename);

        }

        $eiaSectionD->save();

        Session::flash('success', 'The post sucessfull');

        //redirect to another page

        return redirect()->route('eiaSectionD.show', $eiaSectionD->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id=Auth::user()->id;
        $eiaSectionD = eiaSectionD::where('user_id','=',$id)->first();
        $eiaappd = EiaAppd::where('user_id','=',$id)->first();
        $eiaappd->delete();
        $eiaSectionD->delete();
        Session::flash('success', 'The announcement was successfully deleted!');        
        return redirect()->route('eiaSectionD.show', $eiaSectionD->id);
    }
}

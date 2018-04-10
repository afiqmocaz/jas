<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\eiaSectionC;
use App\EiaAppc;
use Validator;
use Response;
use Redirect;
use Session;
use App\Uploads;
use DB;
use Auth;
use App\CompetencyCourse;
class eiaSectionCController extends Controller
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
        $course = CompetencyCourse::all();
        $eiaSectionC = eiaSectionC::where('user_id',Auth::id())->get();
        
            if(eiaSectionC::where('user_id', '=',Auth::id())->exists()){
                return view('eiaSectionC.show', compact('eiaSectionC','course'));
            }

        return view('eiaSectionC.create',compact('course'));
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
                    'course' => 'required', 
                    'date_complete' => 'required|before:tomorrow', 
                    'cert_no' => 'required'));

        $eiaSectionC = new eiaSectionC;

        $eiaappc = new EiaAppc;

        $eiaSectionC->course = $request->course;
        $eiaSectionC->date_complete = $request->date_complete;
        $eiaSectionC->cert_no = $request->cert_no;
        $eiaSectionC->user_id = Auth::id();
        $eiaSectionC->applicant_id = $request->applicant_id;

        $eiaappc->course = $request->course;
        $eiaappc->date_complete = $request->date_complete;
        $eiaappc->cert_no = $request->cert_no;
        $eiaappc->user_id = Auth::id();
        $eiaappc->applicant_id = $request->applicant_id;
    

        $eiaSectionC->save();

        $eiaappc->save();

        Session::flash('success', 'The post sucessfull');

        //redirect to another page

        return redirect()->route('eiaSectionC.show', $eiaSectionC->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $course = CompetencyCourse::all();
         $eiaSectionC = eiaSectionC::where('user_id',Auth::id())->get();
        //from session
        return view('eiaSectionC.show', compact('eiaSectionC','course'));    
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
        $eiaSectionC = eiaSectionC::find($id);
        $course = CompetencyCourse::all();

        //return the view and pass in the var we previously created
        return view('eiaSectionC.edit', compact('eiaSectionC','course'));
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
        $this->validate($request, array('course' => 'required',
         'date_complete' => 'required|before:tomorrow',
            'cert_no' => 'required'));

        $id = Auth::user()->id;
        
        $eiaSectionC = eiaSectionC::find($id);
        $eiaSectionC->course = $request->course;
        $eiaSectionC->date_complete = $request->date_complete;
        $eiaSectionC->cert_no = $request->cert_no;

       $eiaappc = EiaAppc::find($id);
        $eiaappc->course = $request->course;
        $eiaappc->date_complete = $request->date_complete;
        $eiaappc->cert_no = $request->cert_no;

       

        $eiaappc->save();

        $eiaSectionC->save();

        Session::flash('success', 'The data has been updated.');

        //redirect to another page

        return redirect()->route('eiaSectionC.show', $eiaSectionC->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $eiaSectionC = eiaSectionC::find($id);
        $eiaappc = EiaAppc::find($id);
        $eiaappc->delete();
        $eiaSectionC->delete();
        Session::flash('success', 'The data was successfully deleted!');        
        return redirect()->route('eiaSectionC.show', $eiaSectionC->id);
    }
}

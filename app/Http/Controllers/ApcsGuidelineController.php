<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Apcs_Guideline;
use Session;
use storage;
use Validator;
use Response;
use Redirect;
use App\Uploads;
use Image;
use DB;
use App\Http\Controllers\MasterLayoutController;
use Illuminate\Support\Facades\Input;

class ApcsGuidelineController extends Controller
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
        //

         $master = (new MasterLayoutController())->getSec('apcs');
        return view('apcsguideline.create',  compact('master'));
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

       $this->validate($request, array(

            'subject' => 'required|max:255',
           // 'announcement' => 'required'

            ));

        //store in the database
        $apcsguideline = new Apcs_Guideline;

        $apcsguideline->subject = $request->subject;
        //$eiaannounce->announcement = $request->announcement;
        
        if ($request->hasFile('fileupload')){
            $file = $request->file('fileupload');
            $file2 = $file->getClientOriginalName();
            $filename = $file2; //save image as .png @ etc
            $request->file('fileupload')->move(base_path() . '/public/guideline/',$filename); //path file to save

            $apcsguideline->original_filename = $filename; //save file to which column
    
        }

        $apcsguideline -> save();

        Session::flash('success', 'The announcement was successfully saved!');

       
       return redirect() -> route(('apcsguideline.show'),$apcsguideline->id);
        //return view('eiaguideline.create',  compact('master'));
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
         $master = (new MasterLayoutController())->getSec('apcs');
        $apcsguideline = Apcs_Guideline::all();
        return view('apcsguideline.show', compact('apcsguideline','master'));
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

        $master = (new MasterLayoutController())->getSec('apcs');
      
        // find the post in the database and save as a var
        $apcsguideline = Apcs_Guideline::find($id);
        //return the view and pass in the var we previously created
        return view('apcsguideline.edit',compact('master'))->withapcsguideline($apcsguideline);
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
         $this->validate($request, array(

            'subject' => 'required|max:255',
            //'announcement' => 'required'

            ));

        //store in the database
        $apcsguideline = Apcs_Guideline::find($id);

        $apcsguideline->subject = $request->input('subject');
        
        
        if ($request->hasFile('fileupload')){
            $file = $request->file('fileupload');
            $file2 = $file->getClientOriginalName();
            $filename = $file2; //save image as .png @ etc
            $request->file('fileupload')->move(base_path() . '/public/guideline/',$filename); //path file to save

            $apcsguideline->original_filename = $filename; //save file to which column
    
        }
        
        $apcsguideline -> save();

        Session::flash('success', 'The announcement was successfully updated!');

         return redirect() -> route(('apcsguideline.show'),$apcsguideline->id);
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
	  $apcsguideline = Apcs_Guideline::find($id);

        $apcsguideline->delete();

        Session::flash('success', 'The announcement was successfully deleted!');
        
       return redirect() -> route(('apcsguideline.show'),$apcsguideline->id);
    }

   
}

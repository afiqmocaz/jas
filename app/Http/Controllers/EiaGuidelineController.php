<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Eia_Guideline;
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
class EiaGuidelineController extends Controller
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

         $master = (new MasterLayoutController())->getSec('eia');
        return view('eiaguideline.create',  compact('master'));
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
        $eiaguideline = new Eia_Guideline;

        $eiaguideline->subject = $request->subject;
        //$eiaannounce->announcement = $request->announcement;
        
        if ($request->hasFile('fileupload')){
            $file = $request->file('fileupload');
            $file2 = $file->getClientOriginalName();
            $filename = $file2; //save image as .png @ etc
            $request->file('fileupload')->move(base_path() . '/public/guideline/',$filename); //path file to save

            $eiaguideline->original_filename = $filename; //save file to which column
    
        }

        $eiaguideline -> save();

        Session::flash('success', 'The announcement was successfully saved!');

       
       return redirect() -> route(('eiaguideline.show'),$eiaguideline->id);
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
         $master = (new MasterLayoutController())->getSec('eia');
        $eiaguideline = Eia_Guideline::all();
        return view('eiaguideline.show', compact('eiaguideline','master'));
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

        $master = (new MasterLayoutController())->getSec('eia');
      
        // find the post in the database and save as a var
        $eiaguideline = Eia_Guideline::find($id);
        //return the view and pass in the var we previously created
        return view('eiaguideline.edit',compact('master'))->witheiaguideline($eiaguideline);
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
        $eiaguideline = Eia_Guideline::find($id);

        $eiaguideline->subject = $request->input('subject');
        
        
        if ($request->hasFile('fileupload')){
            $file = $request->file('fileupload');
            $file2 = $file->getClientOriginalName();
            $filename = $file2; //save image as .png @ etc
            $request->file('fileupload')->move(base_path() . '/public/guideline/',$filename); //path file to save

            $eiaguideline->original_filename = $filename; //save file to which column
    
        }
        
        $eiaguideline -> save();

        Session::flash('success', 'The announcement was successfully updated!');

         return redirect() -> route(('eiaguideline.show'),$eiaguideline->id);
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
	  $eiaguideline = Eia_Guideline::find($id);

        $eiaguideline->delete();

        Session::flash('success', 'The announcement was successfully deleted!');
        
       return redirect() -> route(('eiaguideline.show'),$eiaguideline->id);
    }

   
}

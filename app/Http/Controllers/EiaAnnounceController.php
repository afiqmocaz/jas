<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\EiaAnnounce;
use Session;
use storage;
use Validator;
use Response;
use Redirect;
use App\Uploads;
use Image;
use DB;
use App\Http\Controllers\MasterLayoutController;

class EiaAnnounceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $eiaannounce = EiaAnnounce::all();
        return view('eiaannounce.show', compact('eiaannounce'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $master = (new MasterLayoutController())->getSec('eia');
        return view('eiaannounce.create',  compact('master'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate the data
        $this->validate($request, array(

            'subject' => 'required|max:255',
            'announcement' => 'required'

            ));

        //store in the database
        $eiaannounce = new EiaAnnounce;

        $eiaannounce->subject = $request->subject;
        $eiaannounce->announcement = $request->announcement;
        
        if ($request->hasFile('fileToUpload')){
            $eiaannounce->fileToUpload = $request->fileToUpload;
            $file = $request->file('fileToUpload');
            $filename = time() . '.' . $file->getClientOriginalExtension(); //save image as .png @ etc
            $eiaannounce->fileToUpload = $filename; //save file to which column
            $request->file('fileToUpload')->move(base_path().'/public/images/',$filename);
        }

        $eiaannounce -> save();

        Session::flash('success', 'The announcement was successfully saved!');

        return redirect() -> route(('eiaannounce.show'),$eiaannounce->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $master = (new MasterLayoutController())->getSec('eia');
        $eiaannounce = EiaAnnounce::all();
        return view('eiaannounce.show', compact('eiaannounce','master'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $master = (new MasterLayoutController())->getSec('eia');
      
        // find the post in the database and save as a var
        $eiaannounce = EiaAnnounce::find($id);
        //return the view and pass in the var we previously created
        return view('eiaannounce.edit',compact('master'))->witheiaannounce($eiaannounce);
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
        //validate the data
        $this->validate($request, array(

            'subject' => 'required|max:255',
            'announcement' => 'required'

            ));

        //store in the database
        $eiaannounce = EiaAnnounce::find($id);

        $eiaannounce->subject = $request->input('subject');
        $eiaannounce->announcement = $request->input('announcement');
        
        if ($request->hasFile('original_filename')){
            $eiaannounce->original_filename = $request->input('original_filename');
            $file = $request->file('original_filename');
            $filename = time() . '.' . $file->getClientOriginalExtension(); //save image as .png @ etc
            $eiaannounce->original_filename = $filename; //save file to which column
            $request->file('original_filename')->move(base_path().'/public/uploads/',$filename);
        }

        $eiaannounce -> save();

        Session::flash('success', 'The announcement was successfully updated!');

        return redirect() -> route(('eiaannounce.show'),$eiaannounce->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $eiaannounce = EiaAnnounce::find($id);

        $eiaannounce->delete();

        Session::flash('success', 'The announcement was successfully deleted!');
        return redirect() -> route(('eiaannounce.show'),$eiaannounce->id);
    }

    public function multiple_upload(Request $request) {
      // getting all of the post data
      $files = Input::file('fileToUpload');
      // Making counting of uploaded images
      $file_count = count($files);
      // start count how many uploaded
      $uploadcount = 0;
      if (is_array($files) || is_object($files))
        {
      foreach ($files as $file) {
        $rules = array('file' => 'mimes:pdf|max:10240'); //'required|mimes:pdf'
        $validator = Validator::make(array('file'=> $file), $rules);
        if($validator->passes()){
          $destinationPath = 'uploads'; // upload folder in public directory
          $filename = $file->getClientOriginalName();
          $upload_success = $file->move($destinationPath, $filename);
          $uploadcount ++;

          // save into database
          $extension = $file->getClientOriginalExtension();
          $entry = new EiaAnnounce();
          $entry->subject = $request->subject;
          $entry->announcement = $request->announcement;
          $entry->mime = $file->getClientMimeType();
          $entry->original_filename = $filename;
          $entry->filename = $file->getFilename().'.'.$extension;
          $entry->save();
        }
      }
  }

        elseif (is_array($files) || is_object($files) == null)
        {

            $eiaannounce = new EiaAnnounce;

        $eiaannounce->subject = $request->subject;
        $eiaannounce->announcement = $request->announcement;

        $eiaannounce -> save();

        Session::flash('success', 'The announcement has been successfully added!');

        return redirect() -> route(('eiaannounce.show'),$eiaannounce->id);
        }

      if($uploadcount == $file_count){
        Session::flash('successfully', 'The announcement has been successfully added!');
        return Redirect::to('eiaannounce/show');
      } else {
        return Redirect::to('eiaannounce/show')->withInput()->withErrors($validator);
      }
    }
}

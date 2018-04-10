<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\IetsAnnounce;
use Session;
use storage;
use Validator;
use Response;
use Redirect;
use App\Uploads;
use Image;
use DB;
use App\Http\Controllers\MasterLayoutController;

class IetsAnnounceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ietsannounce = IetsAnnounce::all();
        return view('ietsannounce.show', compact('ietsannounce'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $master = (new MasterLayoutController())->getSec('iets');
        return view('ietsannounce.create',compact('master'));
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
        $ietsannounce = new IetsAnnounce;

        $ietsannounce->subject = $request->subject;
        $ietsannounce->announcement = $request->announcement;

         if ($request->hasFile('fileToUpload')){
            $ietsannounce->fileToUpload = $request->fileToUpload;
            $file = $request->file('fileToUpload');
            $filename = time() . '.' . $file->getClientOriginalExtension(); //save image as .png @ etc
            $ietsannounce->fileToUpload = $filename; //save file to which column
            $request->file('fileToUpload')->move(base_path().'/public/images/',$filename);
        }

        $ietsannounce -> save();

        Session::flash('success', 'The announcement was successfully saved!');

        return redirect() -> route(('ietsannounce.show'),$ietsannounce->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $master = (new MasterLayoutController())->getSec('iets');
        
        $ietsannounce = IetsAnnounce::all();
        return view('ietsannounce.show', compact('ietsannounce','master'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $master = (new MasterLayoutController())->getSec('iets');
        // find the post in the database and save as a var
        $ietsannounce = IetsAnnounce::find($id);
        //return the view and pass in the var we previously created
        return view('ietsannounce.edit', compact('master'))->withietsannounce($ietsannounce);
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
         $ietsannounce =  IetsAnnounce::find($id);

        $ietsannounce->subject = $request->input('subject');
        $ietsannounce->announcement = $request->input('announcement');
        
        
         if ($request->hasFile('original_filename')){
            $ietsannounce->original_filename = $request->input('original_filename');
            $file = $request->file('original_filename');
            $filename = time() . '.' . $file->getClientOriginalExtension(); //save image as .png @ etc
            $ietsannounce->original_filename = $filename; //save file to which column
            $request->file('original_filename')->move(base_path().'/public/uploads/',$filename);
        }

        $ietsannounce -> save();

        Session::flash('success', 'The announcement was successfully updated!');

        return redirect() -> route(('ietsannounce.show'),$ietsannounce->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ietsannounce = IetsAnnounce::find($id);

        $ietsannounce->delete();

        Session::flash('success', 'The announcement was successfully deleted!');
        
        return redirect()->route(('ietsannounce.show'),$ietsannounce->id);
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
        $rules = array('file' => 'mimes:pdf,doc,docx,txt|max:10240'); //'required|mimes:pdf'
        $validator = Validator::make(array('file'=> $file), $rules);
        if($validator->passes()){
          $destinationPath = 'uploads'; // upload folder in public directory
          $filename = $file->getClientOriginalName();
          $upload_success = $file->move($destinationPath, $filename);
          $uploadcount ++;

          // save into database
          $extension = $file->getClientOriginalExtension();
          $entry = new IetsAnnounce();
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

            $ietsannounce = new IetsAnnounce;

        $ietsannounce->subject = $request->subject;
        $ietsannounce->announcement = $request->announcement;

        $ietsannounce -> save();

        Session::flash('success', 'The announcement has been successfully added!');

        return redirect() -> route(('ietsannounce.show'),$ietsannounce->id);
        }

      if($uploadcount == $file_count){
        Session::flash('success', 'The announcement has been successfully added!');
        return Redirect::to('ietsannounce/show');
      } else {
          Session::flash('success', 'The file upload is neither pdf, .doc, .docx nor .txt file');
        return Redirect::to('ietsannounce/show')->withInput()->withErrors($validator);
      }
    }
}

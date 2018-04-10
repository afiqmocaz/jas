<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Announce;
use Session;
use storage;
use Validator;
use Response;
use Redirect;
use App\Uploads;
use Image;
use DB;
use App\Http\Controllers\MasterLayoutController;
class AnnounceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $announce = Announce::all();
        return view('announce.show', compact('announce'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $master = (new MasterLayoutController())->getSec('apcs');
        return view('announce.create',  compact('master'));
    }

    // public function upload(Request $request)
    // {
    //     $files = $request->file('file');

    //     if(!empty($files)):

    //         foreach ($files as $file): 
    //             storage::put($file->getClientOriginalName(), file_get_contents($file));
    //         endforeach;

    //         endif;

    //         return \Response::json(array('success' => true));
    // }

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
        $announce = new Announce;

        $announce->subject = $request->subject;
        $announce->announcement = $request->announcement;

         if ($request->hasFile('fileToUpload')){
            $announce->fileToUpload = $request->fileToUpload;
            $file = $request->file('fileToUpload');
            $filename = time() . '.' . $file->getClientOriginalExtension(); //save image as .png @ etc
            $announce->fileToUpload = $filename; //save file to which column
            $request->file('fileToUpload')->move(base_path().'/public/images/',$filename);
        }

        $announce -> save();

        Session::flash('success', 'The announcement was successfully saved!');

        return redirect() -> route(('announce.show'),$announce->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $master = (new MasterLayoutController())->getSec('apcs');
        $announce = Announce::all();
        return view('announce.show', compact('announce','master'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $master = (new MasterLayoutController())->getSec('apcs');
        $announce = Announce::find($id);
        //return the view and pass in the var we previously created
        return view('announce.edit',compact('master'))->withannounce($announce);
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
         $announce =  Announce::find($id);

        $announce->subject = $request->input('subject');
        $announce->announcement = $request->input('announcement');
        
        
         if ($request->hasFile('original_filename')){
            $announce->original_filename = $request->input('original_filename');
            $file = $request->file('original_filename');
            $filename = time() . '.' . $file->getClientOriginalExtension(); //save image as .png @ etc
            $announce->original_filename = $filename; //save file to which column
            $request->file('original_filename')->move(base_path().'/public/uploads/',$filename);
        }

        $announce -> save();

        Session::flash('success', 'The announcement was successfully updated!');

        return redirect() -> route(('announce.show'),$announce->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $announce = Announce::find($id);

        $announce->delete();

        Session::flash('success', 'The announcement was successfully deleted!');
        
        return Redirect::back();
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
          $entry = new Announce();
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

            $announce = new Announce;

        $announce->subject = $request->subject;
        $announce->announcement = $request->announcement;

        $announce -> save();

        Session::flash('success', 'The announcement has been successfully added!');

        return redirect() -> route(('announce.show'),$announce->id);
        }

      if($uploadcount == $file_count){
        Session::flash('success', 'The announcement has been successfully added!');
        return Redirect::to('announce/show');
      } else {
          Session::flash('success', 'The file upload is neither pdf, .doc, .docx nor .txt file');
        return Redirect::to('announce/show')->withInput()->withErrors($validator);
      }
    }
}

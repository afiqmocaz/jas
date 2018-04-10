<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Refference;
use Session;
use storage;
use Validator;
use Response;
use Redirect;
use App\Uploads;
use Image;
use DB;
use App\Http\Controllers\MasterLayoutController;

class RefferenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $master = (new MasterLayoutController)->getSec('apcs');
        
        $refference = Refference::all();
        return view('refference.show', compact('refference','master'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $master = (new MasterLayoutController)->getSec('apcs');
        return view('refference.create',compact('master'));
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

            'title' => 'required|max:255',
            'original_filename' => 'required'

            ));

        //store in the database
        $refference = new Refference;

        $refference->title = $request->title;
        
        if ($request->hasFile('original_filename')){
            $refference->original_filename = $request->original_filename;
            $file = $request->file('original_filename');
            $filename = time() . '.' . $file->getClientOriginalExtension(); //save image as .png @ etc
            $refference->original_filename = $filename; //save file to which column
            $request->file('original_filename')->move(base_path().'/public/uploads/',$filename);
        }

        $refference -> save();

        Session::flash('success', 'The refference has been added!');

        return redirect() -> route(('refference.show'),$refference->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
         $master = (new MasterLayoutController)->getSec('apcs');
         $refference = Refference::all();
        return view('refference.show', compact('refference','master'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $master = (new MasterLayoutController)->getSec('apcs');
        // find the post in the database and save as a var
        $refference = Refference::find($id);
        //return the view and pass in the var we previously created
        return view('refference.edit',compact('master'))->withrefference($refference);
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

            'title' => 'required|max:255',
            'original_filename' => 'required'

            ));

        //store in the database
        $refference = Refference::find($id);

        $refference->title = $request->input('title');
        
        if ($request->hasFile('original_filename')){
            $refference->original_filename = $request->input('original_filename');
            $file = $request->file('original_filename');
            $filename = time() . '.' . $file->getClientOriginalExtension(); //save image as .png @ etc
            $refference->original_filename = $filename; //save file to which column
            $request->file('original_filename')->move(base_path().'/public/uploads/',$filename);
        }

        $refference -> save();

        Session::flash('success', 'The refference has been updated!');

        return redirect() -> route(('refference.show'),$refference->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $refference = Refference::find($id);

        $refference->delete();

        Session::flash('success', 'The refference has been deleted!');
        return redirect()->route('refference.index');
    }

    public function multiple_upload(Request $request) {
      // getting all of the post data
      $files = Input::file('fileToUpload');
      // Making counting of uploaded images
      $file_count = count($files);
      // start count how many uploaded
      $uploadcount = 0;

      foreach ($files as $file) {
        $rules = array('file' => 'required|mimes:pdf|max:10240'); //'required|mimes:pdf'
        $validator = Validator::make(array('file'=> $file), $rules);
        if($validator->passes()){
          $destinationPath = 'uploads'; // upload folder in public directory
          $filename = $file->getClientOriginalName();
          $upload_success = $file->move($destinationPath, $filename);
          $uploadcount ++;

          // save into database
          $extension = $file->getClientOriginalExtension();
          $entry = new Refference();
          $entry->title = $request->title;
          $entry->mime = $file->getClientMimeType();
          $entry->original_filename = $filename;
          $entry->filename = $file->getFilename().'.'.$extension;
          $entry->save();
        }
      }
      if($uploadcount == $file_count){
        Session::flash('success', 'The refference has been successfully added!');
        return Redirect::to('refference/show');
      } else {
         Session::flash('Unsuccessful', 'The file upload is not pdf file or the size is too big. Please try again.');
        return Redirect::to('refference/show')->withInput()->withErrors($validator);
      }
    }
}

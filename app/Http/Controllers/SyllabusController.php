<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Syllabus;
use Session;
use storage;
use Validator;
use Response;
use Redirect;
use App\Uploads;
use Image;
use DB;
use App\Http\Controllers\MasterLayoutController;

class SyllabusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $master = (new MasterLayoutController)->getSec('apcs');
        
        $syllabi = Syllabus::all();
        return view('syllabus.show', compact('syllabi','master'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('syllabus.create');
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
            'fileToUpload' => 'required'

            ));

        //store in the database
        $syllabi = new Syllabus;

        $syllabi->title = $request->title;
        
        if ($request->hasFile('fileToUpload')){
            $syllabi->fileToUpload = $request->fileToUpload;
            $file = $request->file('fileToUpload');
            $filename = time() . '.' . $file->getClientOriginalExtension(); //save image as .png @ etc
            $syllabi->fileToUpload = $filename; //save file to which column
            $request->file('fileToUpload')->move(base_path().'/public/images/',$filename);
        }

        $syllabi -> save();

        Session::flash('success', 'The syllabus has been added!');

        return redirect() -> route(('syllabus.show'),$syllabi->id);
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
        
        $syllabi = Syllabus::all();
        return view('syllabus.show', compact('syllabi','master'));
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
        $syllabi = Syllabus::find($id);
        //return the view and pass in the var we previously created
        return view('syllabus.edit', compact('master'))->withsyllabus($syllabi);
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
        $syllabi = Syllabus::find($id);

        $syllabi->title = $request->input('title');
        
        if ($request->hasFile('original_filename')){
            $syllabi->original_filename = $request->input('original_filename');
            $file = $request->file('original_filename');
            $filename = time() . '.' . $file->getClientOriginalExtension(); //save image as .png @ etc
            $syllabi->original_filename = $filename; //save file to which column
            $request->file('original_filename')->move(base_path().'/public/uploads/',$filename);
        }

        $syllabi -> save();

        Session::flash('success', 'The syllabus has been updated!');

        return redirect() -> route(('syllabus.show'),$syllabi->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $syllabi = Syllabus::find($id);

        $syllabi->delete();

        Session::flash('success', 'The syllabus has been deleted!');
        return redirect() -> route(('syllabus.show'),$syllabi->id);
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
          $entry = new Syllabus();
          $entry->title = $request->title;
          $entry->mime = $file->getClientMimeType();
          $entry->original_filename = $filename;
          $entry->filename = $file->getFilename().'.'.$extension;
          $entry->save();
        }
      }
      if($uploadcount == $file_count){
        Session::flash('success', 'The syllabus has been successfully added!');
        return Redirect::to('syllabus/show');
      } else {
          Session::flash('Unsuccessful', 'The file upload is not pdf file or the size is too big. Please try again.');
        return Redirect::to('syllabus/show')->withInput()->withErrors($validator);
      }
    }
}

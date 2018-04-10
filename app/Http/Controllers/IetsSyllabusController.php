<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\IetsSyllabus;
use Session;
use storage;
use Validator;
use Response;
use Redirect;
use App\Uploads;
use Image;
use DB;
use App\Http\Controllers\MasterLayoutController;

class IetsSyllabusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $master = (new MasterLayoutController)->getSec('iets');
        $ietssyllabus = IetsSyllabus::all();
        return view('ietssyllabus.show', compact('ietssyllabus','master'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ietssyllabus.create');
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
        $ietssyllabus = new IetsSyllabus;

        $ietssyllabus->title = $request->title;
        
        if ($request->hasFile('fileToUpload')){
            $ietssyllabus->fileToUpload = $request->fileToUpload;
            $file = $request->file('fileToUpload');
            $filename = time() . '.' . $file->getClientOriginalExtension(); //save image as .png @ etc
            $ietssyllabus->fileToUpload = $filename; //save file to which column
            $request->file('fileToUpload')->move(base_path().'/public/images/',$filename);
        }

        $ietssyllabus -> save();

        Session::flash('success', 'The syllabus has been added!');

        return redirect() -> route(('ietssyllabus.show'),$ietssyllabus->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $master = (new MasterLayoutController)->getSec('iets');
        
        $ietssyllabus = IetsSyllabus::all();
        return view('ietssyllabus.show', compact('ietssyllabus','master'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
	 $master = (new MasterLayoutController)->getSec('iets');

        // find the post in the database and save as a var
        $ietssyllabus = IetsSyllabus::find($id);
        //return the view and pass in the var we previously created
        return view('ietssyllabus.edit',compact('master'))->withietssyllabus($ietssyllabus);
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
        $ietssyllabus = IetsSyllabus::find($id);

        $ietssyllabus->title = $request->input('title');
        
        if ($request->hasFile('original_filename')){
            $ietssyllabus->original_filename = $request->input('original_filename');
            $file = $request->file('original_filename');
            $filename = time() . '.' . $file->getClientOriginalExtension(); //save image as .png @ etc
            $ietssyllabus->original_filename = $filename; //save file to which column
            $request->file('original_filename')->move(base_path().'/public/uploads/',$filename);
        }

        $ietssyllabus -> save();

        Session::flash('success', 'The ietssyllabus has been updated!');

        return redirect() -> route(('ietssyllabus.show'),$ietssyllabus->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ietssyllabus = IetsSyllabus::find($id);

        $ietssyllabus->delete();

        Session::flash('success', 'The syllabus has been deleted!');
        return redirect()->route('ietssyllabus.index');
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
          $entry = new IetsSyllabus();
          $entry->title = $request->title;
          $entry->mime = $file->getClientMimeType();
          $entry->original_filename = $filename;
          $entry->filename = $file->getFilename().'.'.$extension;
          $entry->save();
        }
      }
      if($uploadcount == $file_count){
        Session::flash('Success', 'The syllabus has been successfully added!');
        return Redirect::to('ietssyllabus/show');
      } else {
          Session::flash('Unsuccessful', 'The file upload is not pdf file or the size is too big. Please try again.');
        return Redirect::to('ietssyllabus/show')->withInput()->withErrors($validator);
      }
    }
}

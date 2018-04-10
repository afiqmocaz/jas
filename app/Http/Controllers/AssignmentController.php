<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Assignment;
use Session;
use storage;
use Validator;
use Response;
use Redirect;
use App\Uploads;
use Image;
use DB;
use App\QuizModul;
use App\Http\Controllers\MasterLayoutController;

class AssignmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $assignment = Assignment::all();
        return view('assignment.show', compact('assignment'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('assignment.create');
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

            'fileToUpload' => 'required',
            'name' => 'required',
            'duration' => 'required'

            ));

        //store in the database
        $assignment = new Assignment;

        
        if ($request->hasFile('fileToUpload')){
            $assignment->fileToUpload = $request->fileToUpload;
            $file = $request->file('fileToUpload');
            $filename = time() . '.' . $file->getClientOriginalExtension(); //save image as .png @ etc
            $assignment->fileToUpload = $filename; //save file to which column
            $request->file('fileToUpload')->move(base_path().'/public/images/',$filename);
        }

        $assignment->name = $request->name;
        $assignment->duration = $request->duration;

        $assignment -> save();

        Session::flash('success', 'The assignment has been added!');

        return redirect() -> route(('assignment.show'),$assignment->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // azhari mustapa, azhari@nafa.my : begin
        $masterCtrl = new MasterLayoutController();
        $master = $masterCtrl->getSec('apcs');
        // azhari mustapa, azhari@nafa.my : end
        $assignment = Assignment::all();
        return view('assignment.show', compact('assignment','master'));
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
        $assignment = Assignment::find($id);
        //return the view and pass in the var we previously created
        // azhari mustapa, azhari@nafa.my, 19/01/2018 : begin
        $masterCtrl = new MasterLayoutController();
        $master = $masterCtrl->getSec('apcs');
        // azhari mustapa, azhari@nafa.my, 19/01/2018 : end
        return view('assignment.edit', compact('master'))->withassignment($assignment);
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

            'fileToUpload' => 'required',
            'name' => 'required',
            'duration' => 'required'

            ));

        //store in the database
        $assignment = Assignment::find($id);

        
        if ($request->hasFile('original_filename')){
            $assignment->original_filename = $request->input('original_filename');
            $file = $request->file('original_filename');
            $filename = time() . '.' . $file->getClientOriginalExtension(); //save image as .png @ etc
            $assignment->original_filename = $filename; //save file to which column
            $request->file('original_filename')->move(base_path().'/public/uploads/',$filename);
        }

        $assignment->name = $request->input('name');
        $assignment->duration = $request->input('duration');

        $assignment -> save();

        Session::flash('success', 'The assignment has been updated!');

        return redirect() -> route(('assignment.show'),$assignment->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $assignment = Assignment::find($id);

        $assignment->delete();

        Session::flash('success', 'The assignment has been deleted!');
        return redirect() -> route(('assignment.show'),$assignment->id);
    }

    public function multiple_upload(Request $request) {
      // getting all of the post data
      $files = Input::file('fileToUpload');
      // Making counting of uploaded images
      $file_count = count($files);
      // start count how many uploaded
      $uploadcount = 0;

      foreach ($files as $file) {
        $rules = array('file' => 'required|mimes:pdf,doc,docx,txt|max:10240'); //'required|mimes:pdf'
        $validator = Validator::make(array('file'=> $file), $rules);
        if($validator->passes()){
          $destinationPath = 'uploads'; // upload folder in public directory
          $filename = $file->getClientOriginalName();
          $upload_success = $file->move($destinationPath, $filename);
          $uploadcount ++;

          // save into database
          $extension = $file->getClientOriginalExtension();
          $entry = new Assignment();
          
          $entry->mime = $file->getClientMimeType();
          $entry->original_filename = $filename;
          $entry->filename = $file->getFilename().'.'.$extension;

          $entry->name = $request->name;
          $entry->duration = $request->duration;

          $entry->save();
        }
      }
      if($uploadcount == $file_count){
        Session::flash('success', 'The assignment has been successfully added!');
        return Redirect::to('assignment/show');
      } else {
          Session::flash('success', 'The file upload is neither pdf, .doc, .docx nor .txt file');
        return Redirect::to('assignment/show')->withInput()->withErrors($validator);
      }
    }
}

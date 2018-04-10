<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\IetsAssignment;
use Session;
use storage;
use Validator;
use Response;
use Redirect;
use App\Uploads;
use Image;
use DB;
use App\Http\Controllers\MasterLayoutController;

class IetsAssignmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ietsassignment = IetsAssignment::all();
        return view('ietsassignment.show', compact('ietsassignment'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ietsassignment.create');
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
        $ietsassignment = new IetsAssignment;
        
        if ($request->hasFile('fileToUpload')){
            $ietsassignment->fileToUpload = $request->fileToUpload;
            $file = $request->file('fileToUpload');
            $filename = time() . '.' . $file->getClientOriginalExtension(); //save image as .png @ etc
            $ietsassignment->fileToUpload = $filename; //save file to which column
            $request->file('fileToUpload')->move(base_path().'/public/images/',$filename);
        }

        $ietsassignment->name = $request->name;
        $ietsassignment->duration = $request->duration;
        

        $ietsassignment -> save();

        Session::flash('success', 'The assignment has been added!');

        return redirect() -> route(('ietsassignment.show'),$ietsassignment->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = 'iets';
        $masterCtrl = new MasterLayoutController;
        $master = $masterCtrl->getSec($category);
        $ietsassignment = IetsAssignment::all();
        return view('ietsassignment.show', compact('ietsassignment','master'));
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
        $category = 'iets';
        $masterCtrl = new MasterLayoutController;
        $master = $masterCtrl->getSec($category);
        $ietsassignment = IetsAssignment::find($id);
        //return the view and pass in the var we previously created
        return view('ietsassignment.edit', compact('master'))->withietsassignment($ietsassignment);
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

            'original_filename' => 'required',
            'name' => 'required',
            'duration' => 'required'

            ));

        //store in the database
        $ietsassignment = IetsAssignment::find($id);

        
        if ($request->hasFile('original_filename')){
            $ietsassignment->original_filename = $request->input('original_filename');
            $file = $request->file('original_filename');
            $filename = time() . '.' . $file->getClientOriginalExtension(); //save image as .png @ etc
            $ietsassignment->original_filename = $filename; //save file to which column
            $request->file('original_filename')->move(base_path().'/public/uploads/',$filename);
        }

        $ietsassignment->name = $request->input('name');
        $ietsassignment->duration = $request->input('duration');
        

        $ietsassignment -> save();

        Session::flash('success', 'The assignment has been updated!');

        return redirect() -> route(('ietsassignment.show'),$ietsassignment->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ietsassignment = IetsAssignment::find($id);

        $ietsassignment->delete();

        Session::flash('success', 'The assignment has been deleted!');
        return redirect()->route('ietsassignment.index');
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
          $entry = new IetsAssignment();
          
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
        return Redirect::to('ietsassignment/show');
      } else {
          Session::flash('success', 'The file upload is neither pdf, .doc, .docx nor .txt file');
        return Redirect::to('ietsassignment/show')->withInput()->withErrors($validator);
      }
    }
}

<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Validator;
use Response;
use Redirect;
use Session;

use Auth;
use App\User;
use DB;
use App\EIAUpload;
use App\AssignmentQuestions;
use App\EiaAssignment;

class EIAUploadAssignmentController extends Controller {
    public function index() {
    $upload = EIAUpload::all();

    $eiaquestion=AssignmentQuestions::where('user_id',Auth::id())->get();
    //$eiaquestion2=EiaAssignment::all();
    $relations = [
            'questions' => \App\EiaAssignment::get()->pluck('question', 'id')->prepend('Please select', ''),
        ];

        //$supplier_list = AssignmentQuestions::('general_assignment_id', 'specific_assignment_id')->where('user_id',Auth::id())->get();
     
    /*foreach ($upload as $uploads) {
            $uploads->original_filename = DB::table('upload')
            ->whereExists(function ($query) {
                $query->select(DB::raw(1))
                      ->from('users')
                      ->whereRaw('users.id = upload.user_id');
            })
            ->get();
        }*/
       
    
    
    return view('eiaupload.index',['upload' => $upload]+ $relations,compact('eiaquestion','supplier_list'));
    
    }

    public function show($id){

    }

    public function multiple_upload(Request $request) {

      // getting all of the post data
      $files = Input::file('images');
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
          $sizefile = $file->getClientSize();
          $upload_success = $file->move($destinationPath, $filename);
          $uploadcount ++;

          // save into database
          $extension = $file->getClientOriginalExtension();
          $entry = new EIAUpload();
      $entry->user_id=Auth::id();
          $entry->mime = $file->getClientMimeType();
          $entry->original_filename = $filename;
          $entry->filename = $file->getFilename().'.'.$extension;
          $entry->sizefile = $sizefile;
          $entry->assignment_id = $request->assignment_id;
          $entry->save();
        }
      }
      if($uploadcount == $file_count){
        Session::flash('success', 'Upload successfully');
        return Redirect::to('eiaupload');
      } else {
      Session::flash('success', 'the file upload is not pdf file');
        return Redirect::to('eiaupload')->withInput()->withErrors($validator);
      }
    }

  
  public function destroy($id){


    
    //EIAUpload::where('original_filename',$original_filename)->delete();
    $upload = EIAUpload::find($id);

        $upload->delete();

    return redirect() -> route(('eiaupload.index'),$upload->id);
  }
}

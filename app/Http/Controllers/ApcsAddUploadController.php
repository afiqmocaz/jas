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
use App\ApcsAddUpload;

class ApcsAddUploadController extends Controller
{
   public function apcsaddinfo() {
		$upload = ApcsAddUpload::all();
		/*foreach ($upload as $uploads) {
            $uploads->original_filename = DB::table('upload')
            ->whereExists(function ($query) {
                $query->select(DB::raw(1))
                      ->from('users')
                      ->whereRaw('users.id = upload.user_id');
            })
            ->get();
        }*/
		
		
		return view('apcs.apcsaddupload.index',['upload' => $upload]);
		
		//select * from upload where exists ( select * from users where users.id = upload.user_id )
      return view('apcs.apcsaddupload.index');
	  
    }
    public function multiple_upload() {
      // getting all of the post data
      $files = Input::file('images');
      // Making counting of uploaded images
      $file_count = count($files);
      // start count how many uploaded
      $uploadcount = 0;

      foreach ($files as $file) {
        $rules = array('file' => 'required|mimes:pdf|max:10485760'); //'required|mimes:pdf'
        $rules2 = array('file' => array('uploadcount:file,3'));
		Validator::extend('uploadcount',function ($attribute,$value,$parameters){
			$files = Input::file($parameters[0]);

			return (count($files) <= $parameters[1]) ? true : false;
		});
		//$validator = Validator::make(array('file'=> $file), $rules,$rules2);
		$validator = Validator::make(
    Input::all(),
    array('file' => array('uploadcount:file,3')) // first param is field name and second is max count
   // $messages
);
        if($validator->passes()){
          $destinationPath = 'uploads'; // upload folder in public directory
          $filename = $file->getClientOriginalName();
          $upload_success = $file->move($destinationPath, $filename);
          $uploadcount ++;

          // save into database
          $extension = $file->getClientOriginalExtension();
          $entry = new ApcsAddUpload();
		  $entry->user_id=Auth::id();
          $entry->mime = $file->getClientMimeType();
		  $entry->sizefile=$file->getClientSize();
          $entry->original_filename = $filename;
          $entry->filename = $file->getFilename().'.'.$extension;
          $entry->save();
        }
      }
      if($uploadcount == $file_count){
        Session::flash('success', 'Upload successfully');
        return Redirect::to('apcsaddupload');
      } else {
		  Session::flash('success', 'the file upload is not pdf file');
        return Redirect::to('apcsaddupload')->withInput()->withErrors($validator);
      }
    }
	

	
	public function delete($original_filename){
	
		
		ApcsAddUpload::where('original_filename',$original_filename)->delete();
		return back();
	}
}

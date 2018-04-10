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
use App\AddUpload;
use DB;

class AddUploadsController extends Controller {
    public function addinfo() {
		$upload = AddUpload::all();
		/*foreach ($upload as $uploads) {
            $uploads->original_filename = DB::table('upload')
            ->whereExists(function ($query) {
                $query->select(DB::raw(1))
                      ->from('users')
                      ->whereRaw('users.id = upload.user_id');
            })
            ->get();
        }*/
		
		
		return view('iets.addupload.index',['upload' => $upload]);
		
		//select * from upload where exists ( select * from users where users.id = upload.user_id )
      return view('iets.addupload.index');
	  
    }
    public function multiple_upload() {
      // getting all of the post data
      $files = Input::file('images');
      // Making counting of uploaded images
      $file_count = count($files);
      // start count how many uploaded
      $uploadcount = 0;

      foreach ($files as $file) {
        $rules = array('file' => 'required|mimes:pdf|max:10240'); //'required|mimes:pdf'
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
          $entry = new AddUpload();
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
        return Redirect::to('addupload');
      } else {
		   Session::flash('Unsuccessful', 'the file upload is not pdf file or the size of the file is too big. PLease try again.');
        return Redirect::to('addupload')->withInput()->withErrors($validator);
      }
    }
	
	public function showupload($user_id){
		 
		foreach ($upload as &$uploads) {
            $uploads->original_filename = User::where('id', $uploads->user_id)->get();
        }
		//return view('upload.index',['upload' => $upload]);
		
		return view('showupload.index',['upload' => $upload]);
	}
	
	public function delete($original_filename){
	
		
		AddUpload::where('original_filename',$original_filename)->delete();
		return back();
	}
}

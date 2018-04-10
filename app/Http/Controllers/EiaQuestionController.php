<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\EiaQuestion;
use App\EiaRelated;
use Session;
use storage;
use Validator;
use Response;
use Redirect;
use App\Uploads;
use Image;
use DB;

class EiaQuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $eiaquestion = EiaQuestion::all();
        $eiarelates = EiaRelated::all();
        $correct = [
            '' => '--Please Select--',
            'A' => 'A',
            'B' => 'B',
            'C' => 'C',
            'D' => 'D'
        ];
        return view('eiaquestion.show', compact('eiaquestion', 'eiarelates', 'correct'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('eiaquestion.create');
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

            'type' => 'required',
            'question' => 'required|max:255',
            'a' => 'required',
            'b' => 'required',
            'c' => 'required',
            'd' => 'required',
            'correct' => 'required',
            'level' => 'required'

            ));

        //store in the database
        $eiaquestion = new EiaQuestion;

        if ($request->hasFile('fileToUpload')){
            $eiaquestion->fileToUpload = $request->fileToUpload;
            $file = $request->file('fileToUpload');
            $filename = time() . '.' . $file->getClientOriginalExtension(); //save image as .png @ etc
            $eiaquestion->fileToUpload = $filename; //save file to which column
            $request->file('fileToUpload')->move(base_path().'/public/images/',$filename);
        }

        $eiaquestion->limg = $request->limg;
        $eiaquestion->type = $request->type;
        $eiaquestion->question = $request->question;
        $eiaquestion->i = $request->i;
        $eiaquestion->ii = $request->ii;
        $eiaquestion->iii = $request->iii;
        $eiaquestion->iv = $request->iv;
        $eiaquestion->a = $request->a;
        $eiaquestion->b = $request->b;
        $eiaquestion->c = $request->c;
        $eiaquestion->d = $request->d;
        $eiaquestion->correct = $request->correct;
        $eiaquestion->eiarelated_id = $request->eiarelated_id;
        $eiaquestion->level = $request->level;

        $correct = [
            '' => '--Please Select--',
            'A' => 'A',
            'B' => 'B',
            'C' => 'C',
            'D' => 'D'
        ];

        $eiaquestion -> save();

        Session::flash('success', 'The question has been added!');
       

        return redirect() -> route(('eiaquestion.show'),$eiaquestion->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $eiaquestion = EiaQuestion::all();
        $eiarelates = EiaRelated::all();
        $correct = [
            '' => '--Please Select--',
            'A' => 'A',
            'B' => 'B',
            'C' => 'C',
            'D' => 'D'
        ];
        return view('eiaquestion.show', compact('eiaquestion', 'eiarelates', 'correct'));
        
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
        $eiaquestion = EiaQuestion::find($id);
        $eiarelates = EiaRelated::all();
        $catrs = array();
        foreach ($eiarelates as $cat) {
            $catrs[$cat->id] = $cat->eiarelated;
        }
        $correct = [
            '' => '--Please Select--',
            'A' => 'A',
            'B' => 'B',
            'C' => 'C',
            'D' => 'D'
        ];
        //return the view and pass in the var we previously created
        return view('eiaquestion.edit')->witheiaquestion($eiaquestion)->witheiarelates($catrs)->withcorrect($correct);
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

            'type' => 'required',
            'question' => 'required|max:255',
            'a' => 'required',
            'b' => 'required',
            'c' => 'required',
            'd' => 'required',
            'correct' => 'required',
            'level' => 'required'

            ));

        //store in the database
        $eiaquestion = EiaQuestion::find($id);

        if ($request->hasFile('original_filename')){
            $eiaquestion->original_filename = $request->input('original_filename');
            $file = $request->file('original_filename');
            $filename = time() . '.' . $file->getClientOriginalExtension(); //save image as .png @ etc
            $eiaquestion->original_filename = $filename; //save file to which column
            $request->file('original_filename')->move(base_path().'/public/uploads/',$filename);
        }

        $eiaquestion->limg = $request->input('limg');
        $eiaquestion->type = $request->input('type');
        $eiaquestion->question = $request->input('question');
        $eiaquestion->i = $request->input('i');
        $eiaquestion->ii = $request->input('ii');
        $eiaquestion->iii = $request->input('iii');
        $eiaquestion->iv = $request->input('iv');
        $eiaquestion->a = $request->input('a');
        $eiaquestion->b = $request->input('b');
        $eiaquestion->c = $request->input('c');
        $eiaquestion->d = $request->input('d');
        $eiaquestion->correct = $request->input('correct');
        $eiaquestion->eiarelated_id = $request->input('eiarelated_id');
        $eiaquestion->level = $request->input('level');

        $correct = [
            '' => '--Please Select--',
            'A' => 'A',
            'B' => 'B',
            'C' => 'C',
            'D' => 'D'
        ];

        $eiaquestion -> save();

        Session::flash('success', 'The question has been updated!');

        return redirect() -> route(('eiaquestion.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $eiaquestion = EiaQuestion::find($id);

        $eiaquestion->delete();

        Session::flash('success', 'The question has been deleted!');
        return redirect()->route('eiaquestion.index');
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
        $rules = array('photo' => 'mimes:jpeg,bmp,png|max:10240'); //'required|mimes:pdf'
        $validator = Validator::make(array('file'=> $file), $rules);
        if($validator->passes()){
          $destinationPath = 'uploads'; // upload folder in public directory
          $filename = $file->getClientOriginalName();
          $upload_success = $file->move($destinationPath, $filename);
          $uploadcount ++;

          // save into database
          $extension = $file->getClientOriginalExtension();
          $entry = new EiaQuestion();

          $entry->mime = $file->getClientMimeType();
          $entry->original_filename = $filename;
          $entry->filename = $file->getFilename().'.'.$extension;


          $entry->limg = $request->limg;
          $entry->type = $request->type;
          $entry->question = $request->question;
          $entry->i = $request->i;
          $entry->ii = $request->ii;
          $entry->iii = $request->iii;
          $entry->iv = $request->iv;
          $entry->a = $request->a;
          $entry->b = $request->b;
          $entry->c = $request->c;
          $entry->d = $request->d;
          $entry->correct = $request->correct;
          $entry->eiarelated_id = $request->eiarelated_id;
          $entry->level = $request->level;
          $entry->save();
        }
      }
  }

        elseif (is_array($files) || is_object($files) == null)
        {

            $eiaquestion = new EiaQuestion;

        $eiaquestion->limg = $request->limg;
        $eiaquestion->type = $request->type;
        $eiaquestion->question = $request->question;
        $eiaquestion->i = $request->i;
        $eiaquestion->ii = $request->ii;
        $eiaquestion->iii = $request->iii;
        $eiaquestion->iv = $request->iv;
        $eiaquestion->a = $request->a;
        $eiaquestion->b = $request->b;
        $eiaquestion->c = $request->c;
        $eiaquestion->d = $request->d;
        $eiaquestion->correct = $request->correct;
        $eiaquestion->eiarelated_id = $request->eiarelated_id;
        $eiaquestion->level = $request->level;

        $eiaquestion -> save();

        Session::flash('success', 'The question has been successfully added!');

        return redirect() -> route(('eiaquestion.show'),$eiaquestion->id);
        }

      if($uploadcount == $file_count){
        Session::flash('success', 'The question has been successfully added!');
        return Redirect::to('eiaquestion/show');
      } else {
          Session::flash('success', 'The file upload is neither pdf, .doc, .docx nor .txt file');
        return Redirect::to('eiaquestion/show')->withInput()->withErrors($validator);
      }
    }
}
